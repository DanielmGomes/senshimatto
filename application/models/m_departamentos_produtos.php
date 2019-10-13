<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_departamentos_produtos extends CI_Model{

		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function departamentos(){
			return $this->db
				->order_by('departamentos_nome')
				->get('departamentos');
		}

		public function produtos($departamentos_id = null){
			return $this->db
				->where('produtos_id_departamento', $departamentos_id)
					->order_by('produtos_nome')	
						->get('produtos');
		}

		public function select_departamentos(){
			$options = "<option value=''>Selecione o Estado</option>";
			$departamentos = $this->departamentos();

			foreach ($departamentos -> result() as $departamento) {
				$options .= "<option value='{$departamento->departamentos_id}'>{$departamento->departamentos_nome}</option>";
			}
			return $options;
		}

		public function select_produtos($departamentos_id = null){
			$produtos = $this->produtos($departamentos_id);
			$options = "<option>Selecione a Cidade</option>";

			foreach ($produtos -> result() as $produto) {
				$options .= "<option value='{$produto->produtos_id_departamento}'>{$produto->produtos_nome}</option>";
			}

			return $options;
		}
	}
?>