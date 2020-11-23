<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> 
			Sangue é vida
		</title>
		<link href="estilo.css" rel="stylesheet" type="text/css"/>
		<script>

			function validaForm(){
			
			// Validação Nome completo
			var tamanho_nome = document.forms["formulario"].form_nome.value.length;
			if (tamanho_nome < 5 || tamanho_nome> 64){

				alert (" O campo 'Nome Completo' deve ter entre 5 e 64 caracteres. ");
				return false;
			}
			
			// Validação E-mail
			var email = document.forms["formulario"].form_email.value;
			if(email.length < 5 || email.length > 128 || email.indexOf('@') == -1 || email.indexOf('.') == -1){

				alert(" O campo 'E-mail' deve ter preenchido corretamente. ");
				return false;
			}

			// Validação Data de nascimento
			var nascimento = document.forms["formulario"].form_nascimento.value;
			if (nascimento == "") {
				alert(" O campo 'Data de nascimento' deve ter preenchido corretamente. ");
				return false;
			}

			// Validação Género
			var form_genero = document.forms["formulario"].form_genero;
			var sexo = false;
			for (i=0; i<form_genero.length; i++)
			{
				if(form_genero[i].checked == true){
				sexo = form_genero[i].value;
				break;
				}
			}
			if(sexo == false){
				alert(" O campo 'Genero' deve ser preenchido. ");
				return false;
			}

			// Validação RG
			var tamanho_rg = document.forms["formulario"].form_rg.value.length;
			if(tamanho_rg < 9){
				alert(" O campo 'RG' deve ser preenchido com 9 números. ");
				return false;
			}

			// Validação CPF
			var tamanho_cpf = document.forms["formulario"].form_cpf.value.length;
			if(tamanho_cpf < 11){
				alert(" O campo 'CPF' deve ser preenchido com 11 números. ");
				return false;
			}

			// Validação Telefone residêncial
			var tamanho_telefone = document.forms["formulario"].form_telefone.value.length;
			if (tamanho_telefone < 10){
				alert(" O campo 'Telefone residêncial' deve ser preenchido com 10 números. ");
				return false;
			}

			// Validação Celular
			var tamanho_celular = document.forms["formulario"].form_celular.value.length;
			if (tamanho_celular < 11){
				alert(" O campo 'Celular' deve ser preenchido com 11 números. ");
				return false;
			}

			// Validação Rua
			var tamanho_rua = document.forms["formulario"].form_rua.value.length;
			if (tamanho_rua < 5 || tamanho_rua > 70){
				alert(" O campo 'Rua' deve ser preenchido. ");
				return false;
			}

			// Validação Bairro
			var tamanho_bairro = document.forms["formulario"].form_bairro.value.length;
			if (tamanho_bairro < 5 || tamanho_bairro > 70){
				alert(" O campo 'Bairro' deve ser preenchido. ");
				return false;
			}

			// Validação Nº
			var tamanho_numero = document.forms["formulario"].form_numero.value.length;
			if(tamanho_numero == 0){
				alert(" O campo 'Nº' deve ser preenchido. ")
				return false;
			} 

			// Validação CEP
			var tamanho_cep = document.forms["formulario"].form_cep.value.length;
			if (tamanho_cep < 8){
				alert(" O campo 'CEP' deve ser preenchido com 8 números. ");
				return false;
			}

			// Validação Cidade
			var tamanho_cidade = document.forms["formulario"].form_cidade.value.length;
			if (tamanho_cidade < 5 || tamanho_cidade > 60){
				alert(" O campo 'Cidade' deve ser preenchido. ");
				return false;
			}

			// Validação Posto para doação
			var opcao_posto_docao = document.forms["formulario"].form_posto_para_doacao.selectedIndex;
			if (opcao_posto_docao == 0){
				alert(" O campo 'Posto para doação' deve ser preenchido. ");
				return false;
			}

			// Validação Data
			var data = document.forms["formulario"].form_data.value;
			if (data == ""){
				alert(" O campo 'Data' deve ser preenchido. ");
				return false;
			}

    		// Validação Tipo sanguineo
			var form_tipo_sanguineo = document.forms["formulario"].form_tipo_sanguineo;
			var sangue = false;
			for (i=0; i<form_tipo_sanguineo.length; i++)
			{
				if(form_tipo_sanguineo[i].checked == true){
				sangue = form_tipo_sanguineo[i].value;
				break;
				}
			}
			if(sangue == false){
				alert(" O campo 'Tipo sanguineo' deve ser preenchido. ");
				return false;
			}
			
			document.forms["formulario"].submit();
		
		}
		</script>
	</head>
	<body>
	<!-- Logo do Site -->
		<img src="Logo/logo.png" title="Doe sangue" alt="logo do site para insentirvar a doação de sangue"/>
	<!-- Inicia o formulário -->
		<form method="post" action="validacao_integracao.php?acao=adicionar" name="formulario">
			<fieldset id="dados_pessoais">
				<legend>  
					Dados Pessoais
				</legend>
				<label for="nome"> 
					Nome completo: 
				</label>
				<input type="text" name="form_nome" id="nome" placeholder="Nome completo"/>
				<label for="email">
					E-mail:
				</label>
				<input type="text" name="form_email" id="email" size="30" placeholder="Digite o endereço de email"/>
				<p>
					<label for="nascimento">
						Data de nascimento:
					</label>
					<input type="date" name="form_nascimento" id="nascimento""/>
					<label for="genero_feminino">
						Género:
					</label>
					<input type="radio" name="form_genero" id="genero_feminino" value="feminino"> Feminino
					<label for="genero_masculino">
					</label>
					<input type="radio" name="form_genero" id="genero_masculino" value="masculino"> Masculino
				</p>
				<p>
					<label for="rg">
						RG:
					</label>
					<input type="text" name="form_rg" id="rg" placeholder="XX.XXX.XXX-X" maxlength="9" size ="13" onkeyup="this.value=this.value.replace(/[^\d]/g, '')">
					<label for="cpf">
						CPF:
					</label>
					<input type="text" name="form_cpf" id="cpf" placeholder="XXXXXXXXX/XX" maxlength="11" size ="14" onkeyup="this.value=this.value.replace(/[^\d]/g, '')">
				</p>
				<p>
					<label for="telefone">
						Telefone residêncial:
					</label>
					<input type="text" name="form_telefone" id="telefone" placeholder="(99)9999-9999" maxlength="10" size="13" onkeyup="this.value=this.value.replace(/[^\d]/g, '')"/>
					<label for="celular">
						Celular:
					</label>
					<input type="text" name="form_celular" id="celular" placeholder="(99)99999-9999" maxlength="11" size="14" onkeyup="this.value=this.value.replace(/[^\d]/g, '')"/>
				</p>
				<p>
					<label for="rua">
						Rua:
					</label>
					<input type="text" name="form_rua" id="rua" placeholder="Rua"/>
					<label for="bairro">
						Bairro:
					</label>
					<input type="text" name="form_bairro" id="bairro" placeholder="Bairro"/>
					<label for="numero">
						Nº:
					</label>
					<input type="text" name="form_numero" id="numero" placeholder="XXXX" maxlength="4" size="5" onkeyup="this.value=this.value.replace(/[^\d]/g, '')"/>
					<label for="complemento">
						Complemento:
					</label>
					<input type="text" name="form_complemento" id="complemento" placeholder="Complemento"/>
				</p>
				<p>
					<label for="cep">
						CEP:
					</label>
					<input type="text" name="form_cep" id="cep" placeholder="XXXXX-XXX" maxlength="8" size="10" onkeyup="this.value=this.value.replace(/[^\d]/g, '')"/>
					<label for="cidade">
						Cidade:
					</label>
					<input type="text" name="form_cidade" id="cidade" placeholder="Cidade"/>
			</fieldset>
			<!-- Segundo formulário -->
			<fieldset id="para_a_docao">
				<legend>
					Para a doação
				</legend>
				<label for="posto_para_doacao">
					Posto para doação
				</label>
				<select name="form_posto_para_doacao" id="posto_para_doacao">
					<option value="selecione" selected> Selecione </option>
					<option value="posto regional de osasco"> Posto Regional de Osasco </option>
					<option value="posto clínicas"> Posto Clínicas </option>
					<option value="posto dante pazzanese"> Posto Dante Pazzanese </option>
					<option value="posto mandaqui"> Posto Mandaqui </option>
					<option value="posto barueri"> Posto Barueri </option>
				</select>
				<label for="data">
					Data:
				</label>
				<input type="date" name="form_data" id="data"/>
				<p>
				<label for="tipo_sanguineo">
					Tipo sanguineo:
				</label>
				<input type="radio" name="form_tipo_sanguineo" id="o+" value="o+"> O+
				<input type="radio" name="form_tipo_sanguineo" id="a+" value="a+"> A+
				<input type="radio" name="form_tipo_sanguineo" id="ab+" value="ab+"> AB+
				<input type="radio" name="form_tipo_sanguineo" id="b+" value="b+"> B+
				<input type="radio" name="form_tipo_sanguineo" id="o-" value="o-"> O-
				<input type="radio" name="form_tipo_sanguineo" id="a-" value="a-"> A-
				<input type="radio" name="form_tipo_sanguineo" id="ab-" value="ab-"> AB-
				<input type="radio" name="form_tipo_sanguineo" id="b-" value="b-"> B-
				</p>
			</fieldset>
			<!-- Envia os dados para o servidor -->
			<input type="button" onClick="validaForm()" id="enviar" value="Enviar" style="cursor:pointer"/>
			<!-- Limpa os dados para que seja preenchido novamente -->
			<input type="reset" id="limpar" value="Limpar" style="cursor:pointer"/>
			

		</form>
	</body>
</html>
