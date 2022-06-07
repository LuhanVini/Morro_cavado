<?php

$cliente_emailcad = "";
$login = "";
$senha = "";

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

</head>
<body>
    <section id="nav" class="menu cid-rKtWE6aqFK" once="menu" id="menu2-r">
        
    </section>


        <div class="container mt-5 pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-sm-4 border-right  pb-5">
                <p><h4>EFETUAR CADASTRO</h4></p>
                <form action="cadastro.php" method="post">
                    <div class="col-12">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="cliente_emailcad" aria-describedby="emailHelp" placeholder="Digite seu e-mail" value="<?=$cliente_emailcad?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form> 
            </div>
            <div class="col-sm-6">
                <form action="login_vai.php" method="post">
                    <div class="col-10">
                        <p><h4>JA SOU CLIENTE</h4></p>
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" name="login" id="inputEmail" placeholder="Digite seu e-mail" value="<?=$login?>">
                    </div>
                    <div class="col-8">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Digite sua senha" value="<?=$senha?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form> 
            </div>
        </div>
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
		$("#nav").load("assets/theme/nav.html");
		$("#footer").load("assets/theme/footer.html");
	</script>

</body>
</html>