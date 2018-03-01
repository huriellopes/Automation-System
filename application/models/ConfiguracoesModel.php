<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoesmodel extends CI_Model {
	// variavels
	public $teste = null; 

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->dbutil();
    }

}
?>