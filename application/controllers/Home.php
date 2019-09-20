<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if ($this->session->userdata('idUsuario')) {
			$this->load->view('usuarios/template/header');
			$this->load->view('home');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');				
		}else {
			$this->load->view('template/header');
			$this->load->view('home');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');	
		}
	}

	public function competicoes()
	{
		$this->load->view('template/header');
		$this->load->view('competicoes');
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function cadastroUsuario()
	{
		$this->load->model('estado_model');
		$this->load->model('cidade_model');
		$this->load->model('competicao_model');
		$lista = $this->competicao_model->lista_academia();
		$dados = array(
			'academia' => $lista,
		);
		$this->load->view('template/header');
		$this->load->view('cadastroUsuario', $dados);
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function login()
	{
		$this->load->view('template/header');
		$this->load->view('login');
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function not_found(){
		$this->load->view('error404');
	}

	public function cidades(){
		$this->load->view('cidades');
	}
	
	public function lista_inscricao(){

		$idCompetidor = $this->session->userdata('idUsuario');
		$this->load->model('inscricao_model');
		$lista = $this->inscricao_model->lista_inscricao($idCompetidor);
		$dados = array(
			'inscricao' => $lista,
			'idUsuario' => $idCompetidor, 
		);

		$this->load->view('usuarios/template/header');
		$this->load->view('usuarios/inscricoes', $dados);
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

}
