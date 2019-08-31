<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Competicao extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
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
            $this->load->view('admin/cadastros/competicoes');
        }

        public function cadastro_competicao(){
            if ($this->session->userdata('idUsuario')) {
                $idUsuario = $this->session->userdata('idUsuario');
                $idCompeticao = $this->input->post('idCompeticao');

                $this->load->model('competicao_model');
                $this->load->model('usuario_model');
                $this->load->model('competicao_model');
                
                $data = $this->usuario_model->get_data($idUsuario)->result_array()[0];
                $competicao = $this->competicao_model->get_data($idCompeticao)->result_array()[0];

                /*
                **calcular data do nascimento do competidor
                */
                $dia = date('d');
                $mes = date('m');
                $ano = date('y');
                $ano_atual = 2000 + $ano;
                $nascimento = explode('-', $data['nascimento']);
                $ano_nascimento = $nascimento[0];
                $mes_nascimento = $nascimento[1];
                $dia_nascimento = $nascimento[2];
                $idade = $ano_atual - $ano_nascimento;
                /*
                **
                */

                if ($data['sexo'] == 'masculino') {
                    echo 'sexo masculino';
                    if ($idade <= 10) {
                        echo 'masculino mirim';
                        if ($data['peso'] <= 22) {
                            echo 'pluma';
                        }else {
                            if ($data['peso'] > 22 and $data['peso'] <= 26) {
                                echo 'leve';
                            }else {
                                if ($data['peso'] > 26 and $data['peso'] <= 30) {
                                    echo 'meio pesado';
                                }else {
                                    if ($data['peso'] > 30 and $data['peso'] <= 34) {
                                        echo 'super pesado';
                                    }else {
                                        if ($data['peso'] > 36) {
                                            echo 'pesadissimo';
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($idade > 10 and $idade <= 18 ) {
                            echo 'masculino juvenil';
                            if ($data['peso'] <= 53.50) {
                                echo 'galo';
                            }else {
                                if ($data['peso'] > 53.50 and $data['peso'] <= 58.50) {
                                    echo 'pluma';
                                }else {
                                    if ($data['peso'] > 58.50 and $data['peso'] <= 64) {
                                        echo 'pena';
                                    }else {
                                        if ($data['peso'] > 64 and $data['peso'] <= 69) {
                                            echo 'leve';
                                        }else {
                                            if ($data['peso'] > 69 and $data['peso'] <= 74) {
                                                echo 'medio';
                                            }else {
                                                if ($data['peso'] > 74 and $data['peso'] <= 79.30) {
                                                    echo 'meio pesado';
                                                }else {
                                                    if ($data['peso'] > 79.30 and $data['peso'] <= 84.30) {
                                                        echo 'pesado';
                                                    }else {
                                                        if ($data['peso'] > 84.30 and $data['peso'] <= 89.30) {
                                                            echo 'super pesado';
                                                        }else {
                                                            if ($data['peso'] > 89.30) {
                                                                echo 'pesadissimo';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($idade > 18 and $idade <= 30) {
                                echo 'masculino adulto';
                                if ($data['peso'] <= 57.50) {
                                    echo 'galo';
                                }else {
                                    if ($data['peso'] > 57.50 and $data['peso'] <= 64) {
                                        echo 'pluma';
                                    }else {
                                        if ($data['peso'] > 64 and $data['peso'] <= 70) {
                                            echo 'pena';
                                        }else {
                                            if ($data['peso'] > 70 and $data['peso'] <= 76) {
                                                echo 'leve';
                                            }else {
                                                if ($data['peso'] > 76 and $data['peso'] <= 82.30) {
                                                    echo 'medio';
                                                }else {
                                                    if ($data['peso'] > 82.30 and $data['peso'] <= 88.30) {
                                                        echo 'meio pesado';
                                                    }else {
                                                        if ($data['peso'] > 88.30 and $data['peso'] <= 94.30) {
                                                            echo 'pesado';
                                                        }else {
                                                            if ($data['peso'] > 94.30 and $data['peso'] <= 100.50) {
                                                                echo 'super pesado';
                                                            }else {
                                                                if ($data['peso'] > 100.50) {
                                                                    $categoria = 'pesadissimo';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($idade > 30) {
                                    echo 'masculino senior';
                                    if ($data['peso'] <= 57.50) {
                                        echo 'galo';
                                    }else {
                                        if ($data['peso'] > 57.50 and $data['peso'] <= 64) {
                                            echo 'pluma';
                                        }else {
                                            if ($data['peso'] > 64 and $data['peso'] <= 70) {
                                                echo 'pena';
                                            }else {
                                                if ($data['peso'] > 70 and $data['peso'] <= 76) {
                                                    echo 'leve';
                                                }else {
                                                    if ($data['peso'] > 76 and $data['peso'] <= 82.30) {
                                                        echo 'medio';
                                                    }else {
                                                        if ($data['peso'] > 82.30 and $data['peso'] <= 88.30) {
                                                            echo 'meio pesado';
                                                        }else {
                                                            if ($data['peso'] > 88.30 and $data['peso'] <= 94.30) {
                                                                echo 'pesado';
                                                            }else {
                                                                if ($data['peso'] > 94.30 and $data['peso'] <= 100.50) {
                                                                    echo 'super pesado';
                                                                }else {
                                                                    if ($data['peso'] > 100.50) {
                                                                        echo 'pesadissimo';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else {
                    echo 'sexo feminino';
                    if ($idade <= 6) {
                        echo 'feminino mirim';
                        if ($data['peso'] <= 20) {
                            echo 'pluma';
                        }else {
                            if ($data['peso'] > 20 and $data['peso'] <= 24) {
                                echo 'leve';
                            }else {
                                if ($data['peso'] > 24 and $data['peso'] <= 28) {
                                    echo 'meio pesado';
                                }else {
                                    if ($data['peso'] > 28 and $data['peso'] <= 32) {
                                        echo 'super pesado';
                                    }else {
                                        if ($data['peso'] > 32 and $data['peso'] <= 36) {
                                            echo 'pesadissimo';
                                        }
                                    }
                                }
                            }
                        }
                    }else {
                        if ($idade > 10 and $idade <= 18 ) {
                            echo 'feminino juvenil';
                            if ($data['peso'] <= 44.30) {
                                echo 'galo';
                            }else {
                                if ($data['peso'] > 44.30 and $data['peso'] <= 48.30) {
                                    echo 'pluma';
                                }else {
                                    if ($data['peso'] > 48.30 and $data['peso'] <= 52.50) {
                                        echo 'pena';
                                    }else {
                                        if ($data['peso'] > 52.50 and $data['peso'] <= 56.50) {
                                            echo 'leve';
                                        }else {
                                            if ($data['peso'] > 56.50 and $data['peso'] <= 60.50) {
                                                echo 'medio';
                                            }else {
                                                if ($data['peso'] > 60.50 and $data['peso'] <= 65) {
                                                    echo 'meio pesado';
                                                }else {
                                                    if ($data['peso'] > 65 and $data['peso'] <= 69) {
                                                        echo 'pesado';
                                                    }else {
                                                        if ($data['peso'] > 69 and $data['peso'] <= 73) {
                                                            echo 'super pesado';
                                                        }else {
                                                            if ($data['peso'] > 73) {
                                                                echo 'pesadissimo';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }else {
                            if ($idade > 18 and $idade <= 30) {
                                echo 'feminino adulto';
                                if ($data['peso'] <= 48.50) {
                                    echo 'galo';
                                }else {
                                    if ($data['peso'] > 48.50 and $data['peso'] <= 53.50) {
                                        echo 'pluma';
                                    }else {
                                        if ($data['peso'] > 53.50 and $data['peso'] <= 58.50) {
                                            echo 'pena';
                                        }else {
                                            if ($data['peso'] > 58.50 and $data['peso'] <= 64) {
                                                echo 'leve';
                                            }else {
                                                if ($data['peso'] > 64 and $data['peso'] <= 69) {
                                                    echo 'medio';
                                                }else {
                                                    if ($data['peso'] > 69 and $data['peso'] <= 74) {
                                                        echo 'meio pesado';
                                                    }else {
                                                        if ($data['peso'] > 74 and $data['peso'] <= 79.30) {
                                                            echo 'pesado';
                                                        }else {
                                                            if ($data['peso'] > 79.30 and $data['peso'] <= 84.30) {
                                                                echo 'super pesado';
                                                            }else {
                                                                if ($data['peso'] > 84.30) {
                                                                    echo 'pesadissimo';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }else {
                                if ($idade > 30) {
                                    echo 'feminino senior';
                                    if ($data['peso'] <= 48.50) {
                                        echo 'galo';
                                    }else {
                                        if ($data['peso'] > 48.50 and $data['peso'] <= 53.50) {
                                            echo 'pluma';
                                        }else {
                                            if ($data['peso'] > 53.50 and $data['peso'] <= 58.50) {
                                                echo 'pena';
                                            }else {
                                                if ($data['peso'] > 58.50 and $data['peso'] <= 64) {
                                                    echo 'leve';
                                                }else {
                                                    if ($data['peso'] > 64 and $data['peso'] <= 69) {
                                                        echo 'medio';
                                                    }else {
                                                        if ($data['peso'] > 69 and $data['peso'] <= 74) {
                                                            echo 'meio pesado';
                                                        }else {
                                                            if ($data['peso'] > 74 and $data['peso'] <= 79.30) {
                                                                echo 'pesado';
                                                            }else {
                                                                if ($data['peso'] > 79.30 and $data['peso'] <= 84.30) {
                                                                    echo 'super pesado';
                                                                }else {
                                                                    if ($data['peso'] > 84.30) {
                                                                        echo 'pesadissimo';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                #$data = $this->competicao_model->lista_academia();
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
                    'faixa' => $data['faixa'],
                    'peso' => $data['peso'],
                    'endereco' => $data['endereco'],
                    'bairro' => $data['bairro'],
                    'estado' => $data['estado'],
                    'cidade' => $data['cidade'],
                    'categoria' => $categoria,
                    'idade' => $idade,
                    'idCompeticao' => $competicao['idCompeticao'],
                    'nomeCompeticao' => $competicao['nomeEvento'],
                    'enderecoCompeticao' => $competicao['endereco'],
                    'estadoCompeticao' => $competicao['estado'],
                    'cidadeCompeticao' => $competicao['cidade'],
                    'dataCompeticao' => $competicao['data'],
                    'descricaoCompeticao' => $competicao['descricao'],
                    'cartazCompeticao' => $competicao['cartaz'],
                );
                                
                $this->load->view('usuarios/template/header');
                $this->load->view('usuarios/cadastros/competicao', $dados);
                $this->load->view('template/footer');
                $this->load->view('template/scripts');  
                
            }else {
                $this->load->view('template/header');
                $this->load->view('login');
                $this->load->view('template/footer');
                $this->load->view('template/scripts');                
            }
        }

        public function cidades(){
            $this->load->view('cidades');
        }
    }
?>