<?php
/**
 * PDF-Tools
 *
 * @license    MIT
 * @author     Gero Gothe <practical@medizin-lernen.de>
 */


# must be run within Dokuwiki
if(!defined('DOKU_INC')) die();


class action_plugin_pdftools extends DokuWiki_Action_Plugin {

    /**
     * Register callbacks
     */
    public function register(Doku_Event_Handler $controller) {
		
		$controller->register_hook('PLUGIN_DW2PDF_REPLACE', 'BEFORE', $this, 'replacement_before');
				
    }
    
    
    
    function replacement_before(Doku_Event $event, $param) {
		global $conf;
		global $INFO;
			
		$event->data['replace']['@COMPANY@'] = $conf['plugin']['pdftools']['company'];	
		$event->data['replace']['@AUTHOR@'] = $INFO['meta']['contributor'][$INFO['user']];
	}
    
	
	
   
}

//Setup VIM: ex: et ts=4 enc=utf-8 :