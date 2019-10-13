<?php
	class Usuario_model extends CI_model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get_user_data($user){
			$this->db
				->select('idUsuario, nome, nascimento, cpf, sexo, whatsapp, email, academia, professor, usuario, senha')
				->from('usuario')
				->where('usuario', $user);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row();
			}else {
				return NULL;
			}
		}

		public function listaUsuario($idUsuario){
			return $this->db
			->select('idUsuario, nome, nascimento, cpf, sexo, whatsapp, email, academia, professor, usuario, senha')
			->from('usuario', $idUsuario);
		}

		public function lista_academia(){
            return $this->db->get('academia')->result_array();
        }

		public function get_data($idUsuario, $select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('usuario');
			$this->db->where('idUsuario', $idUsuario);
			return $this->db->get();
		}

		public function duplicado($usuario){
			$this->db->from('usuario');
			$this->db->where('nome', $usuario);
			return $this->db->get()->result_array();
		}

		public function insert($data){
			$this->db->insert('usuario', $data);
		}
	
		public function update($idUsuario, $data){
			$this->db->where('idUsuario', $idUsuario);
			$this->db->update('usuario', $data);
		}

		public function delete($idUsuario){
			$this->db->where('idUsuario', $idUsuario);
			$this->db->delete('usuario');
		}

		public function is_duplicated($field, $value, $idUsuario = NULL){
			if (!empty($idUsuario)) {
				$this->db->where('idUsuario <>', $idUsuario);
			}
			$this->db->from('usuario');
			$this->db->where($field, $value);
			return $this->db->get()->num_rows() > 0;
		}

		public function lista_usuario($usuario, $select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('usuario');
			$this->db->where('usuario', $usuario);
			return $this->db->get()->num_rows() > 0;
		}

		public function total_usuarios(){
			return $this->db->get('usuario')->num_rows();
		}

		public function total_usuarios_masculino($select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('usuario');
			$this->db->where('sexo', 'masculino');
			return $this->db->get()->num_rows() ;
		}

		public function total_usuarios_feminino($select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('usuario');
			$this->db->where('sexo', 'feminino');
			return $this->db->get()->num_rows() ;
		}

		public function recuperar_senha($email, $select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('usuario');
			$this->db->where('email', $email);
			return $this->db->get()->result_array();
		}

	}
?>
