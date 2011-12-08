/*
 * Footer cleanup for Vector
 */
$( document ).ready( function() {
	$( '#editpage-copywarn' )
		.add( '.editOptions' )
		.wrapAll( '<div id="editpage-bottom"></div>' );
	$( '#wpSummary' )
		.data( 'hint',
			$( '#wpSummaryLabel span small' )
				.remove()
				.text()
				// FIXME - Not a long-term solution. This change should be done in the message itself
				.replace( /\)|\(/g, '' )
		)
		.change( function() {
			if ( $( this ).val().length == 0 ) {
				$( this )
					.addClass( 'inline-hint' )
					.val( $( this ).data( 'hint' ) );
			} else {
				$( this ).removeClass( 'inline-hint' );
			}
		} )
		.focus( function() {
			if ( $( this ).val() == $( this ).data( 'hint' ) ) {
				$( this )
					.removeClass( 'inline-hint' )
					.val( "" );
			}
		})
		.blur( function() { $( this ).trigger( 'change' ); } )
		.trigger( 'change' );
	$( '#wpSummary' )
		.add( '.editCheckboxes' )
		.wrapAll( '<div id="editpage-summary-fields"></div>' );
		
	$( '#editpage-specialchars' ).remove();
	
	// transclusions
	// FIXME - bad CSS styling here with double class selectors. Should address here. 
	var transclusionCount = $( '.templatesUsed ul li' ).size();
	$( '.templatesUsed ul' )
		.wrap( '<div id="transclusions-list" class="collapsible-list collapsed"></div>' )
		.parent()
		// FIXME: i18n, remove link from message and let community add link to transclusion page if it exists
		.prepend( '<label>This page contains <a href="http://en.wikipedia.org/wiki/transclusion">transclusions</a> of <strong>'
			+ transclusionCount 
			+ '</strong> other pages.</label>' );
	$( '.mw-templatesUsedExplanation' ).remove();
	
	$( '.collapsible-list label' )
		.click( function() {
			$( this )
				.parent()
				.toggleClass( 'expanded' )
				.toggleClass( 'collapsed' )
				.find( 'ul' )
				.slideToggle( 'fast' );
			return false;
		})
		.trigger( 'click' );
	$( '#wpPreview, #wpDiff, .editHelp, #editpage-specialchars' )
		.remove();
	$( '#mw-editform-cancel' )
		.remove()
		.appendTo( '.editButtons' );
} );
