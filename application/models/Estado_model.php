<?php
    class Estado_model extends CI_model{
        
        public function __construct(){
            parent::__construct();
			$this->load->database();

        }

        /**
         * lista todos os estados do banco
         */
        public function estados(){
			return $this->db
				->order_by('Nome')
				->get('estado');
		}

        /**
         * cria o select dos estados 
         */
        public function select_estados(){
			$options = "<option value=''>Selecione o Estado</option>";
			$estados = $this->estados();

			foreach ($estados -> result() as $estado) {
                $options .= "<option value='{$estado->Uf}'>{$estado->Nome}</option>";
			}
			return $options;
		}
    }
?>