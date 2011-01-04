<?php
/**
 * DokuWiki Plugin parserarray (Renderer Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Håkan Sandell <sandell.hakan@gmail.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

if (!defined('DOKU_LF')) define('DOKU_LF', "\n");
if (!defined('DOKU_TAB')) define('DOKU_TAB', "\t");
require_once DOKU_INC.'inc/parser/renderer.php';

class renderer_plugin_parserarray extends Doku_Renderer {

    /**
     * The format this renderer produces
     */
    public function getFormat(){
        return 'parserarray';
    }

    function document_end() {
        global $ID;
        $id = $ID;
        $instructions = p_cached_instructions(wikiFN($id),false,$id);

        $this->doc .= '<pre>';
        ob_start();
        print_r($instructions);
        $this->doc .= hsc(ob_end_clean());
        $this->doc .= '</pre>';
    }
}

