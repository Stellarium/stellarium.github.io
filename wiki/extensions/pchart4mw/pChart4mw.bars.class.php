<?php
	
	class pChart4mwBars extends pChart4mw {

		// **************************************************************************************
		// 
		// Static functions to be called by the mediawiki system. 
		//
		// **************************************************************************************

		/**
		 * Generates a bar chart from the entered data and returns the HTML code to render the graph
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
			$chart = new pChart4mwBars();
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
                    array_unshift( $args, "pChart4mwBars" );

                    return call_user_func_array( array( 'pChart4mw', 'renderParserFunction' ), $args );
		}

		function __construct() {
			$this->type = "bars";
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
			if( !$default ) {
				$chartArgs = $this->getDefaultArgs();
			}

			// Do all default parsing
			parent::parseArgs( $args, $default );
			
			// Check whether the graph should be stacked
			if( array_key_exists( "stacked", $args ) ) {
				if( $args[ "stacked" ] != "false" ) {
					$this->chartArgs[ "stacked" ] = true;
				}
			}
			
			// Check whether the graph should be overlay
			if( array_key_exists( "overlay", $args ) ) {
				if( $args[ "overlay" ] != "false" ) {
					$this->chartArgs[ "overlay" ] = true;
					
					// Change default opacity to 50 
					$this->chartArgs[ "opacity" ] = 50;
				}
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
			
			// Set bar-specific default arguments
			$args[ "stacked" ] = false;
			$args[ "overlay" ] = false;
			$args[ "opacity" ] = 100;

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
			
			if( $this->chartArgs[ "stacked" ] ) {
				
				// Draw bar graph
				$this->pChart->drawStackedBarGraph( 
					$this->pData, 
					$this->pDataDescription,
					$this->chartArgs[ "opacity" ]
				);
			} elseif( $this->chartArgs[ "overlay" ] ) {
			
				// Draw bar graph
				$this->pChart->drawOverlayBarGraph( 
					$this->pData, 
					$this->pDataDescription,
					$this->chartArgs[ "opacity" ]
				);
			} else {
				// Draw bar graph
				$this->pChart->drawBarGraph( 
					$this->pData, 
					$this->pDataDescription,
					TRUE,
					$this->chartArgs[ "opacity" ]
				);
			}
		}

	}
