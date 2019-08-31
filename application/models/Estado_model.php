<?php
    class Estado_model extends CI_model{
        public function __construct(){
            parent::__construct();
			$this->load->database();

        }

        public function getAll(){
            return $this->db
                ->order_by('Nome')
                ->get('estado');
        }

        public function selectEstado(){
            $options = "<option value=''>Selecione o Estado</option>";
            $estados = $this->getAll();

            foreach ($estados -> result() as $estado) {
                $options .= "<option value='{$estado->Uf}'>{$estado->Nome}</option>".PHP_EOL;
            }

            return $options;
        }
    }
?>