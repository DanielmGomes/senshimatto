<?php
	class Teste_model extends CI_model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
        public function buscaTodos(){
            return $this->db->get('competicao')->result_array();
        }
    }
?>