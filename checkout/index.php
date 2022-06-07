<?php
session_start();

if (isset($_POST['correios'])) {
  $_SESSION['frete'] = true;
}
if (!isset($_SESSION['login']["cliente_Id"]) || !isset($_SESSION['login']["cliente_nome"])) {
  header("Location: ../login.php");
}

require_once('config.php');
require_once('utils.php');

$frete = isset($_POST['correios']) ? $_POST['correios'] : null;
$fretexplo = explode("/", $frete);
$frete = $fretexplo[0];
$freteTipo = $fretexplo[1];

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
  <link rel="shortcut icon" href="assets/images/logo-122x119.png" type="image/x-icon">
  <link rel="canonical" href="https://morrocavadocafe.com" />
  <?php
  $params = array(
    'email' => $PAGSEGURO_EMAIL,
    'token' => $PAGSEGURO_TOKEN
  );
  $header = array();

  $response = curlExec($PAGSEGURO_API_URL . "/sessions", $params, $header);
  $json = json_decode(json_encode(simplexml_load_string($response)));
  $sessionCode = $json->id;
  ?>

  <title>Morro Cavado Café | Produtos</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/theme/css/style.css">
  <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
  <link href="../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">
  <link href="../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">

  <script src="assets/js/jquery-3.2.1.min.js"></script>

  <!-- Funções para validação de CPF e CNPJ -->
  <script src="assets/js/valida_cpf_cnpj.js"></script>

  <!-- Formatando o CPF ou CNPJ -->
  <script src="assets/js/formata.js"></script>

</head>

<body>
<!--###################### Nav #############################-->
<section class="menu cid-rJ7JV5pcDW" once="menu" id="menu2-0">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a href="index.html">
                            <img src="assets/images/logo-122x119.png" alt="" title="" style="height: 3.8rem;">
                        </a>
                    </span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="page1.html">Institucional</a>
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

  <br>
  <br>
  <br>
  <br>
  <!--###################################################-->

	<div class="container-fuid">
		<div class="row">
		<div class="col-sm">
		<div class="card border">
		<div class="card-header">
		Resumo Pedido
		</div>
		<div class="card-body">
		<div>Produtos</div>
		<b>
		<?php
		if (count($_SESSION['carrinho']) > 0) {
		require '../adm/comum.php';
		foreach ($_SESSION['carrinho'] as $id => $qtd) {
		$sql = "SELECT * FROM produto WHERE produto_id='$id'";
		$result = $obj_mysqli->query($sql);
		$data = $result->fetch_assoc();
		$produto = $data['produto_nome'];
		$sub = number_format($data['produto_preco'] * $qtd, 2, ',', '.');
		@$total += $sub;
		echo $qtd . 'x ' . $produto . '<br>';
		}
		}
		?>
		</b>
		<div>Valor</div>
		<b><?php echo 'R$ ' . number_format($total, 2, ',', '.'); ?></b>
		<div>Frete</div>
		<b><?php echo 'R$ ' . $frete ?></b>
		<div>Valor Total</div>
		<b><?php
		$total = number_format($total, 2, '.', ',');
		$frete = str_replace(',', '.', $frete);
		@$soma = $total + $frete;
		echo 'R$ ' . number_format($soma, 2, ',', '.'); ?>
		</b>
		</div>
		</div>
		</div>
		<div class="col-sm">
		<div class="card border">
		<div class="card-header">
		Formas de pagamento
		</div>
		<div class="card-body">
		<input type="radio" value="Boleto" name="Pagamento" id="boleto" />
		<label for="boleto">Boleto </label>
		<br>
		<input type="radio" value="CCredito" name="Pagamento" id="CCredito" />
		<label for="CCredito">Cartão de Credito</label>
		</div>
		</div>
		</div>
			<div class="col-sm">
				<div class="card border">
					<div class="card-header">
						Pague com PagSeguro
					</div>
					<div class="radioBoleto">
						<div class="card-body">
              <form name="Form1" enctype="multipart/form-data" action="gerar_boleto/boleto.php" method="POST" role="form">
              <input type="hidden" name="brand">
									<input type="hidden" name="token">
									<input type="hidden" name="soma"  value="<?=$soma ?>">
									<input type="hidden" name="correios" value="<?php echo $frete ?>">
									<input type="hidden" name="correiosTipo" value="<?php echo $freteTipo ?>">
								<input type="hidden" value="1" name="radio">
								<button name="submit" type="submit" class="btn btn-info">Imprimir boleto</button>
              </form>
						</div> 
					</div> 
					<div class="radioCartao">
						<div class="card-body">
							<form role="form" action="./pay.php" method="POST">
								<div class=" justify-content-md-center">
									<input type="hidden" name="brand">
									<input type="hidden" name="token">
									<input type="hidden" name="senderHash">
									<input type="hidden" name="correios" value="<?php echo $frete ?>">
									<input type="hidden" name="correiosTipo" value="<?php echo $freteTipo ?>">
									<div class="row">
										<div class="col mb-3">
											Valor Total: <b> <?php echo 'R$' . number_format($soma, 2, ',', '.'); ?></b>
											em 
											<select id="cardParcelamento" name="cardParcelamento">
												<option value="1" selected>1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>
											x
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label for="cardName">Nome:</label>
											<div class="input-group mb-3">
												<input type="text" placeholder="Conforme impresso no Cartão" name="cardName" class="form-control" required />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12 mb-3">
											<label for="cardNumber">Nº Cartão</label>
											<div class="input-group mb-3">
												<input type="tel" class="form-control" name="cardNumber" placeholder="Numero de Cartão Válido" autocomplete="cc-number" required autofocus value="" />
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="far fa-credit-card"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-8 mb-3">
											<label for="cardExpiry">Validade</label>
											<input type="tel" class="form-control" name="cardExpiry" placeholder="MM/YY" autocomplete="cc-exp" required value="" />
										</div>
										<div class="col-md-4 mb-3 pull-right">
											<label for="cardCVC">CVV</label>
											<input type="tel" class="form-control" name="cardCVC" placeholder="CVV" autocomplete="cc-csc" required value="" />
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label for="cardNascimento">Data Nascimento:</label>
											<div class="input-group mb-3">
												<input type="text" name="cardNascimento" class="form-control" required placeholder="DD/MM/AAAA" onkeyup="mascara_data(this, this.value)" maxlength="10" />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col mb-3">
											<label for="cardCPF">CPF:</label>
											<div class="input-group mb-3">
												<input type="text" name="cardCPF" class="form-control cpf_cnpj" placeholder="999.999.999-99" required />
											</div>
										</div>
									</div>
									<div class="col">
										<button class="btn btn-primary btn-sm btn-block" type="submit">Pagar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
      $("button:submit").click(function() {
        var senderHash = PagSeguroDirectPayment.getSenderHash();
        $("input[name='senderHash']").val(senderHash);
      });

      jQuery(function($) {
        PagSeguroDirectPayment.setSessionId('<?php echo $sessionCode; ?>');

        PagSeguroDirectPayment.getPaymentMethods({
          success: function(json) {
            console.log(json);
          },
          error: function(json) {
            console.log(json);
            var erro = "";
            for (i in json.errors) {
              erro = erro + json.errors[i];
            }
            alert(erro);
          },
          complete: function(json) {}
        });

        PagSeguroDirectPayment.getBrand({
          cardBin: $("input[name='cardNumber']").val().replace(/ /g, ''),
          success: function(json) {
            var brand = json.brand.name;

            $("input[name='brand']").val(brand);

            console.log(brand);

            var param = {
              cardNumber: $("input[name='cardNumber']").val().replace(/ /g, ''),
              brand: brand,
              cvv: $("input[name='cardCVC']").val(),
              expirationMonth: $("input[name='cardExpiry']").val().split('/')[0],
              expirationYear: $("input[name='cardExpiry']").val().split('/')[1],
              success: function(json) {
                var token = json.card.token;
                $("input[name='token']").val(token);
                console.log("Token: " + token);
              },
              error: function(json) {
                console.log(json);
              },
              complete: function(json) {}
            }

            PagSeguroDirectPayment.createCardToken(param);
          },
          error: function(json) {
            console.log(json);
          },
          complete: function(json) {}
        });

      });

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
      $('.radioBoleto').hide();
      $('.radioCartao').hide();
      $('input[name="Pagamento"]').change(function() {
        if ($('input[name="Pagamento"]:checked').val() === "Boleto") {
          $('.radioBoleto').show();
          $('.radioCartao').hide();
        }
        if ($('input[name="Pagamento"]:checked').val() === "CCredito") {
          $('.radioBoleto').hide();
          $('.radioCartao').show();
        }
      });
    </script>
    <script>
      $("#footer").load("../assets/theme/footer.html");
    </script>
</body>

</html>