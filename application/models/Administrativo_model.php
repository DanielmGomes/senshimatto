<?php
	class Administrativo_model extends CI_model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get_user_data($equipe){
			$this->db
				->select('idEquipe, equipe, , whatsapp, email, endereco, bairro, cidade, cep, estado, foto, usuario, senha')
				->from('equipe')
				->where('equipe', $equipe);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row();
			}else {
				return NULL;
			}
		}
		
		public function get_data($id, $select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('competicao');
			$this->db->where('idCompeticao', $idCompeticao);
			return $this->db->get();
		}

		public function insert($data){
			$this->db->insert('competicao', $data);
		}
	
		public function update($idCompeticao, $data){
			$this->db->where('idCompeticao', $idCompeticao);
			$this->db->update('competicao', $data);
		}

		public function delete($idCompeticao){
			$this->db->where('idCompeticao', $idCompeticao);
			$this->db->delete('competicao');
		}

		public function is_duplicated($field, $value, $idCompeticao = NULL){
			if (!empty($idCompeticao)) {
				$this->db->where('idCompeticao <>', $idCompeticao);
			}
			$this->db->from('competicao');
			$this->db->where($field, $value);
			return $this->db->get()->num_rows() > 0;
		}

	}
?>