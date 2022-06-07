<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    O.S2prohost
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../assets/css/material-kit.min1036.css?v=2.1.1" rel="stylesheet" />
  <!-- Google Tag Manager -->

</head>

<body class="sections-page sidebar-collapse">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php"><img src="../../assets/img/logo-os2pro2.png" alt="some text" width=90 >
          O.S 2prohost </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="index.php" class=" nav-link">
              <i class="material-icons">apps</i> Home
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">view_day</i> Serviços
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="../sections.html#headers" class="dropdown-item">
                <i class="material-icons">dns</i> Headers
              </a>
              <a href="../sections.html#features" class="dropdown-item">
                <i class="material-icons">build</i> Features
              </a>
              <a href="../sections.html#blogs" class="dropdown-item">
                <i class="material-icons">list</i> Blogs
              </a>              
              <a href="../sections.html#projects" class="dropdown-item">
                <i class="material-icons">assignment</i> Projects
              </a>
              <a href="../sections.html#pricing" class="dropdown-item">
                <i class="material-icons">monetization_on</i> Pricing
              </a>
              <a href="../sections.html#testimonials" class="dropdown-item">
                <i class="material-icons">chat</i> Testimonials
              </a>
              <a href="../sections.html#contactus" class="dropdown-item">
                <i class="material-icons">call</i> Contacts
              </a>
            </div>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">view_carousel</i> Planos
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="about-us.html" class="dropdown-item">
                <i class="material-icons">account_balance</i> About Us
              </a>
              <a href="blog-post.html" class="dropdown-item">
                <i class="material-icons">art_track</i> Blog Post
              </a>
              <a href="blog-posts.html" class="dropdown-item">
                <i class="material-icons">view_quilt</i> Blog Posts
              </a>
              <a href="contact-us.html" class="dropdown-item">
                <i class="material-icons">location_on</i> Contact Us
              </a>
              <a href="landing-page.html" class="dropdown-item">
                <i class="material-icons">view_day</i> Landing Page
              </a>
              <a href="login-page.html" class="dropdown-item">
                <i class="material-icons">fingerprint</i> Login Page
              </a>
              <a href="pricing.html" class="dropdown-item">
                <i class="material-icons">attach_money</i> Pricing Page
              </a>
              <a href="shopping-cart.html" class="dropdown-item">
                <i class="material-icons">shopping_basket</i> Shopping Cart
              </a>
              <a href="ecommerce.html" class="dropdown-item">
                <i class="material-icons">store</i> Ecommerce Page
              </a>
              <a href="product-page.html" class="dropdown-item">
                <i class="material-icons">shopping_cart</i> Product Page
              </a>
              <a href="profile-page.html" class="dropdown-item">
                <i class="material-icons">account_circle</i> Profile Page
              </a>
              <a href="signup-page.html" class="dropdown-item">
                <i class="material-icons">person_add</i> Signup Page
              </a>
              <a href="error.html" class="dropdown-item">
                <i class="material-icons">error</i> Error Page
              </a>
            </div>
          </li>		  
		  <li class="dropdown nav-item">
            <a href="contato.php" class=" nav-link">
              <i class="material-icons">people</i> Contatos
            </a>
          </li>		  
          <li class="button-container nav-item iframe-extern">
            <a href="conn/login.php" class="btn btn-primary btn-round btn-block">
              <i class="material-icons">shopping_cart</i> Minha Conta
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../../assets/img/contato.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h1 class="title">Entre em Contato</h1>
          <h4>Estamos esperando você!</h4>
        </div>
      </div>
    </div>
  </div>
    
	

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">


<?php
include '../source/Boleto.php';

// Conexão com o banco de dados
require "../../conn/comum.php"; 
$radio = $_POST["radio"];
$cartao = "";
if($radio == 1){
	$id     = -1;
	$plano_desc_v = $_POST["plano_desc_v"];
	@$v2 = $_POST["boleto_valor2"];
	$cliente_nome = $_POST["cliente_nome"];
	$cliente_cpf = $_POST["cliente_cpf"];
	$cliente_cnpj = $_POST["cliente_cnpj"];
	$cliente_data_nacimento = $_POST["cliente_data_nacimento"];
	$cliente_ddd = $_POST["cliente_ddd"];
	$cliente_telefone = $_POST["cliente_telefone"];
	$cliente_endereco = $_POST["cliente_endereco"];
	$cliente_numero = $_POST["cliente_numero"];
	$cliente_bairro = $_POST["cliente_bairro"];
	$cliente_cidade = $_POST["cliente_cidade"];
	$cliente_estado = $_POST["cliente_estado"];
	$cliente_cep = $_POST["cliente_cep"];
	$cliente_pais = $_POST["cliente_pais"];
	$senha2 = $_POST["senha"];
	$senha = md5($_POST["senha"]);
	$email  = $_POST["email"];
	
	function inverteData($cliente_data_nacimento){
			if(count(explode("/",$cliente_data_nacimento)) > 1){
				return implode("-",array_reverse(explode("/",$cliente_data_nacimento)));
			}elseif(count(explode("-",$cliente_data_nacimento)) > 1){
				return implode("/",array_reverse(explode("-",$cliente_data_nacimento)));
			}
		}
		$Data_inv = inverteData($cliente_data_nacimento);
		
	//echo "selecioneou cartão ". $radio;
	//echo 'valor---------------> '. $plano_desc_v."<br>";
if($plano_desc_v == "Basic"){
	$cartao = 'https://pag.ae/7UM4irv62';
include '../../conn/envia/email/envia_email_acesso_cartao.php';
	//echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=https://pag.ae/7UM4irv62'>";
}
if($plano_desc_v == "Pro"){
	$cartao = 'https://pag.ae/7UM4i75Kn';
include '../../conn/envia/email/envia_email_acesso_cartao.php';
	//echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=https://pag.ae/7UM4i75Kn'>";
}
if($plano_desc_v == "Premium"){
	$cartao = 'https://pag.ae/7UM4arE7G';
include '../../conn/envia/email/envia_email_acesso_cartao.php';
	//echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=https://pag.ae/7UM4arE7G'>";
}

/*
	basic https://pag.ae/7UM4irv62
	pro https://pag.ae/7UM4i75Kn
	premium https://pag.ae/7UM4arE7G
*/



}

if($radio == 2){
	//echo "selecioneou Boleto ". $radio;


$id     = -1;
$plano_desc_v = $_POST["plano_desc_v"];
@$v2 = $_POST["boleto_valor2"];
$cliente_nome = $_POST["cliente_nome"];
$cliente_cpf = $_POST["cliente_cpf"];
$cliente_cnpj = $_POST["cliente_cnpj"];
$cliente_data_nacimento = $_POST["cliente_data_nacimento"];
$cliente_ddd = $_POST["cliente_ddd"];
$cliente_telefone = $_POST["cliente_telefone"];
$cliente_endereco = $_POST["cliente_endereco"];
$cliente_numero = $_POST["cliente_numero"];
$cliente_bairro = $_POST["cliente_bairro"];
$cliente_cidade = $_POST["cliente_cidade"];
$cliente_estado = $_POST["cliente_estado"];
$cliente_cep = $_POST["cliente_cep"];
$cliente_pais = $_POST["cliente_pais"];
$senha2 = $_POST["senha"];
$senha = md5($_POST["senha"]);
$email  = $_POST["email"];

function inverteData($cliente_data_nacimento){
			if(count(explode("/",$cliente_data_nacimento)) > 1){
				return implode("-",array_reverse(explode("/",$cliente_data_nacimento)));
			}elseif(count(explode("-",$cliente_data_nacimento)) > 1){
				return implode("/",array_reverse(explode("-",$cliente_data_nacimento)));
			}
		}
		$Data_inv = inverteData($cliente_data_nacimento);

if($id == -1)
		{
			
			echo "<br/>";

			$stmt = $obj_mysqli->prepare("INSERT INTO `cliente`(
			`cliente_plano`, 
			`cliente_cpf`, 
			`cliente_cnpj`, 
			`cliente_nome`, 
			`cliente_email`, 
			`cliente_data_nacimento`, 
			`cliente_ddd`, 
			`cliente_telefone`, 
			`cliente_endereco`, 
			`cliente_numero`, 
			`cliente_bairro`, 
			`cliente_cidade`, 
			`cliente_cep`, 
			`cliente_estado`, 
			`cliente_pais`)
 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)") or die($obj_mysqli->error);
			$stmt->bind_param('sssssssssisssss', 
			$plano_desc_v, 
			$cliente_cpf, 
			$cliente_cnpj, 
			$cliente_nome, 
			$email, 
			$Data_inv, 
			$cliente_ddd, 
			$cliente_telefone, 
			$cliente_endereco, 
			$cliente_numero, 
			$cliente_bairro, 
			$cliente_cidade, 
			$cliente_cep, 
			$cliente_estado, 
			$cliente_pais);	
			

			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			else
			{
				//echo "cadastro realisado com sucesso!";
				//require "envia/email/envia_email_cadastro.php";
				//exit;
			}	
			
		}
		if($id == -1){
			
			$tipo = "U";
			$stmt = $obj_mysqli->prepare("INSERT INTO `usuarios` (`nome`, `login`,`email`,`senha`, `tipo`) VALUES (?,?,?,?,?)");
			$stmt->bind_param('sssss', $cliente_nome, $email, $email, $senha, $tipo);	
			if(!$stmt->execute())
			{
				$erro = $stmt->error;
			}
			
		}


//echo "boleto salvo";

//Config::setProduction();
//Config::setSandbox();
//Config::setAccountCredentials('dev@sounoob.com.br', '5179DCD806314BD6A77B774DF6148CA9', false);



$boleto = new Boleto();
//Valor de cada boleto. Caso sua conta não absorver a taxa do boleto, será acrescentado 1 real no valor do boleto.
$boleto->setAmount($v2);
//Descrição do boleto
$boleto->setDescription($plano_desc_v);
//O CPF do comprador
if(strlen($cliente_cpf)==11)
	$boleto->setCustomerCPF($cliente_cpf);
else
	$boleto->setCustomerCNPJ($cliente_cnpj);

//Nome do comprador
$boleto->setCustomerName($cliente_nome);
//Email do comprador
$boleto->setCustomerEmail($email);
//Telefone do comprador
$boleto->setCustomerPhone($cliente_ddd, $cliente_telefone);



//Data de vencimento do boleto no formato de Ano-Mês-Dia. Essa data precisa ser no futuro, e no máximo 30 dias apatir do dia atual.
$boleto->setFirstDueDate(date("Y-m-d", strtotime("+3 days", time())));
//Esse é o numero de boletos a ser gerado.
$boleto->setNumberOfPayments(1);
//Uma referência de quem é o boleto (note que terá multiplos boletos com a mesma referência)
$boleto->setReference('Referencia Qualquer');//**
//Instruções para quem irá receber o pagamento
$boleto->setInstructions(' ');
//CEP do comprador
$boleto->setCustomerAddressPostalCode($cliente_cep);
//Endereço do comprador
$boleto->setCustomerAddressStreet($cliente_endereco);
//Numero da casa do comprador
$boleto->setCustomerAddressNumber($cliente_numero);
//Bairro do comprador
$boleto->setCustomerAddressDistrict($cliente_bairro);
//Cidade do comprador
$boleto->setCustomerAddressCity($cliente_cidade);
//Estado do comprador
$boleto->setCustomerAddressState($cliente_estado);
 


//Executa a conexão e captura a resposta do PagSeguro.
$data = $boleto->send();

//Você terá uma array de objeto, precisará de uma estrutura de laço para percorrer um a um.
foreach ($data->boletos as $row) {
    echo 'Código da tranzação: ' . $row->code .
        ' <br>Vencimento em: ' . $row->dueDate .
        ' <br>Código de barras: ' . $row->barcode .
        '<hr>';
}

//echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL='".$row->paymentLink."'>";



echo "plano atual: ".$plano_desc_v;

echo "<br>";
echo 'valor---------------> '. @$v2."<br>";
echo 'valor---------------> '. $plano_desc_v."<br>";
echo 'Nome----------------> '. $cliente_nome."<br>";
echo 'CPF-----------------> '. $cliente_cpf."<br>";
echo 'email---------------> '. $email."<br>";
echo 'Nacimento-----------> '. $cliente_data_nacimento."<br>";
echo 'DDD-----------------> '. $cliente_ddd."<br>";
echo 'Telefone------------> '. $cliente_telefone."<br>";
echo 'Endereço------------> '. $cliente_endereco."<br>";
echo 'Numero--------------> '. $cliente_numero."<br>";
echo 'Bairro--------------> '. $cliente_bairro."<br>";
echo 'Cidade--------------> '. $cliente_cidade."<br>";
echo 'CEP-----------------> '. $cliente_cep."<br>";
echo 'Estado--------------> '. $cliente_estado."<br>";
echo 'Pais--------------> '. $cliente_pais."<br>";
echo "<br>";
echo "<br>";
echo 'Senha---------------> '. $senha2."<br>";

include '../../conn/envia/email/envia_email_acesso_boleto.php';

//$pagina = 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=c247a8a7188b0ed3670cb6b1d13e2de2ab097dfd3a27535ae7e4df96498b6798b548cbdcc2550765#rmcl';
//$pagina = $row->paymentLink;
//echo "<meta HTTP-EQUIV='refresh' target="_blank" CONTENT='3;URL=$pagina'>";
//echo "<script>window.open('".$pagina."');</script>";

}
?>
<style>
#meio {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
</style>

<?php
//echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=../../index.php'>";
?>

<div id="meio" class="container-fuid">

<?php if($radio == 1){?>
<iframe src="<?=$cartao?>" style="width: 100%; height: 100%; display:block; margin: 0px;"></iframe>
<?php } else{?>
<iframe src="<?=$row->paymentLink?>" style="width: 100%; height: 100%; display:block; margin: 0px;"></iframe><?php } ?>


</div>









</div><!-- /.container -->
<br>
<br>
<br>
<br>
<br>
<br>


	
	
  <footer class="footer">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="index.php">
              Home
            </a>
          </li>
          <li>
            <a href="#">
              Serviços
            </a>
          </li>
          <li>
            <a href="#">
              Planos
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, Powered by
        <a href="https://www.os2prohost.com/" target="_blank">O.S2prohost</a> systems development.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../../buttons.github.io/buttons.js"></script>
  <!--	Plugin for Sharrre btn -->
  <script src="../../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../../assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
  <!--	Plugin for Small Gallery in Product Page -->
  <script src="../../assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
  <!-- Plugins for presentation and navigation  -->
  <script src="../../assets/demo/modernizr.js" type="text/javascript"></script>
  <script src="../../assets/demo/vertical-nav.js" type="text/javascript"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../../buttons.github.io/buttons.js"></script>
  <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
  <script src="../../assets/demo/demo.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/material-kit.min1036.js?v=2.1.1" type="text/javascript"></script>
  <script>
    $(document).ready(function() {


      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-46172202-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '../../../connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  
</body>
</html>