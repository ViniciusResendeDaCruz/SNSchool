<?php 

function geradorDeSenha($tamanho){
	$ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  	$mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  	$nu = "0123456789"; // $nu contem os números
  	$si = "!@#$%&*()_+="; // $si contem os símbolos

  
    $senha = '';
	$senha .= str_shuffle($ma);

	$senha .= str_shuffle($mi);

	$senha .= str_shuffle($nu);

	$senha .= str_shuffle($si);
    

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($senha),0,$tamanho);
}

function enviarSenhaEmail($email_to,$senha)
{
	$email = \Config\Services::email();

	$email->setFrom('administrativo@portal.com', 'Administrativo');
	$email->setTo($email_to);
	// $email->setCC('another@another-example.com');
	// $email->setBCC('them@their-example.com');

	$email->setSubject('Senha para acesso do portal');
	$email->setMessage("A sua senha para acesso ao sistema é: $senha<br>Altere-a assim que fizer o primeiro Login no sistema");
	$email->send();
	
	return $email->printDebugger();
}
?>
