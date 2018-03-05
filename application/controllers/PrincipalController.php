<?php
class Principalcontroller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ConfiguracoesModel');
		$this->load->helper('url');
	}

	public function index() {
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/principal');
		$this->load->view('automatizado/includes/footer');
	}

	public function ConfigInicial() {
		$this->ConfiguracoesModel->VerificaTabela();

		$dados['dados'] = $this->ConfiguracoesModel->CarregaConfig();
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/pages/configinicial',$dados);
		$this->load->view('automatizado/includes/footer');
	}

	public function CarregaConfig() {
		$dados['dados'] = $this->ConfiguracoesModel->CarregaConfig();
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/pages/configinicial',$dados);
		$this->load->view('automatizado/includes/footer');
	}

	public function GravaConfig() {
		$this->ConfiguracoesModel->gravaConfig();
		$this->ConfiguracoesModel->CriaFuncao();

		$this->CarregaConfig();
	}

	public function atualizaConfig() {
		$this->ConfiguracoesModel->atualizaConfig();
		$this->ConfiguracoesModel->CriaFuncao();

		$this->CarregaConfig();
	}

	public function CriaSQL() {
		$this->ConfiguracoesModel->CriaArquivo();
		
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/pages/CriaSQL');
		$this->load->view('automatizado/includes/footer');
	}

	public function CriaArquivo() {
		$this->ConfiguracoesModel->GravaArquivo();
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$msg['msg'] = "<div class='alert alert-success' role='alert'><strong>Tabela Criada no Arquivo, Continue preenchendo o formulário, para terminar o arquivo SQL!</strong></div>";
		$this->load->view('msg/msg_success',$msg);
		$this->load->view('automatizado/pages/CriaSQL');
		$this->load->view('automatizado/includes/footer');
	}

	public function LigarForeignKey() {
		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$this->load->view('automatizado/pages/ligarForeignKey');
		$this->load->view('automatizado/includes/footer');
	}

	public function GravaKey() {
		$this->ConfiguracoesModel->LigaForeign();

		$this->load->view('automatizado/includes/header');
		$this->load->view('automatizado/includes/menu');
		$msg['msg'] = "<div class='alert alert-success' role='alert'><strong>Foreign key ligada com sucesso, continue preenchendo, para continuar ligando as foreign keys!</strong></div>";
		$this->load->view('msg/msg_success',$msg);
		$this->load->view('automatizado/pages/ligarForeignKey');
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