<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Professores extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('session');

        }
        
        /*
        * controller responsavel por todas as funcionalidades ligadas aos professores 
        */

		public function login(){
			$json = array();
			$json["status"] = 1;
			$json["error_list"] = array();
			
			$username = $this->input->post("username");
			$password = sha1($this->input->post("password"));
	
			if (empty($username) or empty($password)) {
                $json['status'] = 0;
                
                $_SESSION['erro_usuario'] = true;
                $this->load->view('template/header');
                $this->load->view('professores/login');
                $this->load->view('template/footer');
                $this->load->view('template/scripts');		
			}else{
				$this->load->model('professor_model');
				$result = $this->professor_model->get_professor($username);
                
                if ($result) {
					$idProfessor = $result->idProfessor;
					$professor = $result->professor;
					$senha = $result->senha;
                    
                    if ($password == $senha) {
						$this->session->set_userdata('idProfessor', $idProfessor);
						$this->session->set_userdata('professor', $professor);

						/*
						* condição para verificar se o professor já cadastrou sua academia, 
						* caso seja o primeiro login abrirá pagina para cadastro da sua academia 
						*/

						$this->load->model('academia_model');
						$this->load->model('estado_model');
						$this->load->model('cidade_model');

						$resultado = $this->academia_model->consulta_academia($idProfessor);

						if (isset($resultado->idAcademia)) {
							/*
							* caso o professor já tenha cadastrado a academia 
							*/
							$dados = array(
								'idAcademia' => $resultado->idAcademia,
								'academia' => $resultado->academia,
								'id_academia_professor' => $resultado->id_academia_professor,
								'professor_academia' => $resultado->professor_academia,
								'endereco' => $resultado->endereco,
								'bairro' => $resultado->bairro,
								'estado' => $resultado->estado,
								'cidade' => $resultado->cidade,
								'telefone' => $resultado->telefone,
								'email' => $resultado->email,
								'site' => $resultado->site,
								'federacao' => $resultado->federacao,
								'foto' => $resultado->foto,
								'options_estados' => $this->estado_model->select_estados(),
							);	

							$_SESSION['cadastro_academia'] = true;
							$this->load->view('professores/template/header');
							$this->load->view('professores/minha_conta', $dados);
							$this->load->view('template/footer');
							$this->load->view('template/scripts');
						}else {
							/*
							 * caso o professor ainda não tenha cadastrado a academia 
							 */
							$dados = array(
								'options_estados' => $this->estado_model->select_estados(),
							);
							$_SESSION['academia'] = true;
							$this->load->view('professores/template/header');
							$this->load->view('professores/minha_conta', $dados);
							$this->load->view('template/footer');
							$this->load->view('template/scripts');
						}



						#if ($dados['id_academia_professor'] == $idProfessor) {
							/*
							* verifica se a consulta encontrou academia do professor 
							* caso sim, carrega os dados da academia 
							*/
						#	$_SESSION['cadastro_academia'] = false;
							#$this->load->view('professores/template/header');
							#$this->load->view('teste');
							#$this->load->view('template/footer');
							#$this->load->view('template/scripts');
						}#else{
							/*
							* verifica se a consulta encontrou academia do professor 
							* caso não, carrega pagina para cadastro da academia 
							*/
						#	$_SESSION['cadastro_academia'] = true;
							#$this->load->view('professores/template/header');
							#$this->load->view('teste');
							#$this->load->view('template/footer');
							#$this->load->view('template/scripts');							
						#}
/*
					}else{
                        $_SESSION['erro_login'] = true;
                        $this->load->view('template/header');
                        $this->load->view('professores/login');
                        $this->load->view('template/footer');
                        $this->load->view('template/scripts');		
					}
*/
				}else{

                    $_SESSION['erro_login'] = true;
                    $this->load->view('template/header');
                    $this->load->view('professores/login');
                    $this->load->view('template/footer');
                    $this->load->view('template/scripts');		
				}
				if ($json['status'] == 0) {
					$_SESSION['erro_login'] = true;
					$this->load->view('template/header');
					$this->load->view('professores/login');
					$this->load->view('template/footer');
					$this->load->view('template/scripts');
                }
			}
			#echo json_encode($json);
		}
	
		public function logoff(){
			$this->session->sess_destroy();
			$this->load->view('template/header');
			$this->load->view('usuarios/login');
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}

		public function getMunicipios(){
			$this->load->model('cidade_model');
			$uf_estado = $this->input->post('uf_estado');
			sleep(1);
			echo $this->cidade_model->select_municipios($uf_estado);
		}
	}

?>