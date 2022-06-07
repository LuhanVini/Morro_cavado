<?php
require "fc/verifica.php";
require "fc/comum.php";
$id_sessao = $_SESSION['id_usuario'];
 
	require "fc/autcadsenha.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Os2prohos</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Os2prohost</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">               
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="sair.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Informações</a>
                        </li>
                        <li>
							<?php echo '  <td><a href="cadsenha.php?id='.$_SESSION["id_usuario"].'"><i class="fa fa-edit fa-fw"></i> Senha</a></td>';?>
                        </li>
                        <li>
                            <a href="financeiro.php"><i class="fa fa-table fa-fw"></i> Financeiro</a>
                        </li>
                        <li>
                            <a href="../sa/"><i class="fa fa-bar-chart-o fa-fw"></i> Chamdos</a>
                        </li>                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

<!--################################################ inicio meio ###############################################-->	
<div id="page-wrapper">
	<br>
		<form enctype="multipart/form-data" class="table" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" role="form">
	<div class="row">
			<div class="col-md-6"> 
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" placeholder="Nome do usuario:" readonly="true" value="<?=$nome?>">
			</div>
			<div class="col-md-6"> 
			<label>Login:</label>
			<input type="text" name="login" class="form-control" placeholder="Login do usuario:" readonly="true" value="<?=$login?>">
			</div>
			<div class="col-md-6"> 
			<label>Nova Senha:</label>
			<input class="form-control" rows="4" type="password" name="senha" class="form-control" placeholder="Digite a nova senha:" value="<?=$senha?>">
			</div>
	</div>
	<br/>
			<div class="row">
			<div class="col-md-6">
				<input type="hidden" value="<?=$id?>" name="id" >
				<button name="submit" type="submit" class="btn btn-primary"><?=($id==-1)?"Cadastrar":"Salvar"?></button>
			</div>
			</div>
		</form>

<hr/>
</div>
<!--################################################# fin meio ################################################-->	
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
