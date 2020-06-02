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

    public function register(Doku_Event_Handler $controller) {

        $controller->register_hook('PLUGIN_DW2PDF_REPLACE', 'BEFORE', $this, 'replacement_before', null, 100);

    }


    function replacement_before(Doku_Event $event, $param) {
		global $conf;
		global $INFO;

        $event->data['replace']['@COMPANY@'] = $conf['plugin']['pdftools']['company'];	
        $event->data['replace']['@AUTHOR@'] = $INFO['meta']['contributor'][$INFO['user']];

        # Compatibility with approve-plus-plugin: if not installed, the @APPROVER@-Tag is "removed"
        if (!isset($event->data['replace']['@APPROVER@'])) $event->data['replace']['@APPROVER@'] = '';

        # Remove Approve-Tag also, if author = approver
        if (strpos($event->data['replace']['@APPROVER@'],$event->data['replace']['@AUTHOR@']) > 0) $event->data['replace']['@APPROVER@'] = '';

	}
   
}

//Setup VIM: ex: et ts=4 enc=utf-8 :