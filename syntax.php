<?php
/**
 * PDF-Tools
 *
 * @license    MIT
 * @author     Gero Gothe <practical@medizin-lernen.de>
 */
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_pdftools extends DokuWiki_Syntax_Plugin {

    private $dw2pdf_inst = false;

    function getType(){return 'substition';}

    function getSort(){return 59;}

  	# Checks if dw2pdf is installed/activated
  	function __construct() {
  		$list = plugin_list();
  		if(in_array('dw2pdf',$list)) {
  			$this->dw2pdf_inst = true;
  		}
  	}

    # Add patterns
    function connectTo($mode) {
        $this->Lexer->addEntryPattern('<pdf (?=.*?>)',$mode,'plugin_pdftools');
        $this->Lexer->addSpecialPattern('<etikett>',$mode,'plugin_pdftools');
    }


    function postConnect() {
      $this->Lexer->addExitPattern('>','plugin_pdftools');
    }


    /* Handle the match */
    function handle($match, $state, $pos, Doku_Handler $handler){
       return array($state,$match);
    }


    /* Create output */
    function render($format, Doku_Renderer $renderer, $data) {
        global $ID;
        if($format != 'xhtml') return false;

        $match = $data[0];
        list($state, $match) = $data;

        if ($match=='<etikett>') {
          $renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/etikett.png">';
          return true;
        }

        if (!$this->dw2pdf_inst) {
    			$renderer->doc .= '<i class="noprint">Plugin <u>dw2pdf</u> benötigt.</i><br>';
    		} else {
          if ($state == DOKU_LEXER_UNMATCHED) {
            $renderer->doc .= "<div class='noprint'>
                               <a href='doku.php?id=$ID&do=export_pdf&toc=0&tpl=$match'>";
            $renderer->doc .= '<img src="'.DOKU_BASE.'lib/plugins/pdftools/pdfbutton.php?text='.$match.'"></a></div>';
          }

        }

        return true;

    } # function render


}

//Setup VIM: ex: et ts=4 enc=utf-8 :
