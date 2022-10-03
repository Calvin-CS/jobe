<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* ==============================================================
 *
 * Custom Python
 *
 * ==============================================================
 *
 * @copyright  2014 Richard Lobb, University of Canterbury
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('application/libraries/LanguageTask.php');


class Pycustom_Task extends Task {
    public function __construct($filename, $input, $params) {
        parent::__construct($filename, $input, $params);
        $this->default_params['interpreterargs'] = array('-BESs');
    }

    public static function getVersionCommand() {
        return array('python --version', '/Python ([0-9._]*)/');
    }

    // A default name for Python2 programs
    public function defaultFileName($sourcecode) {
        return 'main.py';
    }

    public function compile() {
        $this->executableFileName = $this->sourceFileName;
    }


    public function getExecutablePath() {
        return '/usr/local/lib/conda-wrap/python';
     }


     public function getTargetFile() {
         return $this->sourceFileName;
     }
};

