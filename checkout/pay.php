<?php session_start();
require_once('config.php');
require_once('utils.php');
require "../adm/comum.php";
?>

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


    <title>Morro Cavado Café | Contato</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <link href="../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<?php

// recepcao de dados do formulario
$frete = isset($_POST['correios']) ? $_POST['correios'] : null;
$freteTipo = isset($_POST['correiosTipo']) ? $_POST['correiosTipo'] : null;
$creditCardToken = htmlspecialchars($_POST["token"]);
$senderHash = htmlspecialchars($_POST["senderHash"]);
$cardName = ucwords($_POST["cardName"]);
$cardParcelamento = intval($_POST["cardParcelamento"]);
$cardNascimento = $_POST["cardNascimento"];
$cardCPF = str_replace("-", "", str_replace(".", "", $_POST["cardCPF"]));
$id_cliente = $_SESSION['login']["cliente_Id"];
$mensagem = "";

require '../adm/comum.php';
$i = 1;
$itens = array(); // criar array de itens do carrinho


//foreach para resgatar os itens do carrinho e enviar ao pagseguro
foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $sql = "SELECT * FROM produto WHERE produto_id='$id'";
    $result = $obj_mysqli->query($sql);
    $data = $result->fetch_assoc();

    $produto = $data['produto_nome'];

    $sub = number_format($data['produto_preco'], 2, ',', '.');
    $sub1 = number_format($data['produto_preco'] * $qtd, 2, ',', '.');
    $total += $sub1;

    $itens['itemId' . $i] = '000' . $id;
    $itens['itemDescription' . $i] = $produto;
    $itens['itemAmount' . $i] = number_format($sub, 2, ".", ",");
    $itens['itemQuantity' . $i] = intval($qtd);

    $i++;
}

$valorPrestacao = ($total + $frete) / $cardParcelamento; // calcular valor da prestaçao 



$params = array(
    'email'                     => $PAGSEGURO_EMAIL,
    'token'                     => $PAGSEGURO_TOKEN,
    'creditCardToken'           => $creditCardToken,
    'senderHash'                => $senderHash,
    'receiverEmail'             => $PAGSEGURO_EMAIL,
    'paymentMode'               => 'default',
    'paymentMethod'             => 'creditCard',  # ou BOLETO ou ONLINE_DEBIT
    'currency'                  => 'BRL',
    // 'extraAmount'               => '1.00',

    //'reference'                 => 'REF1234',


    'senderName'                => $_SESSION['login']["cliente_nome"],
    'senderCPF'                 => str_replace("-", "", str_replace(".", "", $_SESSION['login']["cliente_cpf"])),
    'senderAreaCode'            => $_SESSION['login']["cliente_ddd"],
    'senderPhone'               => $_SESSION['login']["cliente_telefone"],
    'senderEmail'               => 'c85209855025718166290@sandbox.pagseguro.com.br', // se for teste usar sandbox *c85209855025718166290@sandbox.pagseguro.com.br
    'shippingAddressStreet'     => $_SESSION['login']["cliente_endereco"],
    'shippingAddressNumber'     => $_SESSION['login']["cliente_numero"],
    'shippingAddressDistrict'   => $_SESSION['login']["cliente_bairro"],
    'shippingAddressPostalCode' => $_SESSION['login']["cliente_cep"],
    'shippingAddressCity'       => $_SESSION['login']["cliente_cidade"],
    'shippingAddressState'      => $_SESSION['login']["cliente_estado"],
    'shippingAddressCountry'    => 'BRA',
    'shippingType'              => 1,
    'shippingCost'              => $frete, //valor do frete formatado ja 

    'installmentQuantity'       => $cardParcelamento, # Número de parcelas
    'installmentValue'          => strval(number_format($valorPrestacao, 2, ".", ",")), # Valor da parcela em string (kkk vai entender)
    'noInterestInstallmentQuantity' => 3,

    'paymentMethodGroup1' => 'CREDIT_CARD',
    'paymentMethodConfigKey1_1' => 'MAX_INSTALLMENTS_NO_INTEREST',
    'paymentMethodConfigValue1_1' => 2,


    //dados do cartao de credito 
    'creditCardHolderName'      => $cardName,
    'creditCardHolderCPF'       => $cardCPF,
    'creditCardHolderBirthDate' => $cardNascimento,
    'creditCardHolderAreaCode'  => $_SESSION['login']["cliente_ddd"],
    'creditCardHolderPhone'     => $_SESSION['login']["cliente_telefone"],
    'billingAddressStreet'     => $_SESSION['login']["cliente_endereco"],
    'billingAddressNumber'     => $_SESSION['login']["cliente_numero"],
    'billingAddressDistrict'   => $_SESSION['login']["cliente_bairro"],
    'billingAddressPostalCode' => $_SESSION['login']["cliente_cep"],
    'billingAddressCity'       => $_SESSION['login']["cliente_cidade"],
    'billingAddressState'      => $_SESSION['login']["cliente_estado"],
    'billingAddressCountry'    => 'BRA'
);

$params = array_merge($itens, $params);


$header = array('Content-Type' => 'application/json; charset=UTF-8;');
$response = curlExec($PAGSEGURO_API_URL . "/transactions", $params, $header);
$json = json_decode(json_encode(simplexml_load_string($response)));

// swtich retorno do Pagseguro com codigo de retorno verificar cada situação 
switch ($json->status) {

    case "":
        $mensagem =  '
                        <div class="alert alert-danger" role="alert">
                        <h3 class="alert-heading">Erro!</h3>
                        <br>
                        <p>Desculpe... Ocorreu algum erro em sua transação tente novamente mais tarde</p>
                    
                            <hr>
                        <p class="mb-0">Aprimore seus sentidos...</p>
                    </div>';
                    var_dump($frete->valor);
        break;
    case "1":
        $mensagem = "Obrigado por comprar, seu pedido esta aguardando pagamento";
        break;
    case "2":
        $sql = "INSERT INTO `pedido`(`pedido_pagseguro`, `pedido_cod_cliente`, `pedido_status`, `pedido_data_compra`, `pedido_tipo_frete`) VALUES ('$json->code', '$id_cliente', '$json->status', '$json->date', '$freteTipo' )";

        if ($obj_mysqli->query($sql) === TRUE) {

            //
        } else {
            echo "Erro: " . $sql . "<br><br><br>" . $obj_mysqli->error;
        }


        $mensagem = '
                        <div class="alert alert-success" role="alert">
                        <h3 class="alert-heading">Obrigado!</h3>
                        <br>
                        <p>Recebemos seu pedido e esta em analise</p>
                        <p>Codigo da Transação: '. $json->code . '</p>
                        
                            <hr>
                        <p class="mb-0">Aprimore seus sentidos...</p>
                    </div>';
                   // unset($_SESSION['carrinho']);

        break;
    case "3":

        $sql = "INSERT INTO `pedido`(`pedido_pagseguro`, `pedido_cod_cliente`, `pedido_status`, `pedido_data_compra`, `pedido_tipo_frete`) VALUES ('$json->code', '$id_cliente', '$json->status', '$json->date', '$freteTipo' )";

        if ($obj_mysqli->query($sql) === TRUE) {

            //
        } else {
            echo "Erro: " . $sql . "<br><br><br>" . $obj_mysqli->error;
        }
        $mensagem = '
                        <div class="alert alert-success" role="alert">
                        <h3 class="alert-heading">Obrigado!</h3>
                        <br>
                        <p>Seu pedido foi pago com sucesso e ja esta sendo preparado por nossa equipe</p>
                        <p>Codigo da Transação: '. $json->code . '</p>
                     
                        
                            <hr>
                        <p class="mb-0">Aprimore seus sentidos...</p>
                    </div>';

       // unset($_SESSION['carrinho']);
        break;
    case "4":
        echo "Disponivel";
        break;
    case "5":
        echo "em disputa";
        break;
    case "6":
        echo "devolvida";
        break;
    case "7":
        echo "cancelada";
        break;
}

?>

<body>

<section class="menu cid-rJ7JV5pcDW" once="menu" id="menu2-0">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
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
                        <a href="../index.html">
                            <img src="../assets/images/logo-122x119.png" alt="morrocavadocafe" title="" style="height: 3.8rem;">
                        </a>
                    </span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../page1.html">Intitucional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../page3.html">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../page4.html">Contato</a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link link text-black display-4" href="../login.php">Minha conta</a>
					</li>
                </ul>
            </div>
        </nav>
    </section>

    <section class="mbr-section form1 cid-rKtYhbcEX1" id="form1-14">
        <div class="container mt-5">

            <?php echo $mensagem;
            
           //print_r($json);
    
            ?>
           


        </div>
    </section>


    <section id="footer" class="footer4 cid-rJf8j9IQHS" id="footer4-h">

    </section>

    <script src="../assets/web/assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/theme/js/script.js"></script>
    <script src="../assets/parallax/jarallax.min.js"></script>
    <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="../assets/smoothscroll/smooth-scroll.js"></script>

    <script>
        $("#nav").load("../assets/theme/nav.html");
        $("#footer").load("../assets/theme/footer.html");
    </script>

</body>

</html>