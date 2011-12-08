<?php

	class pChart4mwPie extends pChart4mw {
		var $widthXLabel = null;
		
		// **************************************************************************************
		// 
		// Static function to be called by the mediawiki system. 
		//
		// **************************************************************************************

		/**
		 * Generates a pie chart from the entered data and returns the HTML code to render the graph
		 *
		 * @param	$input	String	Input between the <pBar> and </pBar> tags or null is the tag is closed (<pBar />)
		 * @param	$args	Array	Tag arguments, which are entered like HTML tag attributes; this is an associative 
		 *							array indexed by attribute name
		 * @param	$parser	Object	The parent parser; more advanced extensions use this to obtain the contextual Title, 
		 *							parse wiki text, expand braces, register link relationships and dependencies etc.
		 * @returns			String	HTML code to show the pie chart
		 */
		public static function render( $input, $args, $parser ) {
			// Recursively parse the wikitext
			$parsedText = $parser->recursiveTagParse( $input );			

			// Create the chart
			$chart = new pChart4mwPie();
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
                    array_unshift( $args, "pChart4mwPie" );

                    return call_user_func_array( array( 'pChart4mw', 'renderParserFunction' ), $args );
		}

		function __construct() {
			$this->type = "pie";
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
			
			// If there is no serie entered, enter all equal values 
			// and make sure the data is consistent
			if( $numSeries == 0 ) {
				for( $i = 0; $i < count( $this->pData ); $i++ ) {
					$this->pData[ $i ][ "Serie1" ] = 1;
				}
				
				$this->pDataDescription[ "Values" ][] = "Serie1";
				$this->pDataDescription[ "Description" ][ "Serie1" ] = "";
			} elseif( $numSeries > 1 ) {
				// Remove data from all series above nr 1
				for( $j = 1; $j < $numSeries; $j++ ) {
					for( $i = 0; $i < count( $this->pData ); $i++ ) {
						unset( $this->pData[ $i ][ "Serie" . ( $j + 1 ) ] );
					}
					
					unset( $this->pDataDescription[ "Values" ][ $j ] );
					unset( $this->pDataDescription[ "Description" ][ "Serie" . ( $j + 1 ) ] );
				}
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

			// Check whether the percentages should be shown
			if( array_key_exists( "percentages", $args ) ) {
				if( $args[ "percentages" ] != "false" ) {
					$this->chartArgs[ "percentages" ] = true;
				} else {
					$this->chartArgs[ "percentages" ] = false;
				}
			}
			
			// Check whether the percentages should be shown
			if( array_key_exists( "3d", $args ) ) {
				if( $args[ "3d" ] != "false" ) {
					$this->chartArgs[ "3d" ] = true;
				} else {
					$this->chartArgs[ "3d" ] = false;
				}
			}			
			
			// Check whether the percentages should be shown
			if( array_key_exists( "exploded", $args ) ) {
				if( $args[ "exploded" ] != "false" ) {
					$this->chartArgs[ "exploded" ] = true;
				} else {
					$this->chartArgs[ "exploded" ] = false;
				}
			}	
			
			// The parameter 'labels' is used for X,Y graphs to compute 
			// the size for the graph area. This is done in another way
			// with pie-charts, so we set the labels parameter to false
			// and compute the size and space another way. See also 
			// pChart4mwPie::drawChartSpecific and pChart4mw::setGraphArea
			$this->chartArgs[ "pielabels" ] = $this->chartArgs[ "labels" ];
			$this->chartArgs[ "labels" ] = false;
			
			return $this->chartArgs;
			
		}		
		
		/**
		 * Returns the default properties for pie graphs
		 *
		 * @returns				Array	Associative array with default properties.
		 */
		public function getDefaultArgs() {
			$args = parent::getDefaultArgs();
			
			// Set pie-specific default arguments
			$args[ "percentages" ] 	= true;
			$args[ "pielabels" ] 	= false;
			$args[ "labels" ] 		= false;
			$args[ "exploded" ]     = false;
			
			$args[ "3d" ]			= false;
			
			// Check whether the user has set defaults in the LocalSettings.php file
			$name = "wgPChart4mw" . ucfirst( $this->type ) . "Defaults";
			if( array_key_exists( $name, $GLOBALS ) ) {
				$args = $this->parseArgs( $GLOBALS[ $name ], $args );
			}
						
			return $args;
		}
		
		/**
		 * For a pie graph, no grid or scale have to be defined
		 */
		public function drawScaleAndGrid() {
			// Do nothing
		}
		
		/**
		 * Draws the chart, based on the type of chart
		 */
		public function drawChartSpecific() {
			
			// Determine size and position of the graph
			// left, top, right, bottom
			
			// Determine whether the percentage and label should be visible
			$percentage = $this->chartArgs[ "percentages" ];
			$labels = $this->chartArgs[ "pielabels" ];

			// The radius is computed by taking the height or width of the graph area, the smaller of the two
			// We take into account the width of the labels or percentages and the height of these text sizes
			$xSpace = $this->chartArgs[ "marginX" ];
			$ySpace = 2 * $this->chartArgs[ "marginY" ];
			$yMultiplier = 1;
			
			$percentageSize = wfPChart4mwtextboxSize( $this->chartArgs["textfont"], "50%", 0, $this->chartArgs["textsize"] );
			$lineheight = $percentageSize[ 1 ];
			if( $labels && $percentage) {
				$xSpace += 2 * max( $this->getWidthXLabel(), $percentageSize[ 0 ] );
				$ySpace += 4 * $lineheight;
			} elseif( $labels ) {
				$xSpace += 2 * $this->getWidthXLabel();
				$ySpace += 2 * $lineheight;
			} elseif( $percentage ) {
				$xSpace += $percentageSize[ 0 ];
				$ySpace += 2 * $lineheight;
			}
			
			// If the chart is 3d, the pie is less high. We then have
			// more space.
			if( $this->chartArgs[ "3d" ] ) {
				$yMultiplier = 1.3;
			}
			
			$radius = min( 
				$this->graphArea[2] - $this->graphArea[0] - $xSpace, 
				( $this->graphArea[3] - $this->graphArea[1]) * $yMultiplier - $ySpace 
			) / 2;
			
			// The position of the pie is in the center of the graph area
			$xPos = ( $this->graphArea[2] + $this->graphArea[0] ) / 2;
			$yPos = ( $this->graphArea[3] + $this->graphArea[1] ) / 2;
			
			// For the width of the labels, we assume the largest label to be 7 times the specified height
			// Percentages are approximately two times wider than high.
			if( $percentage && $labels ) {
				$text = PIE_PERCENTAGE_LABEL;
			} elseif( $percentage ) {
				$text = PIE_PERCENTAGE;
			} elseif( $labels ) {
				$text = PIE_LABELS;
			} else {
				$text = PIE_NOLABEL;
			}
			
			if( $this->chartArgs[ "3d" ] ) {
				// Determine whether the graph should be exploded
				if( $this->chartArgs[ "exploded" ] ) {
					$spliceDistance = 5;
				} else {
					$spliceDistance = 0;
				}

				// Draw the chart
				$this->pChart->drawPieGraph( 
					$this->pData, 
					$this->pDataDescription,
					$xPos,
					$yPos,
					$radius,
					$text,
					TRUE,
					60,
					20,
					$spliceDistance
				);
			} else {
				if( $this->chartArgs[ "exploded" ] ) {
					// Draw the chart
					$this->pChart->drawFlatPieGraph( 
						$this->pData, 
						$this->pDataDescription,
						$xPos,
						$yPos,
						$radius,
						$text,
						2 + 0.06 * $radius
					);
				} else {
					// Draw the chart
					$this->pChart->drawBasicPieGraph( 
						$this->pData, 
						$this->pDataDescription,
						$xPos,
						$yPos,
						$radius,
						$text
						
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
		 * Returns the number of colors needed to draw the graph
		 *
		 * @return	Int		Number of colors needed to show the graph
		 */
		public function getNumberOfColors() {
			return count( $this->pData );
		}
		
		/**
		 * Returns the size of the legend, depending on the data that is given
		 * The legend size for a pie chart must be computed using a special pie data structure
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
		
		/**
		 * Returns the width of the X labels.
		 *
		 * @return	Int		The width in pixels of the largest X label, not taking into account the angle
		 */
		function getWidthXLabel() {
			if( $this->widthXLabel == null ) {
				// If the angle is 0 or 180, the height of the line is independent of the 
				// length of the text. In that case, we avoid looping over all labels
				if( $this->chartArgs[ "angle" ] % 180 == 0 ) {
					$size = wfPChart4mwtextboxSize( $this->chartArgs["textfont"], "one line", 0, $this->chartArgs["textsize"] );
					$this->widthXLabel = ceil( $size[ 0 ] );
				} else {
					// Find the largest X labels to determine their size
					$largestXlabel = "";
					foreach( $this->pData as $point ) {
						// Xlabels are strings in the [ "name" ] field
						if( array_key_exists( "Name", $point ) && strlen( $point[ "Name" ] ) > strlen( $largestXlabel ) ) {
							$largestXlabel =  $point[ "Name" ];
						}
					}
					
					$size = wfPChart4mwtextboxSize( $this->chartArgs["textfont"], $largestXlabel, $this->chartArgs[ "angle" ], $this->chartArgs["textsize"] );

					// The width should be computed not taking into account the angle
					$simpleSize = wfPChart4mwtextboxSize( $this->chartArgs["textfont"], $largestXlabel, 0, $this->chartArgs["textsize"] );
					$this->widthXLabel = ceil( $simplesize[ 0 ] );
				}
				
				$this->heightXLabel = ceil( $size[ 1 ] );
			}

			return $this->widthXLabel;
		}

	}
