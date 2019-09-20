<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('email');
	}

	public function enviar(){
		$data = $this->input->post();
		$this->email->from("senshimattojiujitsu@gmail.com", 'Meu E-mail');
		$this->email->subject("Assunto do e-mail");
		$this->email->reply_to("email_de_resposta@dominio.com");
		$this->email->to("email_destinatario@dominio.com");
		$this->email->cc('email_copia@dominio.com');
		$this->email->bcc('email_copia_oculta@dominio.com');
		$this->email->message("Aqui vai a mensagem ao seu destinatário");
		$this->email->send();
		$this->email->print_debugger();
	}

}
