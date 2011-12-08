<?php

	class pChart4mwLines extends pChart4mw {

		// **************************************************************************************
		// 
		// Static functions to be called by the mediawiki system. 
		//
		// **************************************************************************************

		/**
		 * Generates a line chart from the entered data and returns the HTML code to render the graph
		 *
		 * @param	$input	String	Input between the <pBar> and </pBar> tags or null is the tag is closed (<pBar />)
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
			$chart = new pChart4mwLines();
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
                    array_unshift( $args, "pChart4mwLines" );

                    return call_user_func_array( array( 'pChart4mw', 'renderParserFunction' ), $args );
		}
                
		function __construct() {
			$this->type = "lines";
		}
		
		// **************************************************************************************
		// 
		// Methods for generating charts
		//
		// **************************************************************************************


		/**
		 * Parses the parameters for the chart and sets them to the pChart object
		 *
		 * @param	$args	Array	Associative array with arguments given by the user
		 * @returns			pChart	pChart object with parameters set
		 */
		public function parseArgs( $args, $default = false ) {
			// Do all default parsing
			parent::parseArgs( $args, $default );

			// Check whether the graph should be stacked
			if( array_key_exists( "plots", $args ) ) {
				if( $args[ "plots" ] == "open" ) {
					$this->chartArgs[ "plots" ] = "open";
				} else {
					$this->chartArgs[ "plots" ] = "closed";
				}
			}

			// Use the user-entered plotsize
			if( array_key_exists( "plotsize", $args ) && is_numeric( $args[ "plotsize" ] ) ) {
				$this->chartArgs[ "plotsize" ] = $args[ "plotsize" ];
			}
			
			// Use the cubic (smoothed) variant or the normal one
			if( array_key_exists( "cubic", $args ) ) {
				if( $args[ "cubic" ] != "false" ) {
					$this->chartArgs[ "cubic" ] = true;
				}
			}
			
			// Use the cubic (smoothed) variant or the normal one
			if( array_key_exists( "filled", $args ) ) {
				if( $args[ "filled" ] != "false" ) {
					$this->chartArgs[ "filled" ] = true;
				}
			}	

			return $this->chartArgs;			
		}		
		
		/**
		 * Returns the default properties for line graphs
		 *
		 * @returns				Array	Associative array with default properties.
		 */
		public function getDefaultArgs() {
			$args = parent::getDefaultArgs();
			
			// Set line-specific default arguments
			$args[ "plots" ] = false;
			$args[ "plotsize" ] = 3;
			
			$args[ "cubic" ] = false;
			$args[ "filled" ] = false;
			
			$args[ "opacity" ] = 40;
			
			// Check whether the user has set defaults in the LocalSettings.php file
			$name = "wgPChart4mw" . ucfirst( $this->type ) . "Defaults";
			if( array_key_exists( $name, $GLOBALS ) ) {
				$args = $this->parseArgs( $GLOBALS[ $name ], $args );
			}
			
			return $args;
		}
		
		/**
		 * Draws the chart, based on the type of chart
		 */
		public function drawChartSpecific() {
			
			// Draw line graph. Use cubic interpolation if the user has asked for it
			if( $this->chartArgs[ "cubic" ] ) {
				if( $this->chartArgs[ "filled" ] ) {
					$this->pChart->drawFilledCubicCurve( 
						$this->pData, 
						$this->pDataDescription,
						.1,
						$this->chartArgs[ "opacity" ]
					);
				} else {
					$this->pChart->drawCubicCurve( 
						$this->pData, 
						$this->pDataDescription,
						.1
					);
				}
			} else {
				if( $this->chartArgs[ "filled" ] ) {
					$this->pChart->drawFilledLineGraph( 
						$this->pData, 
						$this->pDataDescription,
						$this->chartArgs[ "opacity" ]
					);
				} else {
					$this->pChart->drawLineGraph( 
						$this->pData, 
						$this->pDataDescription
					);
				}
			}
			
			if( $this->chartArgs[ "plots" ] == "closed" ) {
				$this->pChart->drawPlotGraph( $this->pData, $this->pDataDescription, $this->chartArgs[ "plotsize" ] );
			} elseif( $this->chartArgs[ "plots" ] == "open" ) {
				$pSize = $this->chartArgs[ "plotsize" ];
				$this->pChart->drawPlotGraph( $this->pData, $this->pDataDescription, $pSize, max( $pSize - 1, 0 ),255,255,255 );
			}
		}

	}
