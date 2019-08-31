<?php
    class Cidade_model extends CI_model{
        public function __construct(){
            parent::__construct();
        }
/*
        public function carrega_cidade($Uf = null){
            return $this->db
                ->where('Uf', $Uf)
                ->order_by('Nome')
                ->get('municipio');
        }
*/
        public function getAll(){
            return $this->db
                ->order_by('Nome')
                ->get('municipio');
        }

        public function selectMunicipio(){
            $options = "<option value=''>Selecione o Municipio</option>";
            $municipios = $this->getAll();

            foreach ($municipios -> result() as $municipio) {
                $options .= "<option value='{$municipio->Uf}'>{$municipio->Nome}</option>".PHP_EOL;
            }

            return $options;
        }

    }
?>