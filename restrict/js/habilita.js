function verifica(value){
	var cpf = document.getElementById("cpf");
	var cnpj = document.getElementById("cnpj");

  if (value == 1) {
    cpf.disabled = true;
    cnpj.disabled = true;
    inscricaoEstadual.disabled = true;
  }else if(value == 2){
    cpf.disabled = false;
    cnpj.disabled = true;
    inscricaoEstadual.disabled = true;
  }else if(value == 3){
    cpf.disabled = true;
    cnpj.disabled = false;
    inscricaoEstadual.disabled = false;
  }
};