<?php

$cliente_emailcad = $_POST["cliente_emailcad"];

$cliente_cpf = "";
$cliente_cnpj = "";
$cliente_nome = "";
$cliente_sobrenome = "";
$cliente_data_nacimento = "";
$cliente_ddd = "";	
$cliente_telefone = "";
$cliente_endereco = "";
$cliente_numero = "";
$cliente_bairro = "";
$cliente_cidade = "";
$cliente_estado = "";
$cliente_cep = "";
$cliente_senha = "";
$cliente_senhac = "";


?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="Café Especial do Sul de Minas">
    <meta name="keywords"
        content="Café Especial, Café superior, Café, Café do Sul de minas, Café gurmet, aroma de laranjeira">
    <meta itemprop="name" content="Café Especial do Sul de Minas">
    <meta itemprop="description" content="Café Especial do Sul de Minas">
    <meta name="robots" content="">
    <meta name="revisit-after" content="1 day">
    <meta name="language" content="Portuguese">
    <meta name="generator" content="N/A">
	<link rel="shortcut icon" href="assets/images/logo-122x119.png" type="image/x-icon">
    <link rel="canonical" href="https://morrocavadocafe.com" />

	<title>Morro Cavado Café | Loja</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link href="assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	 <!-- Funções para validação de CPF e CNPJ -->
	<script src="assets/js/valida_cpf_cnpj.js"></script>

	<!-- Formatando o CPF ou CNPJ -->
	<script src="assets/js/exemplo_3.js"></script>

	<!-- Formatando busca CEP -->
	<script src="assets/js/cep.js"></script>

</head>
<body>
   
<br>
<br>
<br>
    <section id="nav" class="menu cid-rKtWE6aqFK" once="menu" id="menu2-r">
        
    </section>
	
    <div class="container mt-5">
    <form class="needs-validation" novalidate name="Form1" enctype="multipart/form-data" action="gravar.php" method="POST" role="form">
	<div class="row">
		<div class="col-md-4 mb-3">
		  <label for="validationCustom01">E-mail</label>
		  <input type="text" class="form-control" name="cliente_emailcad" value="<?=$cliente_emailcad?>" required>
		  <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
		</div>
		<div class="col-md-4 mb-3">
		  <label for="validationCustom02">Senha</label>
		  <input type="password" class="form-control"  placeholder="Digite a senha" name="cliente_senha" value="<?=$cliente_senha?>" required>
		  <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
		</div>
		<div class="col-md-4 mb-3">
		  <label for="validationCustom02">Confirmação de Senha</label>
		  <input type="password" class="form-control"  placeholder="Confirmação de senha" name="cliente_senhac" value="<?=$cliente_senhac?>" required>
		  <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
		</div>
	</div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">CPF/CNPJ</label>
      <input type="text" class="form-control cpf_cnpj" id="cliente_cpf" name="cliente_cpf" placeholder="CPF/CNPJ"  value="<?=$cliente_cpf?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Nome</label>
      <input type="text" class="form-control"  placeholder="Nome" name="cliente_nome" value="<?=$cliente_nome?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Sobrenome</label>
      <input type="text" class="form-control"  placeholder="Sobrenome" name="cliente_sobrenome" value="<?=$cliente_sobrenome?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Data de nacimento</label>
        <input type="text" class="form-control"  placeholder="__/__/___" name="cliente_data_nacimento" onkeyup="mascara_data(this, this.value)" maxlength="10" value="<?=$cliente_data_nacimento?>" required>
        <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom03">DDD</label>
      <input type="text" class="form-control" placeholder="DDD" name="cliente_ddd" value="<?=$cliente_ddd?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Telefone</label>
      <input type="text" class="form-control phone" placeholder="Telefone" name="cliente_telefone" onkeypress="return onlynumber();" pattern="^\d{9}$" value="<?=$cliente_telefone?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Telefone infalido
      </div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">CEP</label>
	  <input name="cliente_cep" type="text" id="cliente_cep" class="form-control" value="<?=$cliente_cep?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Endereco</label>
      <input type="text" class="form-control" id="cliente_endereco" placeholder="Endereço" name="cliente_endereco" value="<?=$cliente_endereco?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Numero</label>
      <input type="text" class="form-control" id="cliente_numero" placeholder="Numero" name="cliente_numero" value="<?=$cliente_numero?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Bairro</label>
      <input type="text" class="form-control" id="cliente_bairro" placeholder="Bairro" name="cliente_bairro" value="<?=$cliente_bairro?>" required>
      <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Cidade</label>
      <input type="text" class="form-control" id="cliente_cidade" placeholder="Cidade" name="cliente_cidade" value="<?=$cliente_cidade?>" required>
	  <div class="valid-feedback">
        Tudo certo!
      </div>
      <div class="invalid-feedback">
        Campo não preenchido.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Estado</label>
      <select type="text" name="cliente_estado" id="cliente_estado" class="form-control" value="<?=$cliente_estado?>" required>
                            <option name="cliente_estado" value="<?=$cliente_estado?>"> </option>
						<option value="AC">AC</option>
						<option value="AL">AL</option>
						<option value="AP">AP</option>
						<option value="AM">AM</option>
						<option value="BA">BA</option>
						<option value="CE">CE</option>
						<option value="DF">DF</option>
						<option value="ES">ES</option>
						<option value="GO">GO</option>
						<option value="MA">MA</option>
						<option value="MT">MT</option>
						<option value="MS">MS</option>
						<option value="MG">MG</option>
						<option value="PA">PA</option>
						<option value="PB">PB</option>
						<option value="PR">PR</option>
						<option value="PE">PE</option>
						<option value="PI">PI</option>
						<option value="RJ">RJ</option>
						<option value="RN">RN</option>
						<option value="RS">RS</option>
						<option value="RO">RO</option>
						<option value="RR">RR</option>
						<option value="SC">SC</option>
						<option value="SP">SP</option>
						<option value="SE">SE</option>
						<option value="TO">TO</option>
                        <option value="DF">DF</option>							
                        </select>
						  <div class="invalid-feedback">
							Por favor, celecione um estado.
						  </div>
						</div>
  </div>

  <button class="btn btn-primary" type="submit">Enviar</button>
</form>
</div>

    <section id="footer" class="footer4 cid-rJf8j9IQHS" id="footer4-h">
        
    </section>

    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/mbr-tabs/mbr-tabs.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/theme/js/script.js"></script>

	<script>
	// Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
		// Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
		var forms = document.getElementsByClassName('needs-validation');
		// Faz um loop neles e evita o envio
		var validation = Array.prototype.filter.call(forms, function(form) {
		  form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
			  event.preventDefault();
			  event.stopPropagation();
			}
			form.classList.add('was-validated');
		  }, false);
		});
	  }, false);
	})();
	
	 function mascara_data(campo, valor) {
        var mydata = '';
        mydata = mydata + valor;
        if (mydata.length == 2) {
          mydata = mydata + '/';
          campo.value = mydata;
        }
        if (mydata.length == 5) {
          mydata = mydata + '/';
          campo.value = mydata;
        }
      }
	  
	  function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}


	
		$("#nav").load("assets/theme/nav.html");
        $("#footer").load("assets/theme/footer.html");
	
	</script>

</body>
</html>