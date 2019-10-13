<?php
	class Professor_model extends CI_model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get_professor($user){
			$this->db
				->from('professor')
				->where('professor', $user);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row();
			}else {
				return NULL;
			}
        }
    }
?>