<?php

	class pChart4mw {

		// **************************************************************************************
		//
		// Properties used for a pChart
		//
		// **************************************************************************************

		// Unique filename for the chart that is generated
		var $filename 	= null;

		// pChart object containing the chart itself
		var $pChart 	= null;

		// Array with the data for generating the chart
		// See also: http://pchart.sourceforge.net/documentation.php?topic=datastructure
		var $pData 		= array();

		// Array with the data descriptions for generating the chart
		// See also: http://pchart.sourceforge.net/documentation.php?topic=datastructure
		var $pDataDescription = array();

		// Size and location of the graph area within the whole image. These values are
		// computed in the setGraphArea method
		var $graphArea  = array();

		// Width of the Y labels and height of the X labels. These values are used to compute
		// the grapharea
		var $widthYLabel = null;
		var $heightXLabel = null;

		// Type of the chart. This field is filled in subclasses.
		var $type 		= "";

		// Flag that is set when the chart contains no data.
		var $empty 		= false;

		// **************************************************************************************
		//
		// Methods for parsing data and analyzing the set parameters
		//
		// **************************************************************************************

		/**
		 * Parses the data from the charts
		 *
		 * @param 	$rawData	String 	Raw user-given data for the graph
		 * @returns	 			pData	pData object containing the entered data
		 */
		public function parseData( $rawData ) {
			// Create empty data object
			$pData = $this->pData;
			$pDataDescription = $this->pDataDescription;

			$pDataDescription[ "Position" ] = "Name";
			$pDataDescription[ "Values" ] = array();
			$pDataDescription[ "Description" ] = array();

			// If the data is empty, no processing has to be done
			if( trim( $rawData ) == "" ) {
				$this->empty = true;
				$this->pData = $pData;
				$this->pDataDescription = $pDataDescription;
				return $pData;
			}

			// Parse the raw data. This raw data is in CSV format, with lines separated by a \n
			$lines = explode( "\n", $rawData );
			$serieNames = array();
			$xlabels = false;

			// Remove empty lines from the array and split it into elements. Also count the number
			// of rows and columns
			$csvData = array();
			$numberColumns = 0;
			$numberRows = 0;

			foreach( $lines as $line ) {
				// Remove leading and trailing spaces
				$line = trim( $line );

				if( $line != "" ) {
					$csvData[] = explode( ",", $line );

					// Increase the number of rows
					$numberRows++;

					// Take the maximum number of columns in a row as the grand number of columns
					$numberColumns = max( $numberColumns, count( $csvData[ $numberRows - 1 ] ) );
				}
			}

			// Check whether there are labels for columns or for rows
			$xlabels = false;
			$ylabels = false;

			// To do that, we check whether there are non-numeric values on the first row or column
			$A1 = false;	// Flag whether the contents of cell A1 is non-numeric
			$c1 = false;	// Flag whether the contents of column 1 (without A1) is non-numeric
			$r1 = false;	// Flag whether the contents of row 1 (without A1) is non-numeric

			// We check three different positions for their contents:
			//		A1: top left cell
			//		R1:	top row, except for the left cell
			//		C1: left column, except for the top cell
			//
			$A1 = !is_numeric( trim( $csvData[ 0 ][ 0 ] ) );

			for( $i = 0; $i < $numberRows; $i++ ) {
				if( $i == 0 ) {
					if( $numberColumns > 1 ) {
						for( $j = 1; $j < $numberColumns; $j++ ) {
							if( count( $csvData[ $i ] ) > $j && !is_numeric( $csvData[ $i ][ $j ] ) ) {
								$r1 = true;
								break;
							}
						}
					}
				} else {
					if( !is_numeric( $csvData[ $i ][ 0 ] ) ) {
						$c1 = true;
						break;
					}
				}
			}

			// Now, we have several cases:
			//   A1 = empty, row 1 and column 1 contain non-numerics: both x and y labels
			//   A1 or row 1 contains non-numerics, column 1 does not: only y labels
			//   A1 or column 1 contains non-numerics, row 1 does not: only x labels
			//	 Both A1, column 1 and row 1 do not contain non-numerics: no labels at all
			if( $r1 && $c1 ) {
				$xlabels = true;
				$ylabels = true;

				// Adjust the number of data columns and rows
				$numberColumns--;
				$numberRows--;
			} elseif( ( $r1 && !$c1 ) || ( $A1 && $numberColumns == 1 ) ) {
				$xlabels = false;
				$ylabels = true;

				// Adjust the number of data rows
				$numberRows--;
			} elseif( ( $c1 && !$r1 ) || ( $A1 && $numberRows == 1 ) )  {
				$xlabels = true;
				$ylabels = false;

				// Adjust the number of data columns
				$numberColumns--;
			} elseif( !$A1 && !$r1 && !$c1 ) {
				$xlabels = false;
				$ylabels = false;
			}

			// The automatic detection of labels can be overridden by the user
			//
			if( $this->chartArgs[ "xlabels" ] && !$xlabels ) {
				$xlabels = true;
				$numberColumns--;
			}
			if( $this->chartArgs[ "ylabels" ] && !$ylabels ) {
				$ylabels = true;
				$numberRows--;
			}

			// Check whether the first line contains labels. This is true when one or more of the
			// elements on the line is non-numeric
			$serieNames = array();
			if( $ylabels ) {
				// Take the first row as Serienames
				$serieNames = array_shift( $csvData );

				// Remove the first entry if xlabels exist
				// That entry is empty or otherwise has no meaning
				if( $xlabels ) {
					array_shift( $serieNames );
				}
			}

			// Match the number of serie names with the number of series
			$serieNames = array_pad( $serieNames, $numberColumns, "" );

			// Check whether any data is entered. If not, no further action has to be done
			if( $numberRows == 0 || $numberColumns == 0 ) {
				$this->pData = $pData;
				$this->pDataDescription = $pDataDescription;
				$this->empty = true;
				return $pData;
			}

			// Create the pData array. This array has 1 element per row
			// That element contains a associative array, like this;
			//
			// Array
			// (
			//		[0] => Array
			//			(
			//				[Name] => January
			//				[Serie1] => 0
			//				[Serie2] => 2
			//			)
			//		[1] => Array
			//			(
			//				[Name] => February
			//				[Serie1] => 1
			//				[Serie2] => 4
			//			)
			// )

			// First create an array with keynames
			$keyNames = array( "Name" );
			for( $i = 0; $i < $numberColumns; $i++ ) {
				$keyNames[] = "Serie" . strval( $i + 1 );
			}

			// Save all lines to the pData structure
			for( $i = 0; $i < $numberRows; $i++ ) {
				$data = $csvData[ $i ];

				// If the xlabels are not set, determine the xlabels automatically
				if( !$xlabels ) {
					array_unshift( $data, $i + 1 );
				}

				// Make sure there are enough entries on a line
				$data = array_pad( $data, $numberColumns + 1, "" );

				// Save the data with the serienames as keys and values as data.
				$pData[ $i ] = array_combine( $keyNames, $data );
			}

			// Create the pDataStructure array
			// This array has the structure like:
			//
			// Array
			// (
			//		[Position] => Name
			//		[Values] => Array
			//			(
			//				[0] => Serie1
			//				[1] => Serie2
			//			)
			//		[Description] => Array
			//			(
			//				[Serie1] => Year 2007
			//				[Serie2] => Year 2008
			//			)
			// )

			// Set names and descriptions for the series into the array
			for( $i = 0; $i < $numberColumns; $i++ ) {
				$name = "Serie" . strval( $i + 1 );

				$pDataDescription[ "Values" ][ $i ] = $name;
				$pDataDescription[ "Description" ][ $name ] = $serieNames[ $i ];
			}

			// Set the format, unit and axis names
			$pDataDescription[ "Axis" ] 	= array( "X" => $this->chartArgs[ "xtitle" ], 	"Y" => $this->chartArgs[ "ytitle" ] );
			$pDataDescription[ "Format" ] 	= array( "X" => $this->chartArgs[ "xformat" ], 	"Y" => $this->chartArgs[ "yformat" ] );
			$pDataDescription[ "Unit" ] 	= array( "X" => $this->chartArgs[ "xunit" ], 	"Y" => $this->chartArgs[ "yunit" ] );

			// Save the data into the object
			$this->pData = $pData;
			$this->pDataDescription = $pDataDescription;
			return $this->pData;
		}

		/**
		 * Parses the parameters for the chart and sets them to the pChart object
		 *
		 * @param	$args		Array	Associative array with arguments given by the user
		 * @param	$default	Array	Default parameters (optional)
		 * @returns				pChart	pChart object with parameters set
		 */
		public function parseArgs( $args, $default = false ) {

			// Initialize default arguments
			if( !$default ) {
				$chartArgs = $this->getDefaultArgs();
			} else {
				$chartArgs = $default;
			}

			// Check whether several TITLE parameters are set by the user
			if( array_key_exists( "title", $args ) ) {
				$chartArgs[ "title" ] = $args[ "title" ];
			}			
			if( array_key_exists( "titlefont", $args ) && preg_match( '/\/|\\|\.\./', $args[ "titlefont" ] ) == 0) {
				$chartArgs[ "titlefont" ] = $args[ "titlefont" ];
			}
			if( array_key_exists( "titlesize", $args ) ) {
				$chartArgs[ "titlesize" ] = $args[ "titlesize" ];
			}	
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "titlecolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "titlecolor" ] );
				if( $cArray ) {
					$chartArgs[ "titlecolor" ] = $cArray;
				}
			}
			// Check whether several TEXT parameters are set by the user
			if( array_key_exists( "textfont", $args ) && preg_match( '/\/|\\|\.\./', $args[ "textfont" ] ) == 0) {
				$chartArgs[ "textfont" ] = $args[ "textfont" ];
			}
			if( array_key_exists( "textsize", $args ) ) {
				$chartArgs[ "textsize" ] = $args[ "textsize" ];
			}	
			
			// Determine the size of the chart
			if( array_key_exists( "size", $args ) && trim( $args[ "size" ] ) != "" ) {
				// Size can be set as one number, or 00x00 for width x height
				$sizes = explode( "x", strtolower( $args[ "size" ] ) );

				// If only one number is given, it is taken as the height and width
				// so the chart will be a square
				if( count( $sizes ) == 1 && is_numeric( $sizes[ 0 ] ) ) {
					$chartArgs[ "sizeX" ] = $sizes[ 0 ];
					$chartArgs[ "sizeY" ] = $sizes[ 0 ];
				}

				if( count( $sizes ) > 1 ) {
					if( is_numeric( $sizes[ 0 ] ) ) {
						$chartArgs[ "sizeX" ] = $sizes[ 0 ];
					}
					if( is_numeric( $sizes[ 1 ] ) ) {
						$chartArgs[ "sizeY" ] = $sizes[ 1 ];
					}
				}
			}

			// Are the colors set? If so, set the colors into the color palette
			if( array_key_exists( "colors", $args ) ) {
				$colors = explode( ",", $args[ "colors" ] );

				$chartArgs[ "colors" ] = array();

				// Set all colors into the palette, if it is a correct RGB color
				// If it is not a correct RGB color, black is used
				foreach( $colors as $color ) {
					$cArray = wfPChart4mwhtml2rgb( $color );
					if( !$cArray ) {
						$cArray = array( 0, 0, 0 );
					}
					$chartArgs[ "colors" ][] = $cArray;
				}
			}

			// Has the user specified a colorscheme to be used?
			if( array_key_exists( "colorscheme", $args ) ) {
				global $wgPChart4mwDefaultColorSchemeDir;
				$filename = $wgPChart4mwDefaultColorSchemeDir . '/' . $args[ "colorscheme" ] . '.txt';
				if( file_exists( $filename ) ) {
					$chartArgs[ "colorscheme" ] = $args[ "colorscheme" ];
				}
			}

			// What color should be used for the image background
			// If no correct color is specified, the default color is used
			if( array_key_exists( "bgcolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "bgcolor" ] );
				if( $cArray ) {
					$chartArgs[ "bgcolor" ] = $cArray;
				}
			}

			// Set the margins on left and right side
			if( array_key_exists( "marginx", $args ) && is_numeric( $args[ "marginx" ] ) ) {
				$chartArgs[ "marginX" ] = $args[ "marginx" ];
			}

			// Set the margins on top and bottom
			if( array_key_exists( "marginy", $args ) && is_numeric( $args[ "marginy" ] ) ) {
				$chartArgs[ "marginY" ] = $args[ "marginy" ];
			}

			// Should the labels be printed?
			if( array_key_exists( "labels", $args ) ) {
				$chartArgs[ "labels" ] = ( strtolower( $args[ "labels" ] ) != "false"  );
			}

			// Should every label be printed, or should some be skipped
			// See skiplabels parameter of pChart->drawScale()
			if( array_key_exists( "skiplabels", $args ) && is_numeric( $args[ "skiplabels" ] ) ) {
				$chartArgs[ "skiplabels" ] = $args[ "skiplabels" ];
			}

			// How many decimals should be shown on the Y-axis
			// See decimals parameter of pChart->drawScale()
			if( array_key_exists( "decimals", $args ) && is_numeric( $args[ "decimals" ] ) ) {
				$chartArgs[ "decimals" ] = $args[ "decimals" ];
			}

			// Should the labels be printed with an angle?
			// The angle should be between 0 and 180 degrees
			if( array_key_exists( "angle", $args ) ) {
				$angle = (int) $args[ "angle" ];
				if( $angle >= 0 && $angle <= 180 ) {
					$chartArgs[ "angle" ] = $angle;
				}
			}

			// What color should be used for the graph background
			if( array_key_exists( "axiscolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "axiscolor" ] );
				if( $cArray ) {
					$chartArgs[ "axiscolor" ] = $cArray;
				}
			}

			// What color should be used for the graph background
			if( array_key_exists( "axis", $args ) ) {
				if( strtolower( $args[ "axis" ] ) == "false" ) {
					$chartArgs[ "axiscolor" ] = $chartArgs[ "bgcolor" ];
				}
			}

			// Show or hide the grid in the chart
			if( array_key_exists( "box", $args ) ) {
				$chartArgs[ "box" ] = ( $args[ "box" ] != "false" );
			}

			// What color should be used for the box
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "boxcolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "boxcolor" ] );
				if( $cArray ) {
					$chartArgs[ "boxcolor" ] = $cArray;
				}
			}

			// Are the max and min values for the Y axis given?
			if( array_key_exists( "ymax", $args ) ) {
				$chartArgs[ "autoscaling" ] = false;
				$chartArgs[ "ymax" ] = $args[ "ymax" ];

				if( !array_key_exists( "ymin", $args ) ) {
					$chartArgs[ "ymin" ] = 0;
				}
			}

			// If the ymin value is given, save it. If it is zero, it can be used to fix the y-axis min value to zero
			// other values are only used in combination with ymax
			if( array_key_exists( "ymin", $args ) ) {
				$chartArgs[ "ymin" ] = $args[ "ymin" ];
			}

			// Show or hide the grid in the chart
			if( array_key_exists( "grid", $args ) ) {
				$chartArgs[ "grid" ] = ( $args[ "grid" ] != "false" );
			}

			// What color should be used for the grid
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "gridcolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "gridcolor" ] );
				if( $cArray ) {
					$chartArgs[ "gridcolor" ] = $cArray;
				}
			}

			// Use a background gradient or not
			if( array_key_exists( "bgtype", $args ) ) {
				if( $args[ "bgtype" ] == "gradient" ) {
					$chartArgs[ "bgtype" ] = "gradient";
				}
			}

			// What color should be used for the graph background
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "graphbgcolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "graphbgcolor" ] );
				if( $cArray ) {
					$chartArgs[ "graphbgcolor" ] = $cArray;
				}
			}

			// Use a background gradient or not
			if( array_key_exists( "graphbgtype", $args ) ) {
				if( $args[ "graphbgtype" ] == "gradient" || $args[ "graphbgtype" ] == "normal" || $args[ "graphbgtype" ] == "transparent") {
					$chartArgs[ "graphbgtype" ] = $args[ "graphbgtype" ];
				}
			}

			// Should the legend be set?
			if( array_key_exists( "legend", $args ) ) {
				$chartArgs[ "legend" ] = ( $args[ "legend" ] != "none" );
				$chartArgs[ "legendpos" ] = $args[ "legend" ];
			}

			// What color should be used for the text in the legend
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "legendcolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "legendcolor" ] );
				if( $cArray ) {
					$chartArgs[ "legendcolor" ] = $cArray;
				}
			}

			// What color should be used for the legend background
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "legendbgcolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "legendbgcolor" ] );
				if( $cArray ) {
					$chartArgs[ "legendbgcolor" ] = $cArray;
				}
			}

			// What color should be used for the legend border
			// If the color is not correctly specified (HTML-style), the default color is used
			if( array_key_exists( "legendbordercolor", $args ) ) {
				$cArray = wfPChart4mwhtml2rgb( $args[ "legendbordercolor" ] );
				if( $cArray ) {
					$chartArgs[ "legendbordercolor" ] = $cArray;
				}
			}

			// Check how transparent the bars or graph area should be
			if( array_key_exists( "opacity", $args ) ) {
				if( $args[ "opacity" ] >= 0 && $args[ "opacity" ] <= 100 ) {
					$chartArgs[ "opacity" ] = $args[ "opacity" ];
				}
			}

			// Title for the X-axis
			if( array_key_exists( "xtitle", $args ) ) {
				$chartArgs[ "xtitle" ] = $args[ "xtitle" ];
			}

			// Title for the Y-axis
			if( array_key_exists( "ytitle", $args ) ) {
				$chartArgs[ "ytitle" ] = $args[ "ytitle" ];
			}

			// Unit for the X-axis
			if( array_key_exists( "xunit", $args ) ) {
				$chartArgs[ "xunit" ] = $args[ "xunit" ];
			}

			// Unit for the Y-axis
			if( array_key_exists( "yunit", $args ) ) {
				$chartArgs[ "yunit" ] = $args[ "yunit" ];
			}

			// Format for values on the X-axis
			if( array_key_exists( "xformat", $args ) ) {
				$chartArgs[ "xformat" ] = $args[ "xformat" ];
			}

			// Format for values on the Y-axis
			if( array_key_exists( "yformat", $args ) ) {
				$chartArgs[ "yformat" ] = $args[ "yformat" ];
			}

			// Are there non-numeric labels in the data
			if( array_key_exists( "xlabels", $args ) ) {
				$chartArgs[ "xlabels" ] = ( strtolower( $args[ "xlabels" ] ) != "false"  );
			}

			// Are there non-numeric labels in the data
			if( array_key_exists( "ylabels", $args ) ) {
				$chartArgs[ "ylabels" ] = ( strtolower( $args[ "ylabels" ] ) != "false"  );
			}

			// Save the arguments
			$this->chartArgs = $chartArgs;

			return $this->chartArgs;
		}

		/**
		 * The arguments are parsed before the data is parsed. This function updates the
		 * arguments based on the data structure
		 */
		public function updateArgsBasedOnData() {
			// If the size is too small for the margins, adjust the margins.
			// 60x60 seems to be the smallest graph area
			if( $this->chartArgs[ "sizeX" ] < 60 + ( $this->chartArgs[ "labels" ] ? $this->getWidthYLabel() : 0 ) + 2 * $this->chartArgs[ "marginX" ] ) {
				$this->chartArgs[ "sizeX" ] = 60 + ( $this->chartArgs[ "labels" ] ? $this->getWidthYLabel() : 0 ) + 2 * $this->chartArgs[ "marginX" ];
			}
			$titlesize = wfPChart4mwtextboxSize( $this->chartArgs[ "titlefont" ], $this->chartArgs[ "title" ], 0, $this->chartArgs[ "titlesize" ] );
			if( $this->chartArgs[ "sizeY" ] < 60 + ( $this->chartArgs[ "labels" ] ? $this->getHeightXLabel() : 0 ) + ( $this->chartArgs[ "title" ] != "" ? $titlesize[ 1 ] : 0 ) + 2 * $this->chartArgs[ "marginY" ] ) {
				$this->chartArgs[ "sizeY" ] = 60 + ( $this->chartArgs[ "labels" ] ? $this->getHeightXLabel() : 0 ) + ( $this->chartArgs[ "title" ] != "" ? $titlesize[ 1 ] : 0 ) + 2 * $this->chartArgs[ "marginY" ];
			}
		}

		/**
		 * Returns the default properties for all graphs. This method contains all hard-coded
		 * defaults for all parameters. These parameters can be overridden by setting global
		 * variables $wgPChart4mwDefaults and $wgPChart4mw<type>Defaults in LocalSettings.php
		 *
		 * @returns				Array	Associative array with default properties.
		 */
		public function getDefaultArgs() {
			
			$args = array(
				// Default chart size in pixels
				"sizeX"				=> 500,
				"sizeY"				=> 300,

				// Default margin in pixels
				"marginX"			=> 10,
				"marginY"			=> 10,

				// Fontsize used to write text into the chart (labels and legend)
				"textsize"			=> 8,
				"textfont"			=> "tahoma.ttf",

				// Default title, color for the title and font size
				"title"				=> "",
				"titlecolor"		=> array( 119, 119, 119 ),
				"titlesize"			=> 10,
				"titlefont"         => "tahoma.ttf",

				// Default title for the axes, unit (shown after the number, e.g. 150kg) and format (number, time, date)
				"xtitle"			=> "",
				"ytitle"			=> "",
				"xunit"				=> "",
				"yunit"				=> "",
				"xformat"			=> "number",
				"yformat"			=> "number",

				// Whether the data section contains a row or column with labels. If these values are non-numeric,
				// the script automatically detects these labels. If the values are all numeric, the script has no
				// method of distinguishing the labels from the data. In that case, these parameters should be set
				// in the wiki-tag.
				"xlabels"			=> false,
				"ylabels" 			=> false,

				// Whether the labels should be printed or not.
				"labels"			=> true,

				// Should any labels be skipped?
				"skiplabels"		=> 1,

				// How many decimals should be shown on the Y-axis?
				"decimals"			=> 0,

				"angle"				=> 0,
				"axis"				=> true,
				"axiscolor"			=> array( 119, 119, 119 ), // #777777
				"autoscaling"		=> true,
				"ymin"				=> -1,
				"ymax"				=> -1,
				"box"				=> false,
				"boxcolor"			=> array( 227, 227, 227 ),

				"grid"				=> false,
				"gridcolor"			=> array( 227, 227, 227 ),
				"gridlinesize"		=> 5,
				"gridalpha"			=> 50,

				"legend" 			=> false,
				"legendpos"			=> "right",
				"legendcolor"		=> array( 119, 119, 119 ),
				"legendbgcolor"		=> array( 255, 255, 255 ),
				"legendbordercolor"	=> array( 119, 119, 119 ),

				"colors"			=> array(),
				"colorscheme"		=> "accent",

				"bgcolor"			=> array( 255, 255, 255 ),
				"bgtype"			=> "normal",

				"graphbgcolor"		=> array( 255, 255, 255 ),
				"graphbgtype"		=> "transparent",

				"stacked" 			=> false,

				"opacity" 			=> 100
			);

			// Check whether the user has set defaults in the LocalSettings.php file
			if( array_key_exists( "wgPChart4mwDefaults", $GLOBALS ) ) {
				$args = $this->parseArgs( $GLOBALS[ "wgPChart4mwDefaults" ], $args );
			}

			return $args;
		}

		// **************************************************************************************
		//
		// High-level methods for generating the chart and showing it to the user
		//
		// **************************************************************************************

		/**
		 * Creates the chart with the given parameters
		 *
		 * @param	$input	String	Input between the <pBar> and </pBar> tags or null is the tag is closed (<pBar />)
		 * @param	$args	Array	Tag arguments, which are entered like HTML tag attributes; this is an associative
		 *							array indexed by attribute name
		 * @return			String	HTML code to show the chart
		 */
		public function renderChart( $input, $args ) {
			global $wgPChart4mwCacheEnabled, $wgPChart4mwWebservice;

			// If the chart must be rendered on an external location
			// call the method 'callWebservice'
			if( $wgPChart4mwWebservice != "" ) {
				return $this->callWebservice( $input, $args );
			}


			// Create a unique filename for this chart
			$this->setUniqueFileName( $this->type, $input, $args );

			// Check whether the file exists in cache
			if( $wgPChart4mwCacheEnabled && $this->existsInCache() ) {
				return $this->htmlCode();
			}

			// Parse arguments and data
			$this->parseArgs( $args );
			$this->parseData( $input );
			$this->updateArgsBasedOnData();

			// Draw the graph
			$this->drawChart();

			// Save chart
			$this->saveChart();

			// Return htmlCode for this chart
			return $this->htmlCode();
		}

		/**
		 * Creates the chart with the given parameters and outputs it to the screen
		 *
		 * @param	$input	String	Input between the <pBar> and </pBar> tags or null is the tag is closed (<pBar />)
		 * @param	$args	Array	Tag arguments, which are entered like HTML tag attributes; this is an associative
		 *							array indexed by attribute name
		 * @return			void
		 */
		public function showChart( $input, $args ) {
			global $wgPChart4mwCacheEnabled, $wgPChart4mwWebservice;
			global $wgPChart4mwImageFormat;

			// Create a unique filename for this chart
			$this->setUniqueFileName( $this->type, $input, $args );

			// Check whether the file exists in cache
			if( $wgPChart4mwCacheEnabled && $this->existsInCache() ) {
				header( "Content-type: image/" . $wgPChart4mwImageFormat );
				readfile( $this->getAbsoluteUploadDir() . DIRECTORY_SEPARATOR . $this->filename );
			}

			// Parse arguments and data
			$this->parseData( $input );
			$this->parseArgs( $args );
			$this->updateDataBasedOnArgs();

			// Draw the graph
			$this->drawChart();

			if( $wgPChart4mwCacheEnabled ) {
				// Save chart
				$this->saveChart();

				// Output the contents
				header( "Content-type: image/" . $wgPChart4mwImageFormat );
				readfile( $this->getAbsoluteUploadDir() . DIRECTORY_SEPARATOR . $this->filename );

			} else {
				// Output the contents of the chart directly to the screen
				$this->pChart->stroke();
			}
		}

		/**
		 * Calls a webservice to create the charts. The webservice is determined in the configuration
		 *
		 * @param	$input	String	Input between the <pBar> and </pBar> tags or null is the tag is closed (<pBar />)
		 * @param	$args	Array	Tag arguments, which are entered like HTML tag attributes; this is an associative
		 *							array indexed by attribute name
		 * @return			String	HTML code to show the chart
		 */
		public function callWebservice( $input, $args ) {
			global $wgPChart4mwWebservice;

			// Put the data into a string. The newlines are converted to literal '|'
			$_data = str_replace( "\n", '|', $input );

			// Create an array with parameters
			$params = $args;
			$params[ "_data" ] = $_data;
			$params[ "_type" ] = $this->type;

			// Create a sound URL
			$url = $wgPChart4mwWebservice . "?" . http_build_query( $params );

			// Return correct HTML code
			return $this->htmlCode( $url );
		}

		/**
		 * Returns the HTML code to show this graph on screen
		 *
		 * @param	@imgURL	String	URL of the generated chart
		 * @return			String	HTML code to show this graph on screen in a wiki page
		 */
		public function htmlCode( $imgURL = "" ) {
			// If no image url is given, an url to the saved image is used.
			if( $imgURL == "" ) {
				$imgURL = htmlspecialchars($this->getUploadDir() . "/" . $this->filename );
			}

			return '<p><b><img src="' . $imgURL . '" alt="pChart" /></b></p>';
		}

		// **************************************************************************************
		//
		// More detailed methods for generating the chart. The generation of a chart is divided
		// into three steps:
		//
		//	1.	Initialization: determine size of graph area and plot axes and grid
		//	2.	Show the graph itself
		//	3.	Finishing chart: printing titles and plotting legend
		//
		// **************************************************************************************

		/**
		 * Draws the chart, based on the type of chart
		 */
		public function drawChart() {
			// Initialize the chart with the given parameters
			$this->initializeChart();

			// If no data is entered, the chart can be returned without an further actions
			if( $this->empty ) {
				return;
			}

			// Draw the chart of a specific type.
			$this->drawChartSpecific();

			// Finish the chart with legend and title etc.
			$this->finishChart();
		}

		/**
		 * Initializes the chart, sets the properties
		 */
		public function initializeChart() {
			global $wgPChart4mwFontPath;

			// Retrieve the parameters for the chart
			$args = $this->chartArgs;

			// Create a chart object
			$pChart = new pChart( $args["sizeX"], $args[ "sizeY" ] );

			// Draw background colors. If needed, a gradient should be drawn
			if( $args[ "bgtype" ] == "normal" ) {
				$pChart->drawFilledRectangle( 0, 0, $args[ "sizeX" ], $args[ "sizeY" ], $args[ "bgcolor" ][ 0 ], $args[ "bgcolor" ][ 1 ], $args[ "bgcolor" ][ 2 ] );
			} else {
				$pChart->drawGraphAreaGradient( $args[ "bgcolor" ][ 0 ], $args[ "bgcolor" ][ 1 ], $args[ "bgcolor" ][ 2 ], 50, TARGET_BACKGROUND );
			}

			// Set default font properties
			$pChart->setFontProperties( $wgPChart4mwFontPath . "/". $args[ "textfont" ], $args[ "textsize" ] );

			// Define the graph area, by computing the margins, legend size, title size etc.
			$pChart = $this->setGraphArea($pChart);

			if( $args[ "graphbgtype" ] == "normal" ) {
				$pChart->drawGraphArea( $args[ "graphbgcolor" ][ 0 ], $args[ "graphbgcolor" ][ 1 ], $args[ "graphbgcolor" ][ 2 ] );
			} elseif( $args[ "graphbgtype" ] == "gradient" ) {
				$pChart->drawGraphAreaGradient( $args[ "graphbgcolor" ][ 0 ], $args[ "graphbgcolor" ][ 1 ], $args[ "graphbgcolor" ][ 2 ], 50 );
			}

			$this->pChart = $pChart;

			if( !$this->empty ) {
				$this->drawScaleAndGrid();
				$this->setColorPalette();
			}

			return $this->pChart;
		}

		/**
		 * Sets the boundaries for the graph area, taking into account the margins and legend size and position
		 *
		 * @param	$pChart	pChart	The pChart object to set the graph area for
		 * @return			pChart	The updated pChart object
		 */
		public function setGraphArea( $pChart ) {
			// Get all parameters
			$args = $this->chartArgs;

			// We have to take into account: label size, legend size and position and title size
			// Title size and position is fixed: top, height is specified in arguments

			// Without a legend and labels we only have to worry about the margins and textsize.
			$top = $args[ "marginY" ] ;
			$left = $args[ "marginX" ];

			$bottom = $args[ "sizeY" ] - $args[ "marginY" ];
			$right = $args[ "sizeX" ] - $args[ "marginX" ];

			// Add the title size if it is used
			if( $args[ "title" ] != "" ) {
				$size = wfPChart4mwtextboxSize( $args[ "titlefont" ], $args[ "title" ], 0, $args[ "titlesize" ] );
				$top += $size[ 1 ] + $args[ "marginY" ];
			}

			if( $args[ "xtitle" ] != "" ) {
				$size = wfPChart4mwtextboxSize( $args[ "textfont" ], $args[ "xtitle" ], 0, $args[ "textsize" ] );
				$bottom -= ( $size[ 1 ] );
			}

			if( $args[ "ytitle" ] != "" ) {
				$size = wfPChart4mwtextboxSize( $args[ "textfont" ], $args[ "ytitle" ], 90, $args[ "textsize" ] );
				$left += $size[ 0 ] + $args[ "marginX" ];
			}

			// If labels are shown, take their size into account
			if( $args[ "labels" ] ) {
				$left += $this->getWidthYLabel() + $args[ "marginX" ];
				$bottom -= ( $this->getHeightXLabel() + $args[ "marginY" ] );
			}

			// If the legend is shown, we have to add some to the margins
			if( $args[ "legend" ] ) {
				// Determine the size of the legend box
				$legendsize = $this->getLegendBoxSize( $pChart, $this->pDataDescription );
				$legendmargin = 10;

				// Determine what margin has to be increased
				switch( $args[ "legendpos" ] ) {
					case "top":
						$top += $legendsize[ 1 ] + $legendmargin;
						break;
					case "bottom":
						$bottom -= ( $legendsize[ 1 ] + $legendmargin );
						break;
					case "left":
						$left += $legendsize[ 0 ] + $legendmargin;
						break;
					case "right":
					default:
						$right -= ( $legendsize[ 0 ] + $legendmargin );
						break;
				}
			}

			// Actually set the graph area
			$pChart->setGraphArea( $left, $top, $right, $bottom );
			$this->graphArea = array( $left, $top, $right, $bottom );

			return $pChart;
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

			// Determine type of scaling
			if( $args[ "autoscaling" ] && $args[ "ymin" ] == 0 ) {
				$scaleType = $args[ "stacked" ] ? SCALE_ADDALLSTART0 : SCALE_START0;
			} else {
				$scaleType = $args[ "stacked" ] ? SCALE_ADDALL : SCALE_NORMAL;
			}

			// If needed, draw a box around the graph Area
			if( $args[ "box" ] ) {
				$this->pChart->drawRectangle(
					$this->graphArea[ 0 ], $this->graphArea[ 1 ], $this->graphArea[ 2 ], $this->graphArea[ 3 ],
					$args[ "boxcolor" ][ 0 ], $args[ "boxcolor" ][ 1 ], $args[ "boxcolor" ][ 2 ]
				);
			}

			// Draw and scale the axes and
			$this->pChart->drawScale(
				$this->pData,
				$this->pDataDescription,
				$scaleType,
				$args[ "axiscolor" ][ 0 ], $args[ "axiscolor" ][ 1 ], $args[ "axiscolor" ][ 2 ],
				$args[ "labels" ],		// drawTicks
				$args[ "angle" ],		// angle
				$args[ "decimals" ],	// decimals
				TRUE,					// withMargin
				$args[ "skiplabels" ]	// skipLabels
			);

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
		 * Draws specific parts of the chart. This function is implemented in child classes.
		 *
		 * Abstract method
		 */
		public function drawChartSpecific() {}

		/**
		 * Finishes the chart with a legend and title
		 */
		public function finishChart() {
			global $wgPChart4mwFontPath;

			$args = $this->chartArgs;

			// Draw Legend, if required by the user on the desired position
			if( $args[ "legend" ] ) {
				$this->drawLegend();
			}

			// Draw Title, if wanted by the user.
			if( $args[ "title" ] != "" ) {
				$size = wfPChart4mwtextboxSize( $args[ "titlefont" ], $args[ "title" ], 0, $args[ "titlesize" ] );
				$this->pChart->setFontProperties( $wgPChart4mwFontPath . "/" . $args[ "titlefont" ], $args[ "titlesize" ] );
				$this->pChart->drawTitle(
					0, $args[ "marginY" ],
					$args[ "title" ],
					$args[ "titlecolor" ][ 0 ], $args[ "titlecolor" ][ 1 ], $args[ "titlecolor" ][ 2 ],
					$args[ "sizeX" ], $args[ "marginY" ] + $size[ 1 ]
				);
				$this->pChart->setFontProperties( $wgPChart4mwFontPath . "/" . $args[ "textfont" ], $args[ "textsize" ] );
			}

		}

		/**
		 *	Draw Legend, if required by the user on the desired position
		 */
		public function drawLegend() {
			$args = $this->chartArgs;

			// Determine the size of the legend box
			$legendsize = $this->getLegendBoxSize( $this->pChart, $this->pDataDescription );

			// Determine what margin has to be increased
			$titlesize = wfPChart4mwtextboxSize( $args[ "titlefont" ], $args[ "title" ], 0, $args[ "titlesize" ] );
			switch( $args[ "legendpos" ] ) {
				case "top":
					$x = ( $args[ "sizeX" ] - $legendsize[ 0 ] ) / 2 ;
					$y = $args[ "marginY" ] + $titlesize[ 1 ];
					break;
				case "bottom":
					$x = ( $args[ "sizeX" ] - $legendsize[ 0 ] ) / 2 ;
					$y = $args[ "sizeY" ] - $args[ "marginY" ] - $legendsize[ 1 ];
					break;
				case "left":
					$x = $args[ "marginX" ];
					$y = ( $args[ "sizeY" ] - $legendsize[ 1 ] ) / 2 ;
					break;
				case "right":
				default:
					$x = $args[ "sizeX" ] - $args[ "marginX" ] - $legendsize[ 0 ];
					$y = ( $args[ "sizeY" ] - $legendsize[ 1 ] ) / 2 ;
					break;
			}

			// Draw the legend on the specified location
			$this->pChart->drawLegend(
				$x, $y,
				$this->pDataDescription,
				$args[ "legendbgcolor" ][ 0 ], $args[ "legendbgcolor" ][ 1 ], $args[ "legendbgcolor" ][ 2 ],
				$args[ "legendbordercolor" ][ 0 ], $args[ "legendbordercolor" ][ 1 ], $args[ "legendbordercolor" ][ 2 ],
				$args[ "legendcolor" ][ 0 ], $args[ "legendcolor" ][ 1 ], $args[ "legendcolor" ][ 2 ]
			);
		}

		/**
		 * Sets the user defined colors into the palette of the chart.
		 * If not enough colors exist, the colors are duplicated
		 */
		public function setColorPalette() {
			$args = $this->chartArgs;

			// Determine the number of colors needed
			$numColors = $this->getNumberOfColors();

			// Set the colors given by the user into the palette
			// If no colors are set by the user, the default colors are used
			// If needed, the colors are duplicated
			if( is_array( $args[ "colors" ] ) && count( $args[ "colors" ] ) > 0 ) {
				$colorsSet = count( $args[ "colors" ] );
				$duplicate = ceil( $numColors / $colorsSet );

				for( $i = 0; $i < $colorsSet; $i++ ) {
					$color = $args[ "colors" ][ $i ];

					// Set the colors into the palette
					for( $j = 0; $j < $duplicate; $j++ ) {
						$this->pChart->setColorPalette( $j * $colorsSet + $i, $color[ 0 ], $color[ 1 ], $color[ 2 ] );
					}
				}
			} else {
				// Load default palette, if exists
				global $wgPChart4mwDefaultColorSchemeDir;
				$filename = $wgPChart4mwDefaultColorSchemeDir . '/' . $args[ "colorscheme" ] . '.txt';
				if( file_exists( $filename ) ) {
					$this->pChart->loadColorPalette( $filename );
				}

				// Determine whether the colors should be overridden
				$originalcolors = array_values( $this->pChart->Palette );
				$colorsSet = count( $originalcolors );
				$duplicate = ceil( $numColors / $colorsSet );

				// If more colors are needed than the number of colors defined
				// duplicate some of the colors
				if( $numColors > $colorsSet ) {
					for( $i = 0; $i < $colorsSet; $i++ ) {
						$color = $originalcolors[ $i ];

						// Set the colors into the palette
						for( $j = 1; $j < $duplicate; $j++ ) {
							$this->pChart->setColorPalette( $j * $colorsSet + $i, $color[ "R" ], $color[ "G" ], $color[ "B" ] );
						}
					}
				}
			}
		}

		// **************************************************************************************
		//
		// Method for determining sizes of different parts of the graph. These sizes are used to
		// position everything right.
		//
		// **************************************************************************************

		/**
		 * Returns the number of colors needed to draw the graph
		 *
		 * @return	Int		Number of colors needed to show the graph
		 */
		public function getNumberOfColors() {
			return count( $this->pDataDescription[ "Values" ] );

		}

		/**
		 * Returns the size of the legend, depending on the data that is given
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

			if( $dataDescription == null ) {
				$dataDescription = $this->pDataDescription;
			}
			return $pChart->getLegendBoxSize( $dataDescription );
		}

		/**
		 * Returns the width of the Y labels
		 *
		 * @return	Int	The width in pixels of the largest Y label
		 */
		function getWidthYLabel() {
			if( $this->widthYLabel == null ) {
				// Compute the size of a label with decimals, if decimal places should be shown
				// In that case, the width of the Y-label if not only determined by the maximum number
				if( $this->chartArgs[ "decimals" ] > 0 ) {
					$size = wfPChart4mwtextboxSize( $this->chartArgs[ "textfont" ], "0." . str_repeat( "0", $this->chartArgs[ "decimals" ] ), 0, $this->chartArgs[ "textsize" ] );
					$this->widthYLabel = max( $this->widthYLabel, $size[ 0 ] );
				} else {
					$this->widthYLabel = 0;
				}

				// If the ymax is set, no computation has to be done. We can just take that value as the largest
				if( $this->chartArgs[ "ymax" ] > -1 ) {
					$size = wfPChart4mwtextboxSize( $this->chartArgs[ "textfont" ], $this->chartArgs[ "ymax" ], 0, $this->chartArgs[ "textsize" ] );
					$this->widthYLabel = max( $this->widthYLabel, $size[ 0 ] );
				} else {

					// Find the largest Y labels to determine their size
					$largestYlabel = "";
					foreach( $this->pData as $point ) {
						// Ylabels are numerics. For that reason we find the largest number.
						unset( $point[ "Name" ] );
						$high = max( array_values( $point ) );
						if( strlen( $high ) > $largestYlabel ) {
							$largestYlabel = $high;
						}
					}

					// Determine the size of the largest label
					$sizeYlabels = wfPChart4mwtextboxSize( $this->chartArgs[ "textfont" ], $largestYlabel, 0, $this->chartArgs[ "textsize" ] );
					$this->widthYLabel = max( $this->widthYLabel,$sizeYlabels[ 0 ] );
				}

			}
			return $this->widthYLabel;
		}

		/**
		 * Returns the height of the X labels
		 *
		 * @return	Int	The height in pixels of the largest X label, taking the angle into account
		 */
		function getHeightXLabel() {
			if( $this->heightXLabel == null ) {
				// If the angle is 0 or 180, the height of the line is independent of the
				// length of the text. In that case, we avoid looping over all labels
				if( $this->chartArgs[ "angle" ] % 180 == 0 ) {
					$size = wfPChart4mwtextboxSize( $this->chartArgs[ "textfont" ], "one line", 0, $this->chartArgs[ "textsize" ] );
				} else {
					// Find the largest X labels to determine their size
					$largestXlabel = "";
					foreach( $this->pData as $point ) {
						// Xlabels are strings in the [ "name" ] field
						if( array_key_exists( "Name", $point ) && strlen( $point[ "Name" ] ) > strlen( $largestXlabel ) ) {
							$largestXlabel =  $point[ "Name" ];
						}
					}

					$size = wfPChart4mwtextboxSize( $this->chartArgs[ "textfont" ], $largestXlabel, $this->chartArgs[ "angle" ], $this->chartArgs[ "textsize" ] );
				}

				$this->widthXLabel = ceil( $size[ 0 ] );
				$this->heightXLabel = ceil( $size[ 1 ] );
			}

			return $this->heightXLabel;
		}

		// **************************************************************************************
		//
		// Methods for caching the generated charts
		//
		// **************************************************************************************

		/**
		 * Checks whether this image has been made earlier and exists in cache
		 *
		 * @param	$filename	String	Filename of the cached image without path info
		 * 								(e.g. ABC.jpg for the file cache/ABC.jpg). Defaults to $this->filename
		 * @returns				Boolean	True if this graph has already been generated, and is still up-to-date
		 * 								based on cache settings. False otherwise.
		 */
		private function existsInCache( $filename = null ) {
			global $wgPChart4mwCacheDir;

			if( $filename == null ) {
				$filename = $this->filename;
			}

			if( file_exists( $this->getAbsoluteUploadDir() . DIRECTORY_SEPARATOR . $filename ) ) {
				return true;
			} else {
				return false;
			}

			return false;
		}

		/**
		 * Generates a unique filename based on the data and parameters given by the user. This filename is stored in $this->filename;
		 *
		 * @param	$type	String	Type of the chart
		 * @param	$data	String	Raw data for this chart
		 * @param	$params	Array	Associative array with parameters for the chart
		 * @returns			String	Filename that is unique for the combination of data and parameters. Filename contains no pathname.
		 */
		private function setUniqueFileName( $type,  $data, $params ) {
			global $wgPChart4mwImageFormat;

			$format = strtolower( $wgPChart4mwImageFormat );
			if( $format != "png" && $format != "jpeg" && $format != "gif" ) {
				$wgPChart4mwImageFormat = "png";
			}

			// Generate a unique filename by computing the MD5 hash of this graph
			$this->filename = md5( $type . $data . serialize( $params ) ) . "." . strtolower( $wgPChart4mwImageFormat );
		}

		/**
		 * Checks whether the specified upload dir exists and is writable. If the directory does not exist, the function attempts to create it.
		 * If the directory can't be created or is not writable, the function ends with an error.
		 *
		 * @returns			String	Absolute path of the upload directory, without trailing directory separator (/ or \)
		 */
		private function getAbsoluteUploadDir() {
			global $wgPChart4mwCacheDir;

			if( defined( "MEDIAWIKI" ) ) {
				global $wgUploadDirectory;
				$directory = $wgUploadDirectory . DIRECTORY_SEPARATOR . $wgPChart4mwCacheDir;
			} else {
				$directory = $_SERVER[ "DOCUMENT_ROOT" ] . $wgPChart4mwCacheDir;
			}

			// If the directory does not exists, try to create it.
			if( !file_exists( $directory ) ) {
				mkdir( $directory, 0777 );
			}

			// Maybe the name points to a file instead of a directory. In that case, return an error.
			if( file_exists( $directory ) && !is_dir( $directory ) ) {
				trigger_error( "pChart4mw cache directory is not a directory. Change the \$wgPChart4mwCacheDir in your settings.", E_USER_ERROR );
			}

			// If the directory is not writable, throw an error.
			if( file_exists( $directory ) && !is_writable( $directory ) ) {
				trigger_error( "pChart4mw cache directory is not writable. Change directory permissions or change the \$wgPChart4mwCacheDir in your settings.", E_USER_ERROR );
			}

			// If the directory exists and is writable, return the absolute pathname
			return $directory;
		}

		/**
		 * Returns the upload directory for use in HTML image tags
		 *
		 * @returns			String	Absolute path of the upload directory, relative to the document root
		 */
		private function getUploadDir() {
			global $wgPChart4mwCacheDir;

			if( defined( "MEDIAWIKI" ) ) {
				global $wgUploadPath;
				$directory = $wgUploadPath . "/" . $wgPChart4mwCacheDir;
			} else {
				$directory = $wgPChart4mwCacheDir;
			}

			return $directory;
		}

		/**
		 * Saves the generated chart to the file specified in $this->filename
		 *
		 */
		private function saveChart() {
			// Render the chart to the specified filename
			$this->pChart->Render( $this->getAbsoluteUploadDir() . DIRECTORY_SEPARATOR . $this->filename );
		}

		/**
		 * Parses 'key = value' type arguments into a $key and $value
		 *
		 * @returns array	First parameter is key, Second parameter is value
		 */
		public static function parseParserFunctionArguments( $argument ) {
			// Find the first = sign in the argument
			$firstpos = strpos( $argument, '=' );

			// If no = sign is found, the whole argument is the key, and there is no value
			if( $firstpos === false ) {
				return array( $argument, "" );
			}

			// Otherwise, split the key and value
			$key = trim( substr( $argument, 0, $firstpos ) );
			$value = trim( substr( $argument, $firstpos + 1 ) );

			return array( $key, $value );
		}

                /**
                 * Renders the chart as a parser function
                 * 
                 * @param  String   Class name to render the chart
		 * @param  Object   The parent parser; more advanced extensions use this to obtain the contextual Title,
		 *                  parse wiki text, expand braces, register link relationships and dependencies etc.
                 * @return String   HTML output with the chart
                 */
                public static function renderParserFunction() {
			// If no className and parser is given, return false
			if( func_num_args() < 2 ) {
				return false;
			}

			$className = func_get_arg( 0 );
                        $parser = func_get_arg( 1 );

			// Walk through all other parameters
			$data = '';
			$args = array();
			for( $i = 2; $i < func_num_args(); $i++ ) {
				list( $key, $value ) = pChart4mw::parseParserFunctionArguments( func_get_arg( $i ) );
				if( $key == 'data' ) {
					$data = $value;
				} else {
					$args[ $key ] = $value;
				}
			}

                        // Call the base method and return the HTML code. The parameters noparse and isHTML are set
			// because otherwise the returned code is not handled as HTML code. See http://www.mediawiki.org/wiki/Manual:Parser_functions
			return array( 
                            call_user_func( array( $className, 'render' ), $data, $args, $parser ),
                            'noparse' => true,
                            'isHTML' => true
                        );

                }
	}
