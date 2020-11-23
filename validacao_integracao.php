<?php

	if($_REQUEST["acao"] == "adicionar")
	{

		$formvalid = true;

		// Validação Nome completo
		$tamanho_nome = strlen($_POST["form_nome"]);
		if($tamanho_nome < 5 || $tamanho_nome > 64){

			echo " O campo 'Nome completo' deve ter entre 5 e 64 caracteres. ";
			$formvalid = false;
			exit();

		}

		// Validação E-mail
		$email = $_POST["form_email"];
		$regex = "/^[^0-9][A-z0-9]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
		if(!preg_match($regex, $email)){

			echo " O campo 'E-mail' deve ser preenchido corretamente. ";
			$formvalid = false;
			exit();

		}

		// Validação Nascimento
		$nascimento = $_POST["form_nascimento"];
		if($nascimento == ""){

			echo " O campo 'Nascimento' deve ser preenchido. ";
			$formvalid = false;
			exit();

		}

		// Validação Género
		$genero = $_POST["form_genero"];
		if($genero != "feminino" && $genero != "masculino"){

			echo " O campo 'Género' deve ser preenchido. ";
			$formvalid = false;
			exit();

		}

		// Validação RG
		$tamanho_rg = strlen($_POST["form_rg"]);
		if($tamanho_rg < 9){

			echo "O campo 'RG' deve ser preenchido com 9 números. ";
			$formvalid = false;
			exit();

		}

		// Validação CPF
		$tamanho_cpf = strlen($_POST["form_cpf"]);
		if($tamanho_cpf < 11){

			echo " O campo 'CPF' deve ser preenchido com 11 números. ";
			$formvalid = false;
			exit();

		}

		// Validação Telefone residêncial
		$tamanho_telefone = strlen($_POST["form_telefone"]);
		if ($tamanho_telefone < 10){
			
			echo(" O campo 'Telefone residêncial' deve ser preenchido com 10 números. ");
			$formvalid = false;
			exit();

		}

		// Validação Celular
	 	$tamanho_celular = strlen($_POST["form_celular"]);
		if ($tamanho_celular < 11){

			echo " O campo 'Celular' deve ser preenchido com 11 números. ";
			$formvalid = false;
			exit();

		}

		// Validação Rua
		$tamanho_rua = strlen($_POST["form_rua"]);
		if ($tamanho_rua < 5 || $tamanho_rua > 70){
			
			echo " O campo 'Rua' deve ser preenchido. ";
			$formvalid = false;
			exit();

		}

		// Validação Nº
		$tamanho_numero = strlen($_POST["form_numero"]);
		if ($tamanho_numero == 0){
			
			echo " O campo 'Nº' deve ser preenchido. ";
			$formvalid = false;
			exit();

		}

		// Validação CEP
		$tamanho_cep = strlen($_POST["form_cep"]);
		if ($tamanho_cep < 8){
			
			echo " O campo 'CEP' deve ser preenchido com 8 números. ";
			$formvalid = false;
			exit();

		}

		// Validação Cidade
		$tamanho_cidade = strlen($_POST["form_cidade"]);
		if ($tamanho_cidade < 5 || $tamanho_cidade > 60){
			
			echo " O campo 'Cidade' deve ser preenchido. ";
			$formvalid = false;
			exit();

		}
		
		// Validação Posto para doação
		$opcao_posto_doacao = $_POST["form_posto_para_doacao"];
		if ($opcao_posto_doacao == "" || $opcao_posto_doacao == "selecione"){
		
			echo " O campo 'Posto para doação' deve ser preenchido. ";
			$formvalid = false;
			exit();

	    }
		
		// Validação Data
		$data = $_POST["form_data"];
		if ($data == ""){
			
			echo " O campo 'Data' deve ser preenchido. ";
			$formvalid = false;
			exit();
	
		}

    	// Validação Tipo sanguineo
		$form_tipo_sanguineo = $_POST["form_tipo_sanguineo"];
		if ($form_tipo_sanguineo != "o+" && $form_tipo_sanguineo != "a+" && $form_tipo_sanguineo != "ab+" && $form_tipo_sanguineo != "b+" && $form_tipo_sanguineo != "o-" && $form_tipo_sanguineo != "a-" && $form_tipo_sanguineo != "ab-" && $form_tipo_sanguineo != "b-"){

			echo " O campo 'Tipo sanguineo' deve ser preenchido. ";
			$formvalid = false;
			exit();

		}

		if ($formvalid)
		{
			echo " Formulário validado com sucesso! ";
		}
	}



// Dados para a conexão com o banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sangue_e_vida';

// Muda o charset para utf-8
header('Content-Type: text/html; charset=utf-8');

// Executa a conexão com o MySQL
$link = mysql_connect($servidor, $usuario, $senha, $banco)
or die('Não foi possível conectar: '.msql_erro());

// Selecion o banco de dados que deseja utilizar
$select = mysql_select_db($banco);

// verifica se o arquivo foi chamado a partir de um formulário
if($_REQUEST["acao"] == "adicionar")
{
	// Criar a expressão SQL de inserção
	$sql = "INSERT INTO doador (NOME, EMAIL, NASCIMENTO, GENERO, RG, CPF, TELEFONE, CELULAR, RUA, BAIRRO, NUMERO, COMPLEMENTO, CEP, CIDADE, POSTODOACAO, DATA, TIPOSANGUE) VALUES (";
	$sql .= "'".$_REQUEST["form_nome"]."', ";
	$sql .= "'".$_REQUEST["form_email"]."', "; 
	$sql .= "'".$_REQUEST["form_nascimento"]."', "; 
	$sql .= "'".$_REQUEST["form_genero"]."', "; 
	$sql .= "'".$_REQUEST["form_rg"]."', "; 
	$sql .= "'".$_REQUEST["form_cpf"]."', "; 
	$sql .= "'".$_REQUEST["form_telefone"]."', "; 
	$sql .= "'".$_REQUEST["form_celular"]."', "; 
	$sql .= "'".$_REQUEST["form_rua"]."', "; 
	$sql .= "'".$_REQUEST["form_bairro"]."', ";
	$sql .= "'".$_REQUEST["form_numero"]."', "; 
	$sql .= "'".$_REQUEST["form_complemento"]."', "; 
	$sql .= "'".$_REQUEST["form_cep"]."', "; 
	$sql .= "'".$_REQUEST["form_cidade"]."', "; 
	$sql .= "'".$_REQUEST["form_posto_para_doacao"]."', "; 
	$sql .= "'".$_REQUEST["form_data"]."', "; 
	$sql .= "'".$_REQUEST["form_tipo_sanguineo"]."'";  
	$sql .= ")";

	// Muda o Charset para utf-8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');

	// Executa a expressão SQL no servidor, e armazena o resultado
	$result = mysql_query($sql);

	
	// Verifica o sucesso da operação
	if(!$result)
	{
		die('Erro: ' . mysql_error());
	}

	// Se a operação foi realizada com sucesso, informa na tela
	else {
		echo 'A operação foi realiza com sucesso';
	}

}
?>

<br><a href="index.php" style="color:#FF0000"> Clique aqui para inserir um novo registro. </a>
