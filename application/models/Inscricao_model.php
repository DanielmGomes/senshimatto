<?php
	class Inscricao_model extends CI_model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
        }
 
		public function get_user_data($idInscricao){
			$this->db
                ->select('idInscricao, 
                idCompetidor, nomeCompetidor, nascimentoCompetidor, cpfCompetidor, sexoCompetidor, whatsappCompetidor, emailCompetidor,
                enderecoCompetidor, bairroCompetidor, whatsappCompetidor, emailCompetidor, enderecoCompetidor, bairroCompetidor, estadoCompetidor,
                cidadeCompetidor, academiaCompetidor, professorCompetidor,
                idCompeticao, nomeCompeticao, enderecoCompeticao, estadoCompeticao, 
                cidadeCompeticao, dataCompeticao, descricaoCompeticao, cartazCompeticao, situacaoPagamento')
				->from('inscricao')
				->where('idInscricao', $idInscricao);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row();
			}else {
				return NULL;
			}
        }

		public function get_data($idCompetidor, $select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('inscricao');
			$this->db->where('idCompetidor', $idCompetidor);
			return $this->db->get();
		}

		public function insert($data){
			$this->db->insert('inscricao', $data);
		}
	
		public function update($idInscricao, $data){
			$this->db->where('idInscricao', $idInscricao);
			$this->db->update('inscricao', $data);
		}

		public function delete($idCompeticao){
			$this->db->where('idCompeticao', $idCompeticao);
			$this->db->delete('competicao');
		}

		public function is_duplicated($field, $value, $idInscricao = NULL){
			if (!empty($idInscricao)) {
				$this->db->where('idInscricao <>', $idInscricao);
			}
			$this->db->from('inscricao');
			$this->db->where($field, $value);
			return $this->db->get()->num_rows() > 0;
		}

        public function lista_inscricao(){
            return $this->db->get('inscricao')->result_array();
        }

		public function listaInscricao($idCompetidor, $select = NULL){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('inscricao');
			$this->db->where('idCompetidor', $idCompetidor);
			return $this->db->get()->num_rows() > 0;
		}

		public function total_inscricoes(){
			return $this->db->get('inscricao')->num_rows();
		}

		public  function inscricoes_pagas(){
        	$situacao = 'pago';
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('inscricao');
			$this->db->where('situacaoPagamento', $situacao);
			return $this->db->get()->num_rows();
		}

		public  function consulta_inscritos($competicao, $sexo, $graduacao, $categoria){
			if (!empty($select)) {
				$this->db->select($select);
			}
			$this->db->from('inscricao');
			$this->db->where('nomeCompeticao', $competicao and 'sexoCompetidor', $sexo and 'faixaCompetidor', $graduacao and 'categoriaCompetidor', $categoria);
			return $this->db->get()->result_array();
		}

    }
?>
