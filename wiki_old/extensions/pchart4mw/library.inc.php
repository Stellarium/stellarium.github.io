<?php
	// Helper functions
	/**
	 * Converts HTML RGB colors to arrays with red, green and blue values
	 *
	 * @param $color	String	HTML-coded string with RGB color. May contain a # as first character. Examples: #00FF00, #CCC, AB82EE
	 * @return			Array	Array with three elements, for red green and blue. The elements are numbers between 0 and 255. If an
	 *							error occurs (no correct RGB color), false is returned.
	 */
	function wfPChart4mwhtml2rgb( $color ) {
		if( $color[ 0 ] == '#' )
			$color = substr( $color, 1 );
		
		if( strlen( $color) == 6 ) {  
			list( $r, $g, $b ) = array( $color[ 0 ] . $color[ 1 ],
										$color[ 2 ] . $color[ 3 ],
										$color[ 4 ] . $color[ 5 ] );
		} elseif( strlen( $color ) == 3 ) {
			list( $r, $g, $b ) = array( $color[ 0 ] . $color[ 0 ],
										$color[ 1 ] . $color[ 1 ],
										$color[ 2 ] . $color[ 2 ] );
		} else {
			return false;
		}
		
		return array( hexdec( $r ), hexdec( $g ), hexdec( $b ) );
	}
	
	/**
	 * Determines the height and width of a specified string on screen
	 *
	 * @param $font		String	Name of font (with file extension) used
	 * @param $text		String	Text of which the size should be determined
	 * @param $angle	String	Angle for showing the text
	 * @param $size		Int		Text size for printing the text
	 * @return			Array	Array with two elements: first element is the width of the textbox, second is the height
	 */
	function wfPChart4mwtextboxSize( $font, $text, $angle = 0, $size = 0 ) {
		global $wgPChart4mwFontPath;
	
		// Determine the bounding box using the GD library
		$bbox = imageftbbox( $size, $angle, $wgPChart4mwFontPath . "/" . $font, $text );
		
		// Compute the size
		return array(
			max( $bbox[ 0 ], $bbox[ 2 ], $bbox[ 4 ], $bbox[ 6 ] ) - min( $bbox[ 0 ], $bbox[ 2 ], $bbox[ 4 ], $bbox[ 6 ] ),
			max( $bbox[ 1 ], $bbox[ 3 ], $bbox[ 5 ], $bbox[ 7 ] ) - min( $bbox[ 1 ], $bbox[ 3 ], $bbox[ 5 ], $bbox[ 7 ] )
		);
	}	
	