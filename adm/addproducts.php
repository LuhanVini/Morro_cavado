<?php

$data  = "";
require "comum.php"; 
//require "funcadm.php";
require "verifica.php";

// receber dados preenchidos no formulario
$_id = null;
$_produto_cod = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$_produto_nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$_produto_descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$_produto_link = isset($_POST['link']) ? $_POST['link'] : null;
$_produto_preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$_produto_imagem = isset($_POST['produto_img']) ? $_POST['produto_img'] : null;



// eventos logicos do site 
if (isset($_POST['Cadastrar'])) {
    cadastraProdutos();
} else if (isset($_POST['Concluir'])) {
    updateProdutos();
} else if (@$_GET['id']) {

    if (@!$_GET["del"]) {

        preencheTabela();
    } else {

        deleteProdutos();
    }
}


function updateProdutos()
{

    global $_produto_cod, $_produto_nome, $_produto_descricao, $_produto_link, $_produto_preco, $_produto_imagem, $obj_mysqli;
    $id = (int) $_POST['id'];
    $produto_img = null;

    if ($_FILES['produto_img']['size'] > 0) {
        $produto_img = setImage();
    } else {

        $sql =  "SELECT `produto_img` FROM `produto`WHERE `produto_id`= '$id'";

        $result = $obj_mysqli->query($sql);

        $data1 = $result->fetch_assoc();

        $produto_img = $data1['produto_img'];
    }



    $sql = "UPDATE `produto` 
                SET `produto_cod`='$_produto_cod',
                `produto_nome`='$_produto_nome',
                `produto_descricao`='$_produto_descricao',
                `produto_link`='$_produto_link',
                `produto_preco`='$_produto_preco',
                `produto_img`='$produto_img' 
                WHERE `produto_id`='$id'";

    if ($obj_mysqli->query($sql) === TRUE) {

        echo "Atualizado com sucesso";
        header("Location:addproducts.php");
    } else {
        echo "Erro: " . $obj_mysqli->error;
    }
}

function preencheTabela()
{

    global $obj_mysqli, $data;

    $id = $_GET['id'];

    $sql = "SELECT * FROM produto WHERE produto_id = {$id}";
    $result = $obj_mysqli->query($sql);

    $data = $result->fetch_assoc();
}
function deleteProdutos()
{

    global $obj_mysqli;

    $id = (int) $_GET['id'];

    $stmt = $obj_mysqli->prepare("DELETE FROM `produto` WHERE produto_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    header("Location:addproducts.php");
}

function setImage()
{

    if (isset($_FILES['produto_img']) && $_FILES['produto_img']['size'] > 0) {

        $extensao = strtolower(substr($_FILES['produto_img']['name'], -4)); //pega a extensao do arquivo

        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo

        $diretorio = "../assets/images/"; //define o diretorio

        move_uploaded_file($_FILES['produto_img']['tmp_name'], $diretorio . $novo_nome); //efetua o upload

        return $novo_nome;
    } else {
        return null;
    }
}



function cadastraProdutos()
{

    global $_produto_cod, $_produto_nome, $_produto_descricao, $_produto_link, $_produto_preco, $obj_mysqli;


    $nome_arquivo = setImage();

    $sql = "INSERT INTO `produto`(`produto_cod`, `produto_nome`, `produto_descricao`, `produto_link`, `produto_preco`, `produto_img`)
            VALUES ('$_produto_cod', '$_produto_nome', '$_produto_descricao', '$_produto_link', '$_produto_preco', '$nome_arquivo')";

    if ($obj_mysqli->query($sql) === TRUE) {

        echo "Produto inserido com sucesso!";
        header("Location:addproducts.php");
    } else {
        echo "Erro: " . $sql . "<br><br><br>" . $obj_mysqli->error;
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Produto</title>
		<!--<link rel="stylesheet" href="css/estilo.css">-->

    <!-- Bootstrap Core CSS -->
    <link href="data/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="data/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="data/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="data/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="data/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
			require "nav.php"; 
		?>
		
<div id="page-wrapper">
<br>
	<div class="row">
		<form method="POST" action="addproducts.php" enctype="multipart/form-data">
			<div class="col-lg-2">
				<label>Codigo:</label>
				<input class="form-control"  name="codigo" type="text" id="codigo" size="70" maxlength="60" value="<?php echo @$data['produto_cod']; ?>" />
			</div>
			<div class="col-lg-10">
				<label>Nome:</label>
				<input class="form-control"  name="nome" type="text" id="nome" size="70" maxlength="60" value="<?php echo @$data['produto_nome']; ?>" />
			</div>
			<div class="col-lg-6">
				<label>Descrição:</label>
				<textarea class="form-control"  name="descricao" id="descricao" cols="30" rows="10"><?php echo @$data['produto_descricao']; ?></textarea>
			</div>
			<div class="col-lg-6">
				<label>Link:</label>
				<input class="form-control"  name="link" type="text" id="link" size="70" maxlength="60" value="<?php echo @$data['produto_link']; ?>" />
            </div>
			<div class="col-lg-3">
				<label>Preço:</label>
				<input class="form-control"  name="preco" type="text" id="preco" size="70" maxlength="60" value="<?php echo @$data['produto_preco']; ?>" />
			</div>
			<div class="col-lg-6">
				<label>Arquivo:</label>
				<input class="form-control rows="4" type="file" name="produto_img" class="form-control" readonly="true" value="<?php echo @$data['produto_img']; ?>" placeholder="Nenhum arquivo selecionado..." />
			</div>
			<div class="col-lg-6">
				<br>
				<div class="col-lg-3">
					<input class="form-control btn btn-primary"  type="hidden" name="id" value="<?php echo @$data['produto_id'] ?>" />
					<input class="form-control btn btn-primary"  type="submit" value="<?php

												if (isset($_GET['id'])) {
													echo "Concluir";
												} else {
													echo "Cadastrar";
												} ?>" id="cadastrar" name="<?php

																			if (isset($_GET['id'])) {
																				echo "Concluir";
																			} else {
																				echo "Cadastrar";
																			} ?>">

				</div>
				<div class="col-lg-3">
					<input class="form-control btn btn-warning""  name="limpar" type="reset" id="limpar" value="Limpar" />
				</div>
			</div>
		</form>
	</div>
<br>

<?php if (@!$_GET['id']) {
?>

<table class="table table-striped" style="font-size: 12px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Nome:</th>
            <th>Descrição</th>
            <th>Link</th>
          
            <th>Preço</th>
            <th>Imagem</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $sql = "SELECT * FROM produto";
        $result = $obj_mysqli->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
        <td>" . $row['produto_id'] . "</td>
        <td>" . $row['produto_cod'] . "</td>
        <td>" . $row['produto_nome'] . "</td>
        <td>" . $row['produto_descricao'] . "</td>
        <td>" . $row['produto_link'] . "</td>
  
        <td>" . $row['produto_preco'] . "</td>
        <td>" . $row['produto_img'] . "</td>
        <td>
            <a href='addproducts.php?id=" . $row['produto_id'] . "'>Editar</a>
        </td>
        <td>
			<a id='remover' name='remover' value='remover' href='addproducts.php?id=" . $row['produto_id'] . "&del=true'>Remover</a>
        </td>
    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'><center>Nenhum Registro Encontrado</center></td></tr>";
        }

        ?>

    </tbody>
</table>

<?php

}


?>

</div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="data/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="data/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="data/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="data/vendor/raphael/raphael.min.js"></script>
    <script src="data/vendor/morrisjs/morris.min.js"></script>
    <script src="data/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="data/dist/js/sb-admin-2.js"></script>

</body>

</html>
