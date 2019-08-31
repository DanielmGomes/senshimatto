<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuarios extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
		}

		public function index()
		{
			if ($this->session->userdata('idUsuario')) {
				$this->load->view('usuarios/template/header');
				$this->load->view('usuarios/home');
				$this->load->view('template/footer');
				$this->load->view('template/scripts');
	
			}else {
				$data = array(
					"scripts" => array(
						'util.js',
						'login.js'
					)
				);
				$this->load->view('login', $data);
			}
		}

		public function login()
		{	
			/*
			if (!$this->input->is_ajax_request) {
				exit('acesso negado');
			}
			*/	
			$json = array();
			$json["status"] = 1;
			$json["error_list"] = array();
			
			$username = $this->input->post("username");
			$password = sha1($this->input->post("password"));
	
			if (empty($username) or empty($password)) {
				$json['status'] = 0;
				$json['error_list']['#username'] = 'usuario ou senha nao pode ser vazio';			
			}else {
				$this->load->model('usuario_model');
				$result = $this->usuario_model->get_user_data($username);
				if ($result) {
					$idUsuario = $result->idUsuario;
					$usuario = $result->usuario;
					$senha = $result->senha;
					if ($password == $senha) {
						$this->session->set_userdata("idUsuario", $idUsuario);
						$this->session->set_userdata('usuario', $usuario);
						$this->load->view('usuarios/template/header');
						$this->load->view('home');
						$this->load->view('template/footer');
						$this->load->view('template/scripts');
					}else {
						$json['status'] = 0;
					}
				}  else {
					$json['status'] = 0;
				}
				if ($json['status'] == 0) {
					$json['error_list']['#btn_login'] = 'usuario ou senha incorretos';
				}
			}
	
			#echo json_encode($json);
		}
	
		public function logoff(){
			$this->session->sess_destroy();
			$this->load->view('template/header');
			$this->load->view('login');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}
			
		public function save_usuario(){
			$json = array();
			$json["status"] = 1;
			$json["error_list"] = array();
			
			$this->load->model('usuario_model');
			#$data = $this->input->post();

			$data = array(
				'nome' => $this->input->post('nome'),
				'nascimento' => $this->input->post('nascimento'),
				'cpf' => $this->input->post('cpf'),
				'sexo' => $this->input->post('sexo'),
				'whatsapp' => $this->input->post('whatsapp'),
				'email' => $this->input->post('email'),
				'academia' => $this->input->post('academia'),
				'professor' => $this->input->post('professor'),
				'usuario' => $this->input->post('usuario'),				
				'senha' => sha1($this->input->post('senha'))
			);
			
			$this->usuario_model->insert($data);

			$this->load->view('template/header');
			$this->load->view('login');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');

			/*
			if ($this->usuario_model->is_duplicated('usuario', $data['usuario'], $data['idUsuario'])) {
				$json['error_list']['#usuario'] = 'usuario já cadastrado';
			}

			if (empty($json['error_list'])) {
				$json['status'] = 0;
			}else {
				if (empty($data['idUsuario'])) {
					$this->usuario_model->insert($data);
				}else {
					$idUsuario = $data['idUsuario'];
					unset($data['idUsuario']);
					$this->usuario_model->update($idUsuario, $data);
				}
			}
			*/
		}

		public function minhaConta()
		{
			if ($this->session->userdata('idUsuario')) {
				$idUsuario = $this->session->userdata('idUsuario');
                $this->load->model('usuario_model');

				$data = $this->usuario_model->get_data($idUsuario)->result_array()[0];
								
                $dados = array(
                    'idUsuario' => $data['idUsuario'],
                    'nome' => $data['nome'],
                    'nascimento' => $data['nascimento'],
                    'cpf' => $data['cpf'],
                    'sexo' => $data['sexo'],
                    'whatsapp' => $data['whatsapp'],
                    'email' => $data['email'],
                    'academia' => $data['academia'],
                    'professor' => $data['professor'],
					'peso' => $data['peso'],
					'endereco' => $data['endereco'],
					'bairro' => $data['bairro'],
					'estado' => $data['estado'],
					'cidade' => $data['cidade'],
					'usuario' => $data['usuario'],
					'senha' => $data['senha'],
				);

				$this->load->view('usuarios/template/header');
				$this->load->view('usuarios/minhaConta', $dados);
				$this->load->view('template/footer');
				$this->load->view('template/scripts');
	
			}else {

			}
		}

		public function edita_usuario(){
			$idUsuario = $this->session->userdata('idUsuario');
			$data = array(
				'nome' => $this->input->post('nome'),
				'nascimento' => $this->input->post('nascimento'),
				'cpf' => $this->input->post('cpf'),
				'sexo' => $this->input->post('sexo'),
				'whatsapp' => $this->input->post('whatsapp'),
				'email' => $this->input->post('email'),
				'academia' => $this->input->post('academia'),
				'professor' => $this->input->post('professor'),
				'peso' => $this->input->post('peso'),
				'endereco' => $this->input->post('endereco'),
				'bairro' => $this->input->post('bairro'),
				'estado' => $this->input->post('estado'),
				'cidade' => $this->input->post('cidade'),
				'usuario' => $this->input->post('usuario'),
				'senha' => $this->input->post('senha'),
			);			

			$this->load->model('usuario_model');
			$this->usuario_model->update($idUsuario, $data);
		}

	}

?>