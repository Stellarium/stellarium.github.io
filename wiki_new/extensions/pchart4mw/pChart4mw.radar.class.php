<?php

	class pChart4mwRadar extends pChart4mw {

		// **************************************************************************************
		// 
		// Static function to be called by the mediawiki system. 
		//
		// **************************************************************************************

		/**
		 * Generates a radar chart from the entered data and returns the HTML code to render the graph
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
			$chart = new pChart4mwRadar();
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
                    array_unshift( $args, "pChart4mwRadar" );

                    return call_user_func_array( array( 'pChart4mw', 'renderParserFunction' ), $args );
		}

		function __construct() {
			$this->type = "radar";
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

			// Draw a filled radar graph instead of an empty one
			if( array_key_exists( "filled", $args ) ) {
				if( $args[ "filled" ] != "false" ) {
					$this->chartArgs[ "filled" ] = true;
				}
			}				
			
			// Draw stripes underneath the graph
			if( array_key_exists( "striped", $args ) ) {
				if( $args[ "striped" ] != "false" ) {
					$this->chartArgs[ "striped" ] = true;
				}
			}
			
			// What color should be used for the graph background
			if( array_key_exists( "stripecolor", $args ) ) {
				$this->chartArgs[ "stripecolor" ] = wfPChart4mwhtml2rgb( $args[ "stripecolor" ] );
			}
			
			return $this->chartArgs;
		}		
		
		/**
		 * Returns the default properties for radar graphs
		 *
		 * @returns				Array	Associative array with default properties.
		 */
		public function getDefaultArgs() {
			$args = parent::getDefaultArgs();
			
			// Set radar-specific default arguments
			$args[ "filled" ] = false;
			$args[ "striped" ] = false;
			$args[ "stripecolor" ] = array( 200, 200, 200 );
			$args[ "opacity" ] = 50;

			// Check whether the user has set defaults in the LocalSettings.php file
			$name = "wgPChart4mw" . ucfirst( $this->type ) . "Defaults";
			if( array_key_exists( $name, $GLOBALS ) ) {
				$args = $this->parseArgs( $GLOBALS[ $name ], $args );
			}
			
			return $args;
		}

		/**
		 * Set the scale to the right values and draws the axes and grid
		 * 
		 */
		public function drawScaleAndGrid() {
			$args = $this->chartArgs;
			
			// Draw and scale the axes and 
			$this->pChart->drawRadarAxis( 
				$this->pData, 
				$this->pDataDescription,
				$args[ "striped" ],
				2,
				$args[ "axiscolor" ][ 0 ], $args[ "axiscolor" ][ 1 ], $args[ "axiscolor" ][ 2 ],
				$args[ "stripecolor" ][ 0 ], $args[ "stripecolor" ][ 1 ], $args[ "stripecolor" ][ 2 ],
				$args[ "ymax" ]
			);
			
			return $this->pChart;
		}
		
		/**
		 * Draws the chart, based on the type of chart
		 */
		public function drawChartSpecific() {
			
			// Draw a Radar chart. If the user wants it to be filled, do so
			if( $this->chartArgs[ "filled" ] ) {
				$this->pChart->drawFilledRadar( $this->pData, $this->pDataDescription, $this->chartArgs[ "opacity" ], 2, $this->chartArgs[ "ymax" ] );
			} else {
				$this->pChart->drawRadar( $this->pData, $this->pDataDescription, 2, $this->chartArgs[ "ymax" ] );
			}
		}

	}
