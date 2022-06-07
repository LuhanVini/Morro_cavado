<?php
session_start();
require '../../adm/comum.php';

$v2 = "";
$plano_desc_v = "Compras Morrocavado Cafe";
$cliente_nome = "";
$cliente_cpf = "";
$email = "";
$cliente_data_nacimento = "";
$cliente_ddd = "";
$cliente_telefone = "";
$cliente_endereco = "";
$cliente_numero = "";
$cliente_bairro = "";
$cliente_cidade = "";
$cliente_cep = "";
$cliente_estado = "";
$cliente_pais = "";
$frete = "";

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="Café Especial do Sul de Minas">
    <meta name="keywords" content="Café Especial, Café superior, Café, Café do Sul de minas, Café gurmet, aroma de laranjeira">
    <meta itemprop="name" content="Café Especial do Sul de Minas">
    <meta itemprop="description" content="Café Especial do Sul de Minas">
    <meta name="robots" content="">
    <meta name="revisit-after" content="1 day">
    <meta name="language" content="Portuguese">
    <meta name="generator" content="N/A">
    <link rel="shortcut icon" href="../assets/images/logo-122x119.png" type="image/x-icon">
    <link rel="canonical" href="https://morrocavadocafe.com" />

    <title>Morro Cavado Café | Produtos</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../../assets/theme/css/style.css">
    <link rel="stylesheet" href="../../assets/mobirise/css/mbr-additional.css" type="text/css">
    <link href="../../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">
    <link href="../../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">

    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <!-- Funções para validação de CPF e CNPJ -->
    <script src="../assets/js/valida_cpf_cnpj.js"></script>

    <!-- Formatando o CPF ou CNPJ -->
    <script src="../assets/js/formata.js"></script>

</head>

<body>
    <section id="nav" class="menu cid-rJ7JV5pcDW" once="menu" id="menu2-0">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="../../index.html">
                            <img src="../../assets/images/logo-122x119.png" alt="" title="" style="height: 3.8rem;">
                        </a>
                    </span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../../page1.html">Institucional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../../page3.html">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../../page4.html">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../../login.php">Minha conta</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <br>
    <div class="container-fuid  pt-5" style="height:500px">

        <?php
        include '../source/Boleto.php';

        @$soma = $_POST["soma"];
        @$radio1 = $_POST["radio"];
        $frete = isset($_POST['correios']) ? $_POST['correios'] : null;
        $freteTipo = isset($_POST['correiosTipo']) ? $_POST['correiosTipo'] : null;

        /*
        echo "<br>";
        echo 'valor---------------> ' . $soma . "<br>";
        echo 'Nome----------------> ' . $_SESSION['login']["cliente_nome"] . "<br>";
        echo 'CPF-----------------> ' . $_SESSION['login']["cliente_cpf"] . "<br>";
        echo 'email---------------> ' . $_SESSION['login']["cliente_email"] . "<br>";
        echo 'Nacimento-----------> ' . $_SESSION['login']["cliente_data_nascimento"] . "<br>";
        echo 'DDD-----------------> ' . $_SESSION['login']["cliente_ddd"] . "<br>";
        echo 'Telefone------------> ' . $_SESSION['login']["cliente_telefone"] . "<br>";
        echo 'Endereço------------> ' . @$_SESSION['login']["cliente_endereco"] . "<br>";
        echo 'Numero--------------> ' . $_SESSION['login']["cliente_numero"] . "<br>";
        echo 'Bairro--------------> ' . $_SESSION['login']["cliente_bairro"] . "<br>";
        echo 'Cidade--------------> ' . $_SESSION['login']["cliente_cidade"] . "<br>";
        echo 'CEP-----------------> ' . $_SESSION['login']["cliente_cep"] . "<br>";
        echo 'Estado--------------> ' . $_SESSION['login']["cliente_estado"] . "<br>";
        echo 'Pais----------------> ' . 'BRASIL' . "<br>";
        */

        $boleto = new Boleto();
        //Valor de cada boleto. Caso sua conta não absorver a taxa do boleto, será acrescentado 1 real no valor do boleto.
        $boleto->setAmount($soma - 1);
        //Descrição do boleto
        $boleto->setDescription($plano_desc_v);
        //O CPF do comprador
        $boleto->setCustomerCPF($_SESSION['login']["cliente_cpf"]);
        //Nome do comprador
        $boleto->setCustomerName($_SESSION['login']["cliente_nome"]);
        //Email do comprador
        $boleto->setCustomerEmail($_SESSION['login']["cliente_email"]);
        //Telefone do comprador
        $boleto->setCustomerPhone($_SESSION['login']["cliente_ddd"], $_SESSION['login']["cliente_telefone"]);

        //Data de vencimento do boleto no formato de Ano-Mês-Dia. Essa data precisa ser no futuro, e no máximo 30 dias apatir do dia atual.
        $boleto->setFirstDueDate(date("Y-m-d", strtotime("+3 days", time())));
        //Esse é o numero de boletos a ser gerado.
        $boleto->setNumberOfPayments(1);
        //Uma referência de quem é o boleto (note que terá multiplos boletos com a mesma referência)
        $boleto->setReference('Referencia Qualquer'); //**
        //Instruções para quem irá receber o pagamento
        $boleto->setInstructions(' ');
        //CEP do comprador
        $boleto->setCustomerAddressPostalCode($_SESSION['login']["cliente_cep"]);
        //Endereço do comprador
        $boleto->setCustomerAddressStreet($_SESSION['login']["cliente_endereco"]);
        //Numero da casa do comprador
        $boleto->setCustomerAddressNumber($_SESSION['login']["cliente_numero"]);
        //Bairro do comprador
        $boleto->setCustomerAddressDistrict($_SESSION['login']["cliente_bairro"]);
        //Cidade do comprador
        $boleto->setCustomerAddressCity($_SESSION['login']["cliente_cidade"]);
        //Estado do comprador
        $boleto->setCustomerAddressState($_SESSION['login']["cliente_estado"]);

        $id_cliente = $_SESSION['login']["cliente_Id"];

        //Executa a conexão e captura a resposta do PagSeguro.
        $data = $boleto->send();

        //######################### iserir dados no banco ######################### 
        //Você terá uma array de objeto, precisará de uma estrutura de laço para percorrer um a um.
        foreach ($data->boletos as $row) {
            echo   ' <br>Código de barras: ' . $row->barcode .  '<hr>';

            $sql = "INSERT INTO `pedido`(`pedido_pagseguro`, `pedido_cod_cliente`, `pedido_status`, `pedido_data_compra`, `pedido_tipo_frete`) 
                        VALUES ('$row->code', '$id_cliente', '1', '$row->dueDate', '$freteTipo' )";

            if ($obj_mysqli->query($sql) === TRUE) {

                //
            } else {
                echo "Erro: " . $sql . "<br><br><br>" . $obj_mysqli->error;
            }

            $selectid = "SELECT pedido_id FROM pedido WHERE pedido_pagseguro='$row->code'";
            $resultado = $obj_mysqli->query($selectid);
            $resultado1 = $resultado->fetch_assoc();

            $resultado1 = $resultado1['pedido_id'];
      
            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                $sql = "SELECT * FROM produto WHERE produto_id='$id'";
                $result = $obj_mysqli->query($sql);
                $data1 = $result->fetch_assoc();
            
                $produto = $data1['produto_id'];

                $sql1 = "INSERT INTO `itens_pedido` (`id_pedido`, `id_cliente`, `pedido_item`, `pedido_qtd`) 
                    VALUES ('$resultado1', '$id_cliente', '$produto', '$qtd')";
    
                $i++;
                if($obj_mysqli->query($sql1) === TRUE){}
                else{
                    echo "Erro";
                }
            
            }

        }

        
        //######################### iserir dados no banco ######################### 
        ?>
        <style>
            #meio {
                position: relative;
                width: 100%;
                height: 110%;
                overflow: hidden;
            }
        </style>

        <?php
        //$pagina = 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=2ba305ca25d66cebd652ef43f15642fe545a8405ed86519d776500e2ce1e7f1d35f379b9f7d190fd';
        //$row->paymentLink = $pagina;
        ?>

        <div id="meio" class="container-fuid">
            <iframe src="<?= $row->paymentLink ?>" style="width: 100%; height: 100%; display:block; margin: 0px;"></iframe>


        </div>
    </div><!-- /.container -->

    <script src="../../assets/web/assets/jquery/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/theme/js/script.js"></script>
    <script src="../../assets/parallax/jarallax.min.js"></script>
    <script src="../../assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="../../assets/smoothscroll/smooth-scroll.js"></script>

</body>

</html>