<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if ($this->session->userdata('idEquipe')) {

			$this->load->model('usuario_model');

			$total = $this->usuario_model->total_usuarios();
			$sexo_masculino = $this->usuario_model->total_usuarios_masculino();
			$sexo_feminino = $this->usuario_model->total_usuarios_feminino();

			$dados = array(
				'total' => $total,
				'sexo_masculino' => $sexo_masculino,
				'sexo_feminino' => $sexo_feminino,
			);

			$this->load->view('admin/template/header');
			$this->load->view('admin/home', $dados);
			$this->load->view('admin/template/footer');
			$this->load->view('admin/template/scripts');

		}else {
			$this->load->view('admin/login');
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
		$password = $this->input->post("password");

		if (empty($username) or empty($password)) {
			$json['status'] = 0;
			$json['error_list']['#username'] = 'usuario ou senha nao pode ser vazio';			
		}else {
			$this->load->model('administrativo_model');
			$result = $this->administrativo_model->get_user_data($username);
			if ($result) {
				$idEquipe = $result->idEquipe;
				$equipe = $result->equipe;
				$senha = $result->senha;

				$this->load->model('usuario_model');

				$total = $this->usuario_model->total_usuarios();
				$sexo_masculino = $this->usuario_model->total_usuarios_masculino();
				$sexo_feminino = $this->usuario_model->total_usuarios_feminino();

				$dados = array(
					'total' => $total,
					'sexo_masculino' => $sexo_masculino,
					'sexo_feminino' => $sexo_feminino,
				);

				if (md5('$password') == $senha) {
					$this->session->set_userdata("idEquipe", $idEquipe);
					$this->session->set_userdata('equipe', $equipe);
					$this->load->view('admin/template/header');
					$this->load->view('admin/home', $dados);
					$this->load->view('admin/template/footer');
					$this->load->view('admin/template/scripts');
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
		$this->load->view('admin/login');
	}

	public function competicoes()
	{
		if ($this->session->userdata('idEquipe')) {
			$this->load->model('competicao_model');
			$lista = $this->competicao_model->lista_competicao();
			$dados = array('competicao' => $lista);
			$this->load->view('admin/template/header');
			$this->load->view('admin/cadastros/competicoes', $dados);
			$this->load->view('admin/template/footer');
			$this->load->view('admin/template/scripts');

		}else {
			$data = array(
				"scripts" => array(
					'util.js',
					'restrict.js'
				)
			);
			$this->load->view('admin/login', $data);
		}
	}

	public function ajax_import_img()
	{
		if (!$this->input->is_ajax_request()) {
			exit('Nenhum acesso ao script permitido');
		}

		$config['upload_path'] = './tmp/';
		$config['allowed_types'] = 'gif|png|jpg';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		$json = array();
		$json['status'] = 1;

		if (!$this->upload->do_upload('image_file')) {
			$json['status'] = 0;
			$json['error'] = $this->upload->display_errors('','');
		}else {
			if ($this->upload->data()['file_size'] <= 1000000) {
				$file_name = $this->upload->data()['file_name'];
				$json['img_path'] = base_url() . 'tmp/' . $file_name;
			}else {
				$json['status'] = 0;
				$json['error'] = 'Imagem não pode ser maior que 5MB';
	
			}
		}

		echo json_encode($json);

	}

	public function ajax_save_competicao(){
		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array();

		$this->load->model('administrativo_model');
		$data = $this->input->post();

		if (empty($data['nomeEvento'])) {
			$json['error_list']['#nomeEvento'] = 'Nome do Evento Obrigatorio';			
		}else {
			if ($this->administrativo_model->is_duplicated('nomeEvento', $data['nomeEvento'], $data['idCompeticao'])) {
				$json['error_list']['#nomeEvento'] = 'Nome do Evento Já Existente';							
			}
		}

		if (!empty($data['cartaz'])) {
			$file_name = basename($data['cartaz']);
			$old_path = getcwd() . '/tmp/' . $file_name;
			$new_path = getcwd() . '/public/images/competicoes/' . $file_name;
			rename($old_path, $new_path);

			$data['cartaz'] = '/public/images/competicoes/' . $file_name;
		}

		if (empty($data['idCompeticao'])) {
			$this->administrativo_model->insert($data);
		}else{
			$idCompeticao = $data['idCompeticao'];
			$this->administrativo_model->update($data);
		}
		$this->load->model('competicao_model');
		$lista = $this->competicao_model->lista_competicao();
		$dados = array('competicao' => $lista);
		$this->load->view('admin/template/header');
		$this->load->view('admin/cadastros/competicoes', $dados);
		$this->load->view('admin/template/footer');
		$this->load->view('admin/template/scripts');
}

	public function ajax_list_competicao(){

		$this->load->model('competicao_model');
		$competicao = $this->competical_model->get_datatable();
		
		$data = array();
		foreach ($competicao as $competicao) {
			$row = array();

			if ($competicao->cartaz) {
				#$row[] = '<img src="'.base_url().$competicao->cartaz'" />';
				$row[] = "<td>" ."<img src='".base_url().$competicao->cartaz."' style='height: 45px; width: 45px;'>". "</td>";

			}else {
				#row[] = "";
			}

			$row[] = $competicao->nomeEvento;
			$row[] = $competicao->endereco;

			$row[] = "<div style='display: inline-block;'>" 
				."<button class='btn btn-primary btn-edit-competicao' idCompeticao='".$competicao->idCompeticao."'>". 
				"<i class='fa fa-edit'></i>". 
				"</button>". 
				"<button class='btn btn-danger btn-del-competicao' idCompeticao='".$competicao->idCompeticao."'>". 
				"<i class='fa fa-trash'></i>".
				"</button>".
				"</div>";
			
			$data = row;

		}

		$json = array(
			'draw' => $this->input->post('draw'),
			'records_total' => $this->competicao_model->records_total(),
			'records_filtered' => $this->competicao_model->records_filtered(),
			'data' => $data,
		);

		echo json_encode($json);

	}

	public function testeLista(){
		$this->load->model('teste_model');
		$lista = $this->teste_model->buscaTodos();
		$dados = array('competicao' => $lista);
		$this->load->view('teste', $dados);
		$this->load->view('admin/template/header');

		$this->load->view('admin/template/footer');
		$this->load->view('admin/template/scripts');
	}

	public function inscricoes(){
		$this->load->model('inscricao_model');
		$lista = $this->inscricao_model->lista_inscricao();
		$dados = array(
			'inscricao' => $lista,
		);
		$this->load->view('admin/template/header');
		$this->load->view('admin/relatorios/inscricoes', $dados);
		$this->load->view('admin/template/footer');
		$this->load->view('admin/template/scripts');
	}

	public function not_found(){
		$this->load->view('error404');
	}

	public function caixa(){
		$this->load->model('inscricao_model');
		$lista = $this->inscricao_model->lista_inscricao();
		$total = $this->inscricao_model->total_inscricoes();
		$inscricoes_pagas = $this->inscricao_model->inscricoes_pagas();
		$dados = array(
			'inscricao' => $lista,
			'total' => $total,
			'inscricoes_pagas' => $inscricoes_pagas,
		);
		$this->load->view('admin/template/header');
		$this->load->view('admin/relatorios/caixa', $dados);
		$this->load->view('admin/template/footer');
		$this->load->view('admin/template/scripts');
	}

	public function edita_caixa(){
		$idInscricao = $this->input->post('idInscricao');
		$data = array(
			'situacaoPagamento' => $this->input->post('situacaoPagamento'),
		);
		$this->load->model('inscricao_model');
		$lista = $this->inscricao_model->lista_inscricao();
		$total = $this->inscricao_model->total_inscricoes();
		$inscricoes_pagas = $this->inscricao_model->inscricoes_pagas();
		$dados = array(
			'inscricao' => $lista,
			'total' => $total,
			'inscricoes_pagas' => $inscricoes_pagas,
		);
		$this->load->model('inscricao_model');
		$this->inscricao_model->update($idInscricao, $data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/relatorios/caixa', $dados);
		$this->load->view('admin/template/footer');
		$this->load->view('admin/template/scripts');
	}

	public function cadastro_caixa(){
		$this->load->model('inscricao_model');
		$data = $this->input->post();
		$this->load->model('inscricao_model');
		$lista = $this->inscricao_model->lista_inscricao();
		$total = $this->inscricao_model->total_inscricoes();
		$inscricoes_pagas = $this->inscricao_model->inscricoes_pagas();
		$dados = array(
			'inscricao' => $lista,
			'total' => $total,
			'inscricoes_pagas' => $inscricoes_pagas,
		);
		$this->inscricao_model->insert($data);
		$this->load->view('admin/template/header');
		$this->load->view('admin/relatorios/caixa', $dados);
		$this->load->view('admin/template/footer');
		$this->load->view('admin/template/scripts');

	}
}
