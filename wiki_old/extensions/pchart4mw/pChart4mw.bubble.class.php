<?php

	class pChart4mwBubble extends pChart4mw {

		// **************************************************************************************
		// 
		// Static functions to be called by the mediawiki system. 
		//
		// **************************************************************************************

		/**
		 * Generates a scatter chart from the entered data and returns the HTML code to render the graph
		 *
		 * @param	$input	String	Input between the <pScatter> and </pScatter> tags or null is the tag is closed (<pBar />)
		 * @param	$args	Array	Tag arguments, which are entered like HTML tag attributes; this is an associative 
		 *							array indexed by attribute name
		 * @param	$parser	Object	The parent parser; more advanced extensions use this to obtain the contextual Title, 
		 *							parse wiki text, expand braces, register link relationships and dependencies etc.
		 * @returns			String	HTML code to show the bar chart
		 */
		public static function render( $input, $args, $parser ) {
			// Recursively parse the wikitext
			$parsedText = $parser->recursiveTagParse( $input );			

			// Create the chart
			$chart = new pChart4mwBubble();
			return $chart->renderChart( $parsedText, $args );
		}

		/**
		 * Generates a bar chart from the entered data using a parser function
                 * and returns the HTML code to render the graph
		 *
		 * @param	$parser	Object	The parent parser; more advanced extensions use this to obtain the contextual Title,
		 *							parse wiki text, expand braces, register link relationships and dependencies etc.
		 * @returns			String	HTML code to show the bar chart
		 */
		public static function renderParserFunction() {
                    // Add this class name to the function
                    $args = func_get_args();
                    array_unshift( $args, "pChart4mwBubble" );

                    return call_user_func_array( array( 'pChart4mw', 'renderParserFunction' ), $args );
		}

		function __construct() {
			$this->type = "bubble";
		}
		
		// **************************************************************************************
		// 
		// Methods for generating charts
		//
		// **************************************************************************************

		/**
		 * Parses the data from the charts
		 *
		 * @param 	$rawData	String 	Raw user-given data for the graph
		 * @returns	 			pData	pData object containing the entered data
		 */
		public function parseData( $rawData ) {
			parent::parseData( $rawData );
			
			// Check whether there is only one series available
			// If not, cut other series
			$numSeries = count( $this->pDataDescription[ "Values" ] );
			
			// If there is no serie for size entered, enter all equal values 
			// and make sure the data is consistent
			if( $numSeries == 0 ) {
				for( $i = 0; $i < count( $this->pData ); $i++ ) {
					$this->pData[ $i ][ "Serie1" ] = $i;
					$this->pData[ $i ][ "Serie2" ] = $i;
					$this->pData[ $i ][ "Serie3" ] = 1;
				}
				
				$this->pDataDescription[ "Values" ][] = "Serie1";
				$this->pDataDescription[ "Values" ][] = "Serie2";
				$this->pDataDescription[ "Values" ][] = "Serie3";

				$this->pDataDescription[ "Description" ][ "Serie1" ] = "";
				$this->pDataDescription[ "Description" ][ "Serie2" ] = "";
				$this->pDataDescription[ "Description" ][ "Serie3" ] = "";
			} elseif( $numSeries == 1 ) {
				// If only one number is given, that is taken as the size 
				for( $i = 0; $i < count( $this->pData ); $i++ ) {
					$this->pData[ $i ][ "Serie3" ] = $this->pData[ $i ][ "Serie1" ];
					$this->pData[ $i ][ "Serie1" ] = $i;
					$this->pData[ $i ][ "Serie2" ] = $i;
				}
				
				$this->pDataDescription[ "Values" ][] = "Serie2";
				$this->pDataDescription[ "Values" ][] = "Serie3";

				$this->pDataDescription[ "Description" ][ "Serie2" ] = "";
				$this->pDataDescription[ "Description" ][ "Serie3" ] = "";			
			} elseif( $numSeries == 2 ) {
				// If only two numbers are given, the first is taken as X coordinate, the second as size 
				for( $i = 0; $i < count( $this->pData ); $i++ ) {
					$this->pData[ $i ][ "Serie3" ] = $this->pData[ $i ][ "Serie2" ];
					$this->pData[ $i ][ "Serie2" ] = $i;
				}
				
				$this->pDataDescription[ "Values" ][] = "Serie3";

				$this->pDataDescription[ "Description" ][ "Serie3" ] = "";		
			}
			
			// Make a clean copy of the data description for showing the legend
			$this->pieLegendDataDescription = $this->pDataDescription;
			$this->pieLegendDataDescription[ "Values" ] = array();
			$this->pieLegendDataDescription[ "Description" ] = array();
			
			// Copy all data to the pDataDescription structure
			$i = 0;
			foreach( $this->pData as $point ) {
				$seriename = "Serie" . ( $i + 1 );
				$this->pieLegendDataDescription[ "Values" ][] = $seriename;
				$this->pieLegendDataDescription[ "Description" ][ $seriename ] = $point[ "Name" ];
				
				$i++;
			}
			
		}
		
		/**
		 * Parses the parameters for the chart and sets them to the pChart object
		 *
		 * @param	$args	Array	Associative array with arguments given by the user
		 * @returns			pChart	pChart object with parameters set
		 */
		public function parseArgs( $args, $default = false ) {
			// Do all default parsing
			parent::parseArgs( $args, $default );
			
			if( array_key_exists( "cross", $args ) ) {
				$this->chartArgs[ "cross" ] = ( strtolower( $args[ "cross" ]) != "false" );
			}

			// Check whether the user have given the max plotsize or not
			if( array_key_exists( "plotsize", $args ) ) {
				$this->chartArgs[ "plotmax" ] = $args[ "plotsize" ];
			} else { 
				$this->chartArgs[ "plotmax" ] = 0;
			}
			
			return $this->chartArgs;
			
		}

		/**
		 * The arguments are parsed before the data is parsed. This function updates the 
		 * arguments based on the data structure
		 */
		public function updateArgsBasedOnData() {
			parent::updateArgsBasedOnData();
			
			// Determine the plotsize for the largest bubble
			if( $this->chartArgs[ "plotmax" ] == 0 ) {
				// Determine the plotsize for the largest bubble automatically
				$minSize = min( $this->chartArgs[ "sizeX" ], $this->chartArgs[ "sizeY" ] ) * 0.75;
				$this->chartArgs[ "plotmax" ] = ( $minSize / count( $this->pData ) ) * 0.75;
			}
		}
		
		/**
		 * Sets the boundaries for the graph area, taking into account the margins and legend size and position
		 *
		 * @return	pChart	The updated pChart object
		 */
		public function setGraphArea( $pChart ) {
			$pChart = parent::setGraphArea( $pChart );
			
			// This is done by decreasing the chart area 
			// because the bubbles might be larger
			$area = $this->graphArea;
			$bubblesize = $this->chartArgs[ "plotmax" ];
			
			// Actually set the graph area
			$this->graphArea = array( $area[ 0 ] + $bubblesize, $area[ 1 ] + $bubblesize, $area[ 2 ] - $bubblesize, $area[ 3 ] - $bubblesize );
			$pChart->setGraphArea( $this->graphArea[ 0 ], $this->graphArea[ 1 ], $this->graphArea[ 2 ], $this->graphArea[ 3 ] );
			
			return $pChart;
		}

		/**
		 * Returns the default properties for bar graphs
		 *
		 * @returns				Array	Associative array with default properties.
		 */
		public function getDefaultArgs() {
			$args = parent::getDefaultArgs();
			
			// Set bubble-specific default arguments
			$args[ "plotmin" ] = 3;
			$args[ "cross" ] = false;

			// Check whether the user has set defaults in the LocalSettings.php file
			$name = "wgPChart4mw" . ucfirst( $this->type ) . "Defaults";
			if( array_key_exists( $name, $GLOBALS ) ) {
				$args = $this->parseArgs( $GLOBALS[ $name ], $args );
			}
			
			return $args;
		}
		
		/**
		 * Set the scale to the right values and draws the axes and grid
		 */
		public function drawScaleAndGrid() {
			$args = $this->chartArgs;
		
			// Set scale, depending on the user preferences
			if( !$args[ "autoscaling" ] ) {
				$this->pChart->setFixedScale( $args[ "ymin" ], $args[ "ymax" ] );
			}
			
			if( count( $this->pData ) > 1 ) {
				// If needed, draw a box around the graph Area
				if( $args[ "box" ] ) {
					$this->pChart->drawRectangle(
						$this->graphArea[ 0 ], $this->graphArea[ 1 ], $this->graphArea[ 2 ], $this->graphArea[ 3 ],
						$args[ "axiscolor" ][ 0 ], $args[ "axiscolor" ][ 1 ], $args[ "axiscolor" ][ 2 ]
					);
				}

				// Draw and scale the axes and 
				$this->pChart->drawXYScale( 
					$this->pData, 
					$this->pDataDescription,
					"Serie2",
					"Serie1",
					$args[ "axiscolor" ][ 0 ], $args[ "axiscolor" ][ 1 ], $args[ "axiscolor" ][ 2 ], 
					$args[ "angle" ],
					$args[ "decimals" ] );

				// If the user wants a grid shown, draw it
				if( $args[ "grid" ] ) {
					$this->pChart->drawGrid( 
						$args[ "gridlinesize" ], 
						FALSE, 
						$args[ "gridcolor" ][ 0 ], $args[ "gridcolor" ][ 1 ],$args[ "gridcolor" ][ 2 ],
						$args[ "gridalpha" ]
					);
				}
				
				// Draw a cross to divide the graph area in four parts
				if( $args[ "cross" ] ) {
					// Determine the size of the graph area
					$gArea = $this->graphArea; // left,top,right,bottom
					
					$xCenter = ( $gArea[ 0 ] + $gArea[ 2 ] ) / 2;
					$yCenter = ( $gArea[ 1 ] + $gArea[ 3 ] ) / 2;
					
					// Draw horizontal line
					$this->pChart->drawDottedLine( $xCenter, $gArea[ 1 ], $xCenter, $gArea[ 3 ],2,0,0,0 );
					
					// Draw vertical line
					$this->pChart->drawDottedLine( $gArea[ 0 ], $yCenter, $gArea[ 2 ], $yCenter,2,0,0,0 );
				}
			}
		}		
		
		/**
		 * Draws the chart, based on the type of chart
		 */
		public function drawChartSpecific() {
			if( count( $this->pData ) == 1 ) {
				// Draw line graph between the X and Y points
				$this->pChart->drawXYPlotGraph( 
					$this->pData, 
					$this->pDataDescription,
					"Serie2", "Serie1",
					0,
					$this->chartArgs[ "plotmax" ] 
				);
			} else {
				// Determine the size of the different bubbles
				$maxsize = 0;
				$minsize = PHP_INT_MAX;
				foreach( $this->pData as $point ) {
					$maxsize = max( $maxsize, $point[ "Serie3" ] );
					$minsize = min( $minsize, $point[ "Serie3" ] );
				}
				
				// The largest bubble should have a radius of 'plotsize'
				// The smallest bubble should have a radius of 3
				// The area of the bubble should reflect the value of Serie3, so the 
				// radius should be proportional to the square root of the value
				if( $maxsize == $minsize ) {
					$bubbleRatio = 1;
					$plotmin = ($this->chartArgs[ "plotmax" ] + $this->chartArgs[ "plotmin" ] ) / 2;
				} else {
					$bubbleRatio = ( $this->chartArgs[ "plotmax" ] - $this->chartArgs[ "plotmin" ] ) / ( sqrt( $maxsize ) - sqrt( $minsize ) );
					$plotmin = $this->chartArgs[ "plotmin" ];
				}
				
				// Plot the bubbles in the correct size
				$color = 0;
				foreach( $this->pData as $point ) {
					// Draw line graph between the X and Y points
					$this->pChart->drawXYPlotGraph( 
						array( $point ), 
						$this->pDataDescription,
						"Serie2", "Serie1",
						$color,
						$plotmin + ( sqrt( $point[ "Serie3" ] ) - sqrt( $minsize ) ) * $bubbleRatio,
						1
					);
					
					$color++;
				}
			}
		}

		/** 
		 * Returns the number of colors needed to draw the graph
		 *
		 * @return	Int		Number of colors needed to show the graph
		 */
		public function getNumberOfColors() {
			return count( $this->pData );
		}		
		
		/**
		 *	Draw Legend, if required by the user on the desired position
		 *
		 *  This is a special method for pie charts. The legend for pie charts uses a
		 *  different datastructure. We can use the special drawPieLegend method of 
		 *  the pChart class, but we cannot retrieve the size of that legend for 
		 *  positioning. For that reason, the structure is changed
		 */
		public function drawLegend() {
			$args = $this->chartArgs;
			
			// Backup the original datadescription structure
			$original = $this->pDataDescription;
			$this->pDataDescription = $this->pieLegendDataDescription;

			// Draw the legend
			parent::drawLegend();
			
			// Put the original datadescription back into place
			$this->pDataDescription = $original;
		}
		
		/**
		 * Returns the size of the legend, depending on the data that is given
		 * The legend size for a bubble chart must be computed using a special data structure
		 * because the default data structure does not contain the correct data
		 * 
		 * @param	$pChart				pChart	pChart object to compute the legend size for
		 * @param	$dataDescription	Array	Array that contains the descriptions for different series
		 *										Defaults to this objects dataDescription array.
		 * @return						Array	Size of the legendbox. Array contains (left,top,right,bottom) values.
		 */
		 public function getLegendBoxSize( $pChart = null, $dataDescription = null ) {
			if( $pChart == null ) {
				$pChart = $this->pChart;
			}
			
			$dataDescription = $this->pieLegendDataDescription;
			
			return $pChart->getLegendBoxSize( $dataDescription );
		}		
		
	}
