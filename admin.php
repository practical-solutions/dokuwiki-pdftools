<?php
/**
 * PDF-Tools
 *
 * @license    MIT
 * @author     Gero Gothe <practical@medizin-lernen.de>
 */
 
require_once(DOKU_INC . 'lib/plugins/pdftools/functions.php');

class admin_plugin_pdftools extends DokuWiki_Admin_Plugin {
     
    var $output = '';
    
	function getMenuText(){
		return "Vorlagen für den PDF-Generator";
	}
	
    /**
    * handle user request
    */
    function handle() {
		
		# Check if dw2pdf is activated
		$list = plugin_list();
  		if(in_array('dw2pdf',$list)!==false) return;
  		
		if (!isset($_REQUEST['cmd'])) return;   // first time - nothing to do
		
		$this->output = 'invalid: '.key($_REQUEST['cmd']);
        if (!checkSecurityToken()) return;
        if (!is_array($_REQUEST['cmd'])) return;
     
        // verify valid values
		$command = key($_REQUEST['cmd']);
		
 		
		if (strpos($command,"install:")===0) {
			$command = str_replace("install:","",$command);
			
			$this->output = "COMMAND: Install template '$command'";
			
			recurse_copy(DOKU_PLUGIN."/pdftools/tpl/$command",DOKU_PLUGIN."/dw2pdf/tpl/$command");
		}
		
    }
     
    /**
    * output appropriate html
    */
    function html() {
        ptln('<code>'.htmlspecialchars($this->output).'</code>');
     
        ptln('<form action="'.wl($ID).'" method="post">');
     
        // output hidden values to ensure dokuwiki will return back to this plugin
        ptln('  <input type="hidden" name="do"   value="admin" />');
        ptln('  <input type="hidden" name="page" value="'.$this->getPluginName().'" />');
        formSecurityToken();
		
		$dw = dirList(DOKU_PLUGIN."/dw2pdf/tpl/");
		$pi = dirList(DOKU_PLUGIN."/pdftools/tpl/");
		
		ptln('<h1>PDF-Vorlagen</h1>');
		
		$p_time = filectime(__FILE__);
		ptln ('<hr>');
		
		ptln ('<style>.pdftools_preview:hover{transform:scale(3);box-shadow:0px 0px 17px 12px rgba(0,0,0,0.53);}</style>');
		
		ptln ('<table>');
		
		# Installierte Vorlagen
		foreach ($dw as $v) {
			ptln ('<tr>');
			ptln("<td style='background-color:lightgreen;font-weight:bold'>$v</td>");
			
			
			ptln ("<td>");
			if (in_array($v,$pi) !== false) {
				ptln('<input type="submit" name="cmd[install:'.$v.']"  value="Erneut installieren" /><br><br>');
			} 
			# Zeitpunkt der Installation der Vorlage
			$m_time = filectime(DOKU_PLUGIN."/dw2pdf/tpl/$v/style.css");
			ptln("Installation: ".date("Y-m-d / H:i:s",$m_time));
			
			# Zeitpunkt, an der das Plugin bzw. das Template aktualisiert wurde, prüfen.
			# Aktualisierungshinweis geben, wenn dieser über dem Zeitpunkt der Installation liegt
			if (in_array($v,$pi) !== false) {
				$o_time = filectime(DOKU_PLUGIN."/pdftools/tpl/$v/style.css");
				if ($o_time>$m_time) ptln ("<br><br><span style='color:red'>Die aktuell installierte Vorlage erscheint nicht aktuell</span>.<br>Dieser Hinweis erscheint insb. bei einem Update des Plugins.<br>Update: ".date("Y-m-d / H:i:s",$o_time)."</span>");
			}
			ptln ("</td>");
			
			if (file_exists(DOKU_PLUGIN."/dw2pdf/tpl/$v/preview.png")) {
				ptln ('<td><img class="pdftools_preview" style="height:200px" src="'.DOKU_URL.'lib/plugins/pdftools/tpl/'.$v.'/preview.png"></td>');
			} else ptln("<td><i>Keine Vorschau verfügbar</i></td>");
			
			if (file_exists(DOKU_PLUGIN."/dw2pdf/tpl/$v/description.html")) {
				ptln ('<td>'.file_get_contents(DOKU_URL.'lib/plugins/dw2pdf/tpl/'.$v.'/description.html').'</td>');
			} else ptln("<td><i>Keine Beschreibung verfügbar</i></td>");
			
			ptln ('</tr>');
		}
		
		# Volagen aus dem Vorlagenpaket, welche nicht installiert sind		
		foreach ($pi as $v) {
			if (in_array($v,$dw) === false) {
				ptln ('<tr>');
			
				ptln ("<td style='background-color:linen;font-weight:bold'>$v</td>");
			
				ptln('<td>');
			
				ptln('<input type="submit" name="cmd[install:'.$v.']"  value="Installieren" /><br><br>');
			
				$m_time = filectime(DOKU_PLUGIN."/pdftools/tpl/$v/style.css");
				ptln(date("Y-m-d / H:i:s",$m_time));
				ptln('</td>');
			
				if (file_exists(DOKU_PLUGIN."/pdftools/tpl/$v/preview.png")) {
					ptln ('<td><img class="pdftools_preview" style="height:200px" src="'.DOKU_URL.'lib/plugins/pdftools/tpl/'.$v.'/preview.png"></td>');
				} else ptln("<td><i>Keine Vorschau verfügbar</i></td>");
				
				if (file_exists(DOKU_PLUGIN."/pdftools/tpl/$v/description.html")) {
				ptln ('<td>'.file_get_contents(DOKU_URL.'lib/plugins/pdftools/tpl/'.$v.'/description.html').'</td>');
				} else ptln("<td><i>Keine Beschreibung verfügbar</i></td>");
			
				ptln ('</tr>');
			}
		}
		
		ptln ('</table>');
        ptln('</form>');
		
    }
     
}

