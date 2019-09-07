<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Inscricao extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }
  
        public function save_inscricao_competicao(){
            $data = $this->input->post();
            $this->load->model('inscricao_model');
            $dados = array(
            	'nome' => $data['nomeCompetidor'],
				'nascimento' => $data['nascimentoCompetidor'],
				'cpf' => $data['cpfCompetidor'],
				'sexo' => $data['sexoCompetidor'],
				'academia' => $data['academiaCompetidor'],
				'professor' => $data['professorCompetidor'],
				'faixa' => $data['faixaCompetidor'],
				'peso' => $data['pesoCompetidor'],
				'categoria_peso' => $data['categoriaCompetidor'],
				'idUsuario' => $data['idCompetidor'],
				'whatsapp' => $data['whatsappCompetidor'],
				'email' => $data['emailCompetidor'],
				'endereco' => $data['enderecoCompetidor'],
				'bairro' => $data['bairroCompetidor'],
				'estado' => $data['estadoCompetidor'],
				'cidade' => $data['cidadeCompetidor'],
				'idade' => $data['idadeCompetidor'],
				'idCompeticao' => $data['idCompeticao'],
				'nomeCompeticao' => $data['nomeCompeticao'],
				'enderecoCompeticao' => $data['enderecoCompeticao'],
				'estadoCompeticao' => $data['estadoCompeticao'],
				'cidadeCompeticao' => $data['cidadeCompeticao'],
				'dataCompeticao' => $data['dataCompeticao'],
				'descricaoCompeticao' => $data['descricaoCompeticao'],
				'cartazCompeticao' => $data['cartazCompeticao'],
			);

            $idCompetidor = $this->session->userdata('idUsuario');
            $duplicado = $this->inscricao_model->listaInscricao($idCompetidor);

            if ($duplicado == 1) {
				$_SESSION['duplicado'] = true;
				$this->load->view('usuarios/template/header');
				$this->load->view('usuarios/cadastros/competicao', $dados);
				$this->load->view('template/footer');
				$this->load->view('template/scripts');
            }else{
            	$this->inscricao_model->insert($data);
			}

            /*
            #$lista = $this->inscricao_model->lista_inscricao($idCompetidor);
            $dados = array(
                'inscricao' => $lista,
                'idUsuario' => $idCompetidor, 
            );
            $this->load->view('usuarios/template/header');
            $this->load->view('home');
            $this->load->view('template/footer');
            $this->load->view('template/scripts');
        	*/
        }

    }
?>
