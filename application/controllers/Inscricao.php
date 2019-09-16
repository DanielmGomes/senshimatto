<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

	use OpenBoleto\Banco\BancoDoBrasil;
	use OpenBoleto\Agente;

    class Inscricao extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }
  
        public function save_inscricao_competicao()
		{
			$data = $this->input->post();
			$this->load->model('inscricao_model');
			$dados = array(
				'nome' => $data['nomeCompetidor'],
				'nascimento' => $data['nascimentoCompetidor'],
				'cpf' => $data['cpfCompetidor'],
				'sexo' => $data['sexoCompetidor'],
				'academia' => $data['academiaCompetidor'],
				'professor' => $data['professorCompetidor'],
				'faixa' => $data['faixaCompetidor'],
				'peso' => $data['pesoCompetidor'],
				'categoria_peso' => $data['categoriaCompetidor'],
				'idUsuario' => $data['idCompetidor'],
				'whatsapp' => $data['whatsappCompetidor'],
				'email' => $data['emailCompetidor'],
				'endereco' => $data['enderecoCompetidor'],
				'bairro' => $data['bairroCompetidor'],
				'estado' => $data['estadoCompetidor'],
				'cidade' => $data['cidadeCompetidor'],
				'idade' => $data['idadeCompetidor'],
				'idCompeticao' => $data['idCompeticao'],
				'nomeCompeticao' => $data['nomeCompeticao'],
				'enderecoCompeticao' => $data['enderecoCompeticao'],
				'estadoCompeticao' => $data['estadoCompeticao'],
				'cidadeCompeticao' => $data['cidadeCompeticao'],
				'dataCompeticao' => $data['dataCompeticao'],
				'descricaoCompeticao' => $data['descricaoCompeticao'],
				'cartazCompeticao' => $data['cartazCompeticao'],
			);

			$idCompetidor = $this->session->userdata('idUsuario');
			$duplicado = $this->inscricao_model->listaInscricao($idCompetidor);

			if ($duplicado == 1) {
				$_SESSION['duplicado'] = true;
				$this->load->view('usuarios/template/header');
				$this->load->view('usuarios/cadastros/competicao', $dados);
				$this->load->view('template/footer');
				$this->load->view('template/scripts');
			} else {
				$this->inscricao_model->insert($data);

				$lista = $this->inscricao_model->lista_inscricao($idCompetidor);
				$dados = array(
					'inscricao' => $lista,
					'idUsuario' => $idCompetidor,
				);
				$this->load->view('usuarios/template/header');
				$this->load->view('home');
				$this->load->view('template/footer');
				$this->load->view('template/scripts');
			}
		}

		public function boleto(){
			$sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
			$cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');

			$boleto = new BancoDoBrasil(array(
				// Parâmetros obrigatórios
				'dataVencimento' => new DateTime('2013-01-24'),
				'valor' => 23.00,
				'sequencial' => 1234567, // Para gerar o nosso número
				'sacado' => $sacado,
				'cedente' => $cedente,
				'agencia' => 1724, // Até 4 dígitos
				'carteira' => 18,
				'conta' => 10403005, // Até 8 dígitos
				'convenio' => 1234, // 4, 6 ou 7 dígitos
			));

			$dados['boleto'] = $boleto->getOutput();
			$this->load->view('boleto', $dados);
		}
    }
?>
