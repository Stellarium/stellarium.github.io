<?php
/**
 * Special:Gadgets, provides a preview of MediaWiki:Gadgets.
 *
 * @file
 * @ingroup SpecialPage
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2007 Daniel Kinzler
 * @license GNU General Public License 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "not a valid entry point.\n" );
	die( 1 );
}

/**
 *
 */
class SpecialGadgets extends SpecialPage {

	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct( 'Gadgets', '', true );
	}

	/**
	 * Main execution function
	 * @param $par Parameters passed to the page
	 */
	function execute( $par ) {
		$parts = explode( '/', $par );
		if ( count( $parts ) == 2 && $parts[0] == 'export' ) {
			$this->showExportForm( $parts[1] );
		} else {
			$this->showMainForm();
		}
	}
	
	/**
	 * Displays form showing the list of installed gadgets
	 */
	public function showMainForm() {
		global $wgOut, $wgUser, $wgLang, $wgContLang;

		$skin = $wgUser->getSkin();

		$this->setHeaders();
		$wgOut->setPagetitle( wfMsg( "gadgets-title" ) );
		$wgOut->addWikiMsg( 'gadgets-pagetext' );

		$gadgets = Gadget::loadStructuredList();
		if ( !$gadgets ) return;

		$lang = "";
		if ( $wgLang->getCode() != $wgContLang->getCode() ) {
			$lang = "/" . $wgLang->getCode();
		}

		$listOpen = false;

		$msgOpt = array( 'parseinline', 'parsemag' );
		$editInterfaceAllowed = $wgUser->isAllowed( 'editinterface' );
			
		foreach ( $gadgets as $section => $entries ) {
			if ( $section !== false && $section !== '' ) {
				$t = Title::makeTitleSafe( NS_MEDIAWIKI, "Gadget-section-$section$lang" );
				if ( $editInterfaceAllowed ) {
					$lnkTarget = $t
						? $skin->link( $t, wfMsgHTML( 'edit' ), array(), array( 'action' => 'edit' ) ) 
						: htmlspecialchars( $section );
					$lnk =  "&#160; &#160; [$lnkTarget]";
				} else {
					$lnk = '';
				}
				$ttext = wfMsgExt( "gadget-section-$section", $msgOpt );

				if( $listOpen ) {
					$wgOut->addHTML( Xml::closeElement( 'ul' ) . "\n" );
					$listOpen = false;
				}
				$wgOut->addHTML( Html::rawElement( 'h2', array(), $ttext . $lnk ) . "\n" );
			}

			foreach ( $entries as $gadget ) {
				$t = Title::makeTitleSafe( NS_MEDIAWIKI, "Gadget-{$gadget->getName()}$lang" );
				if ( !$t ) continue;

				$links = array();
				if ( $editInterfaceAllowed ) {
					$links[] = $skin->link( $t, wfMsgHTML( 'edit' ), array(), array( 'action' => 'edit' ) );
				}
				$links[] = $skin->link( $this->getTitle( "export/{$gadget->getName()}" ), wfMsgHtml( 'gadgets-export' ) );
				
				$ttext = wfMsgExt( "gadget-{$gadget->getName()}", $msgOpt );

				if( !$listOpen ) {
					$listOpen = true;
					$wgOut->addHTML( Xml::openElement( 'ul' ) );
				}
				$lnk = '&#160;&#160;' . wfMsg( 'parentheses', $wgLang->pipeList( $links ) );
				$wgOut->addHTML( Xml::openElement( 'li' ) .
						$ttext . $lnk . "<br />" .
						wfMsgHTML( 'gadgets-uses' ) . wfMsg( 'colon-separator' )
				);

				$lnk = array();
				foreach ( $gadget->getScriptsAndStyles() as $codePage ) {
					$t = Title::makeTitleSafe( NS_MEDIAWIKI, $codePage );
					if ( !$t ) continue;

					$lnk[] = $skin->link( $t, htmlspecialchars( $t->getText() ) );
				}
				$wgOut->addHTML( $wgLang->commaList( $lnk ) );
				$rights = $gadget->getRequiredRights();
				if ( count( $rights ) ) {
					$wgOut->addHTML( '<br />' . 
						wfMessage( 'gadgets-required-rights', $wgLang->commaList( $rights ), count( $rights ) )->parse()
					);
				}
				if ( $gadget->isOnByDefault() ) {
					$wgOut->addHTML( '<br />' . wfMessage( 'gadgets-default' )->parse() );
				}
				
				$wgOut->addHTML( Xml::closeElement( 'li' ) . "\n" );
			}
		}

		if( $listOpen ) {
			$wgOut->addHTML( Xml::closeElement( 'ul' ) . "\n" );
		}
	}

	/**
	 * Exports a gadget with its dependencies in a serialized form
	 * @param $gadget String Name of gadget to export
	 */
	public function showExportForm( $gadget ) {
		global $wgOut, $wgScript;

		$gadgets = Gadget::loadList();
		if ( !isset( $gadgets[$gadget] ) ) {
			$wgOut->showErrorPage( 'error', 'gadgets-not-found', array( $gadget ) );
			return;
		}
		
		$g = $gadgets[$gadget];
		$this->setHeaders();
		$wgOut->setPagetitle( wfMsg( "gadgets-export-title" ) );
		$wgOut->addWikiMsg( 'gadgets-export-text', $gadget, $g->getDefinition() );

		$exportList = "MediaWiki:gadget-$gadget\n";
		foreach ( $g->getScriptsAndStyles() as $page ) {
			$exportList .= "MediaWiki:$page\n";
		}

		$wgOut->addHTML( Html::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) )
			. Html::hidden( 'title', SpecialPage::getTitleFor( 'Export' )->getPrefixedDBKey() )
			. Html::hidden( 'pages', $exportList )
			. Html::hidden( 'wpDownload', '1' )
			. Html::hidden( 'templates', '1' )
			. Xml::submitButton( wfMsg( 'gadgets-export-download' ) )
			. Html::closeElement( 'form' )
		);
	}
}
