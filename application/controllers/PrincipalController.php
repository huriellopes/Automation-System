<?php
class Principalcontroller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/principal');
		$this->load->view('automatizado/includes/footer');
	}

	public function preRequisitos() {
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/requisitos/PreRequisitos');
		$this->load->view('automatizado/includes/footer');
	}

}
?>