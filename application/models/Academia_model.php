<?php
	class Academia_model extends CI_model
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function consulta_academia($idProfessor){
			$this->db
				->from('academia')
				->where('id_academia_professor', $idProfessor);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row();
			}else {
				return NULL;
			}
        }
	}
?>
