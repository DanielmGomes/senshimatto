<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->library('session');
		}

		/*
		* controller referente ao home do site, todas as funções de abrir paginas iniciais do site
		*/

		public function index() { # function para abrir pagina inicial do site
			if ($this->session->userdata('idUsuario')) { # verifica se o usuario está logado, caso esteja abre header expecifico de usuario
				$this->load->view('usuarios/template/header');
				$this->load->view('index');
				$this->load->view('template/footer');
				$this->load->view('template/scripts');				
			}else { # caso usuario não logado, abre header padrão do site
				$this->load->view('template/header');
				$this->load->view('index');
				$this->load->view('template/footer');
				$this->load->view('template/scripts');	
			}
		}

		public function filiacoes(){ # function para acessar pagina de login de professores
			$this->load->view('template/header');
			$this->load->view('professores/login');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}

		public function acessar_conta() { # abre a pagina de login do usuario
			$this->load->view('template/header');
			$this->load->view('usuarios/login');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}

		public function cadastroUsuario(){ # abre a pagina de cadastro de ususarios
			$this->load->model('estado_model');
			$this->load->model('cidade_model');
			$this->load->model('competicao_model');

			$dados = array(
				'options_estados' => $this->estado_model->select_estados(),
			);
	
			$this->load->view('template/header');
			$this->load->view('cadastroUsuario', $dados);
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}

		public function getMunicipios(){
			$this->load->model('cidade_model');
			$uf_estado = $this->input->post('uf_estado');
			sleep(1);
			echo $this->cidade_model->select_municipios($uf_estado);
		}

		public function not_found(){ # caso a pagina ainda não tenha sito concluida, carrega mensagem de erro
			$this->load->view('error404');
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

?>
