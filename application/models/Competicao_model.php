<?php
	class Competicao_model extends CI_model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

        public function lista_competicao(){
            return $this->db->get('competicao')->result_array();
        }


        public function lista_academia(){
            return $this->db->get('academia')->result_array();
        }


		public function get_user_data($competicao){
			$this->db
                ->select('idCompeticao, nomeEvento, endereco, estado, cidade, data, descricao, cartaz')
				->from('competicao')
				->where('idCompeticao', $idCompeticao);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row();
			}else {
				return NULL;
			}
        }

		public function get_data($idCompeticao, $select = NULL){
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

        var $column_search = array('nomeEvento', 'cidade');
        var $column_order = array('nomeEvento', '', 'estado');

        private function _get_datatable(){

            $search = NULL;
            if ($this->input->post('search')) {
                $search = $this->input->post('search')['value'];
            }
            $order_column = NULL;
            $order_dir = NULL;
            $order = $this->input->post('order');
            if (isset($order)) {
                $order_column = $order[0]['column'];
                $order_dir = $order[0]['dir'];
            }

            $this->db->from('competicao');
            if (isset($search)) {
                $first = TRUE;
                foreach ($this->column_search as $field) {
                    if ($first) {
                        $this->db->group_start();
                        $this->db->like($field, search);
                        $first = FALSE;
                    }else {
                        $this->db->or_like($field, $search);
                    }
                }
                if (!$first) {
                    $this->db->group_end();
                }
            }

            if (isset($order)) {
                $this->db->order_by($this->column_order[$order_column], $order_dir);
            }
        }

        public function get_datatable(){

            $length = $this->input->post('length');
            $start = $this->input->post('start');
            $this->get_datatable();
            if (isset($length) && $length != -1) {
                $this->db->limit($length, $start);
            }
            return $this->db->get()->result();
        }
    
        public function records_filtered(){
    
            $this->_get_datatable();
            return $this->db->get()->num_rows();
        }
    
        public function records_total(){
    
            $this->db->from('competicao');
            return $this->db->count_all_results();
        }
        
    }

?>