<?php

	class pChart4mwScatter extends pChart4mw {

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
			$chart = new pChart4mwScatter();
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
                    array_unshift( $args, "pChart4mwScatter" );

                    return call_user_func_array( array( 'pChart4mw', 'renderParserFunction' ), $args );
		}
                
		function __construct() {
			$this->type = "scatter";
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
				}
				
				$this->pDataDescription[ "Values" ][] = "Serie1";
				$this->pDataDescription[ "Values" ][] = "Serie2";

				$this->pDataDescription[ "Description" ][ "Serie1" ] = "";
				$this->pDataDescription[ "Description" ][ "Serie2" ] = "";
			} elseif( $numSeries == 1 ) {
				// If only one number is given, that is taken as the X and Y value
				for( $i = 0; $i < count( $this->pData ); $i++ ) {
					$this->pData[ $i ][ "Serie2" ] = $this->pData[ $i ][ "Serie1" ];
				}
				
				$this->pDataDescription[ "Values" ][] = "Serie2";
				$this->pDataDescription[ "Description" ][ "Serie2" ] = "";
			}
			
			// Make a clean copy of the data description for showing the legend
			$this->pieLegendDataDescription = $this->pDataDescription;
			$this->pieLegendDataDescription[ "Values" ] = array();
			$this->pieLegendDataDescription[ "Description" ] = array();

			for( $i = 0; $i < count( $this->pDataDescription[ "Values" ] ); $i += 2 ) {
				$seriename = $this->pDataDescription[ "Values" ][ $i ];
				$this->pieLegendDataDescription[ "Values" ][] = $seriename;
				$this->pieLegendDataDescription[ "Description" ][ $seriename ] = $this->pDataDescription[ "Description" ][ $seriename ];;
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
			
			// Check whether the graph should show plots
			if( array_key_exists( "plots", $args ) ) {
				if( $args[ "plots" ] == "open" ) {
					$this->chartArgs[ "plots" ] = "open";
				} elseif( $args[ "plots" ] == "none" ) {
					$this->chartArgs[ "plots" ] = "none";
				} else {
					$this->chartArgs[ "plots" ] = "closed";
				}
			}
			
			// Check whether the points should be connected
			if( array_key_exists( "connected", $args ) ) {
				if( $args[ "connected" ] == "false" ) {
					$this->chartArgs[ "connected" ] = false;
				} else {
					$this->chartArgs[ "connected" ] = true;
				}
			}
			
			// Use the user-entered plotsize
			if( array_key_exists( "plotsize", $args ) && is_numeric( $args[ "plotsize" ] ) ) {
				$this->chartArgs[ "plotsize" ] = $args[ "plotsize" ];
			}
			
			return $this->chartArgs;
		}

		/**
		 * Returns the default properties for bar graphs
		 *
		 * @returns				Array	Associative array with default properties.
		 */
		public function getDefaultArgs() {
			$args = parent::getDefaultArgs();
			
			// Set scatter-specific default arguments
			$args[ "plots" ] = true;
			$args[ "connected" ] = false;
			$args[ "plotsize" ] = 3;
			
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
			
			// Combine series 1,3,5 and 2,4,6 etc. THis is done to get a correct
			// scaling. We have to take the extremes of the X values and the extremes
			// of the Y values
			$numColumns = count( $this->pDataDescription[ "Values" ] );
			$xSerie = array();
			$ySerie = array();
			
			for( $i = 0; $i < count( $this->pData ); $i++ ) {
				for( $j = 0; $j < $numColumns; $j += 2 ) {
					if( array_key_exists( "Serie" . ( $j + 1 ), $this->pData[ $i ] ) && $this->pData[ $i ][ "Serie" . ( $j + 1 ) ] != "" ) {
						$xSerie[] = $this->pData[ $i ][ "Serie" . ( $j + 1 ) ];
					}
					if( array_key_exists( "Serie" . ( $j + 2 ), $this->pData[ $i ] ) && $this->pData[ $i ][ "Serie" . ( $j + 2 ) ] != "" ) {
						$ySerie[] = $this->pData[ $i ][ "Serie" . ( $j + 2 ) ];
					}
				}
			}

			// Combine the X and Y values into a new pData structure
			$pData = array();
			$xCount = count( $xSerie ); $yCount = count( $ySerie );
			$num = max( $xCount, $yCount );
			
			for( $i = 0; $i < $num; $i++ ) {
				$pData[] = array(
					"X" => $i < $xCount ? $xSerie[ $i ] : $xSerie[ 0 ],
					"Y" => $i < $yCount ? $ySerie[ $i ] : $ySerie[ 0 ]
				);
			}
			
			// If needed, draw a box around the graph Area
			if( $args[ "box" ] ) {
				$this->pChart->drawRectangle(
					$this->graphArea[ 0 ], $this->graphArea[ 1 ], $this->graphArea[ 2 ], $this->graphArea[ 3 ],
					$args[ "axiscolor" ][ 0 ], $args[ "axiscolor" ][ 1 ], $args[ "axiscolor" ][ 2 ]
				);
			}
			
			// Draw and scale the axes and 
			$this->pChart->drawXYScale( 
				$pData, 
				$this->pDataDescription,
				"Y",
				"X",
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
			
		}		
		
		/**
		 * Draws the chart, based on the type of chart
		 */
		public function drawChartSpecific() {
			
			$numColumns = count( $this->pDataDescription[ "Values" ] );
			
			for( $i = 0; $i < $numColumns; $i += 2 ) {
				$yserie = "Serie" . ( $i + 2 );
				$xserie = "Serie" . ( $i + 1 );
				$color = $i / 2;
				// Draw line graph between the X and Y points
				if( $this->chartArgs[ "connected" ] ) {
					$this->pChart->drawXYGraph( 
						$this->pData, 
						$this->pDataDescription,
						$yserie, $xserie,
						$color
					);
				}

				$pSize = $this->chartArgs[ "plotsize" ];
				if( $this->chartArgs[ "plots" ] == "closed" ) {
					$this->pChart->drawXYPlotGraph( 
						$this->pData, 
						$this->pDataDescription,
						$yserie, $xserie,
						$color,
						$pSize
					);
				} elseif( $this->chartArgs[ "plots" ] == "open" ) {

					$this->pChart->drawXYPlotGraph( 
						$this->pData, 
						$this->pDataDescription,
						$yserie, $xserie,
						$color,
						$pSize,
						max( $pSize - 1, 0 ),
						255, 255, 255

					);
				}
			}			
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
		 * The legend size for a scatter chart must be computed using a special data structure
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
