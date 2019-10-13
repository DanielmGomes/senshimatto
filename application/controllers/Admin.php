<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller{

        public function __construct(){
        
            parent::__construct();
		    $this->load->library('session');

        }

        /*
        *
        * controller com todas as funções para abrir as paginas do administrativo
        *
        */

        public function index(){ # function para abrir pagina index do setor administrativo / area de login
        
            if ($this->session->userdata('idEquipe')) { # verifica se o usuario está logado 

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

            }else { # caso usuario não logado redirecionado para login

                $this->load->view('admin/login');
            }
        }

        public function login(){ # function de login setor administrativo

            $json = array();
            $json["status"] = 1;
            $json["error_list"] = array();
            
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            if (empty($username) or empty($password)){ # verifica se usuario ou senha estão vazios
                
                $json['status'] = 0;
                $json['error_list']['#username'] = 'usuario ou senha nao pode ser vazio';			
            
            }else { # caso usuario e senha não vazio

                $this->load->model('administrativo_model');
                
                $result = $this->administrativo_model->get_user_data($username);
                
                if ($result) { # verifica se usuario existe
                
                    $idEquipe = $result->idEquipe;
                    $equipe = $result->equipe;
                    $senha = $result->senha;

                    $this->load->model('usuario_model');

                    $total = $this->usuario_model->total_usuarios();
                    $sexo_masculino = $this->usuario_model->total_usuarios_masculino();
                    $sexo_feminino = $this->usuario_model->total_usuarios_feminino();

                    $dados = array( # carrega dados para preencher informações pagina home 

                        'total' => $total,
                        'sexo_masculino' => $sexo_masculino,
                        'sexo_feminino' => $sexo_feminino,
                    
                    );

                    if (md5('$password') == $senha) { # verifica se senha digitada confere com senha aramazenada no banco do usuario
                    
                        $this->session->set_userdata("idEquipe", $idEquipe);
                        $this->session->set_userdata('equipe', $equipe);
                        $this->load->view('admin/template/header');
                        $this->load->view('admin/home', $dados);
                        $this->load->view('admin/template/footer');
                        $this->load->view('admin/template/scripts');
                    
                    }else { # caso erro / senha não confere

                        $json['status'] = 0;
                        
                    }
                }  else { # caso erro / usuario não confere
                    $json['status'] = 0;
                }
                if ($json['status'] == 0) { # caso erro / usuario e senha não confere
                    $json['error_list']['#btn_login'] = 'usuario ou senha incorretos';
                }
            }

            #echo json_encode($json);
        }

        public function logoff(){ # função logoff setor adminstrativo

            $this->session->sess_destroy();
            $this->load->view('admin/login');
        
        }

        public function competicoes(){ # function abrir setor competições 

            if ($this->session->userdata('idEquipe')) { # verifica se usuario está logado

                $this->load->model('competicao_model');
                
                $lista = $this->competicao_model->lista_competicao();
                $dados = array('competicao' => $lista); # recebe lista de todos os lutadores cadastrados na competição

                $this->load->view('admin/template/header');
                $this->load->view('admin/cadastros/competicoes', $dados);
                $this->load->view('admin/template/footer');
                $this->load->view('admin/template/scripts');

            }else { # caso usuario não logado 

                $dados = array( # carrega js expecifico da pagina

                    "scripts" => array(

                        'util.js',
                        'restrict.js'
                    )

                );
                
                $this->load->view('admin/login', $dados);
            }
        }

        public function ajax_import_img(){ # function carregar cartaz da competição 
            
            if (!$this->input->is_ajax_request()) {

                exit('Nenhum acesso ao script permitido');
                
            }
            
            $config['upload_path'] = './tmp/'; # pasta de armazenamento temporario do cartaz
            $config['allowed_types'] = 'gif|png|jpg'; # formatos suportados de imagem
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            $json = array();
            $json['status'] = 1;

            if (!$this->upload->do_upload('image_file')) {

                $json['status'] = 0;
                $json['error'] = $this->upload->display_errors('','');
            
            }else {

                if ($this->upload->data()['file_size'] <= 1000000) { # tamanho maximo da imagem

                    $file_name = $this->upload->data()['file_name'];
                    $json['img_path'] = base_url() . 'tmp/' . $file_name; 
                
                }else { # caso erro

                    $json['status'] = 0;
                    $json['error'] = 'Imagem não pode ser maior que 5MB';
        
                }
                
            }

            echo json_encode($json);

        }

        public function ajax_save_competicao(){ # function que salva o cadastro da competição

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

                $data['cartaz'] = '/public/images/competicoes/' . $file_name; # caminho que imagem do cartaz será armazenado
            
            }

            if (empty($data['idCompeticao'])) {
            
                $this->administrativo_model->insert($data); # salva a competição no banco
            
            }else{ # caso id já existente executa update
            
                $idCompeticao = $data['idCompeticao'];
                $this->administrativo_model->update($data);
            
            }
            
            $this->load->model('competicao_model');

            $lista = $this->competicao_model->lista_competicao(); 
            $dados = array('competicao' => $lista); # carrega lista de todos os lutadores já cadastrados na competição
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/cadastros/competicoes', $dados);
            $this->load->view('admin/template/footer');
            $this->load->view('admin/template/scripts');
        }

        public function ajax_list_competicao(){ # function que executa listagem da competição via ajax / não está em uso

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

        /*
        public function testeLista(){

            $this->load->model('teste_model');
            $lista = $this->teste_model->buscaTodos();
            $dados = array('competicao' => $lista);
            $this->load->view('teste', $dados);
            $this->load->view('admin/template/header');

            $this->load->view('admin/template/footer');
            $this->load->view('admin/template/scripts');
            
        }
        */

        public function inscricoes(){ # function carrega inscrições

            $this->load->model('inscricao_model');
            
            $lista = $this->inscricao_model->lista_inscricao();
            $dados = array( # carrega todos os lutadores inscritos na competição
            
                'inscricao' => $lista,
            
            );
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/relatorios/inscricoes', $dados);
            $this->load->view('admin/template/footer');
            $this->load->view('admin/template/scripts');
            
        }

        public function not_found(){ # algumas funções foram idealizadas mais ainda não foram feitas / carrega pagina de erro

            $this->load->view('error404');
            
        }

        public function caixa(){ # function carrega caixa da competição

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

        public function edita_caixa(){ # function de edição do caixa

            $this->load->model('inscricao_model');
            $this->load->model('inscricao_model');
            
            $lista = $this->inscricao_model->lista_inscricao();
            $total = $this->inscricao_model->total_inscricoes();
            $inscricoes_pagas = $this->inscricao_model->inscricoes_pagas();

            $idInscricao = $this->input->post('idInscricao');

            $data = array(

                'situacaoPagamento' => $this->input->post('situacaoPagamento'),

            );

            $dados = array(

                'inscricao' => $lista,
                'total' => $total,
                'inscricoes_pagas' => $inscricoes_pagas,

            );

            $this->inscricao_model->update($idInscricao, $data);
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/relatorios/caixa', $dados);
            $this->load->view('admin/template/footer');
            $this->load->view('admin/template/scripts');
            
        }

        public function cadastro_caixa(){ # function cadastro de lutadores no caixa (pode ocorrer pagamentos no local)

            $this->load->model('inscricao_model');
            $this->load->model('inscricao_model');
            
            $data = $this->input->post();
            $lista = $this->inscricao_model->lista_inscricao();
            $total = $this->inscricao_model->total_inscricoes();
            $inscricoes_pagas = $this->inscricao_model->inscricoes_pagas();

            $dados = array(

                'inscricao' => $lista,
                'total' => $total,
                'inscricoes_pagas' => $inscricoes_pagas,

            );

            $this->inscricao_model->insert($data); # salva no banco 

            $this->load->view('admin/template/header');
            $this->load->view('admin/relatorios/caixa', $dados); # retorna para a page
            $this->load->view('admin/template/footer');
            $this->load->view('admin/template/scripts');

        }

    }
?>
