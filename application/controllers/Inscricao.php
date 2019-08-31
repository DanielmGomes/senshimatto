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
            $this->inscricao_model->insert($data);

            $idCompetidor = $this->session->userdata('idUsuario');
            $this->load->model('inscricao_model');
            $lista = $this->inscricao_model->lista_inscricao($idCompetidor);
            $dados = array(
                'inscricao' => $lista,
                'idUsuario' => $idCompetidor, 
            );
            $this->load->view('usuarios/template/header');
            $this->load->view('home');
            $this->load->view('template/footer');
            $this->load->view('template/scripts');
        }

    }
?>