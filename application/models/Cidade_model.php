<?php
	class Cidade_model extends CI_model
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function municipios($uf_estado = null){
			return $this->db
				->where('Uf', $uf_estado)
					->order_by('Nome')	
						->get('municipio');
		}

		public function select_municipios($uf_estado = null){
			$municipios = $this->municipios($uf_estado);
			$options = "<option>Selecione a Cidade</option>";

			foreach ($municipios -> result() as $municipio) {
				$options .= "<option value='{$municipio->Nome}'>{$municipio->Nome}</option>";
			}

			return $options;
		}
	}
?>
