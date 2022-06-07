<?php
session_start();

/*
***** Autor: Felipe Reis
***** Data: 29/01
***** Versao: 01

*/
//verificar se existe sessao do carrinho se nao existir criar uma sessao com array
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//adicionar carrinho
if (isset($_GET['acao']) && $_GET['acao'] == 'add') {

    $id = intval($_GET['id']); //converte o id em inteiro e seta valor

    // verificar se existe produto no carrinho se nao existir coloca 1, se existir acrescente +1
    if (!isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = 1;
    } else {
        $_SESSION['carrinho'][$id] += 1;
    }
    header("Location:carrinho.php");
}


//REMOVER DO CARRINHO

if (@$_GET['acao'] == 'del') {
    $id = intval($_GET['id']); //converte o id em inteiro e seta valor
    if (isset($_SESSION['carrinho'][$id])) {

        unset($_SESSION['carrinho'][$id]);
    }
}

//add item no carrinho

if (@$_GET['acao'] == 'sub') {

    $id = intval($_GET['id']);
    if (isset($_SESSION['carrinho'][$id])) {

        $_SESSION['carrinho'][$id] -= 1;
        if (!$_SESSION['carrinho'][$id] <> 0) {
            unset($_SESSION['carrinho'][$id]);
        }
        header("Location:carrinho.php");
    }
}


if (@$_GET['acao'] == 'soma') {

    @$id = intval($_GET['id']);
    if (@isset($_SESSION['carrinho'][$id])) {
        @$_SESSION['carrinho'][$id] += 1;
        header("Location:carrinho.php");
    }
}

//EDITAR QUANTIDADE DO CARRINHO
if (@$_GET['acao'] == 'up') {
    if (@is_array($_POST['prod'])) {
        foreach ($_POST['prod'] as $id => $qtd) {
            $id = intval($id);
            $qtd = intval($qtd);
            if (!empty($qtd) || $qtd <> 0) {
                $_SESSION['carrinho'][$id] = $qtd;
            } else {
                unset($_SESSION['carrinho'][$id]);
            }
        }
    }
    header("Location:carrinho.php");
}

//####################### frete ###############

if (isset($_POST["destino"]) && empty($_POST["destino"] == null)) {


    $destino = $_POST['destino'];
    $servico = 40010;
    $servico_pac = 41106;
    $origem = 37012120;
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $largura = $_POST['largura'];
    $comprimento = $_POST['comprimento'];

    # 
    # implementa funcao de calculo de pre�os e prazos 
    # para servi�os dos correios
    #
    if (!function_exists('calculaFrete')) {
        function calculaFrete(
            $cod_servico, /* codigo do servico desejado */
            $cep_origem,  /* cep de origem, apenas numeros */
            $cep_destino, /* cep de destino, apenas numeros */
            $peso,        /* valor dado em Kg incluindo a embalagem. 0.1, 0.3, 1, 2 ,3 , 4 */
            $altura,      /* altura do produto em cm incluindo a embalagem */
            $largura,     /* altura do produto em cm incluindo a embalagem */
            $comprimento, /* comprimento do produto incluindo embalagem em cm */
            $valor_declarado = '0' /* indicar 0 caso nao queira o valor declarado */
        ) {

            $cod_servico = strtoupper($cod_servico);
            if ($cod_servico == 'SEDEX10') $cod_servico = 40215;
            if ($cod_servico == 'SEDEXACOBRAR') $cod_servico = 40045;
            if ($cod_servico == 'SEDEX') $cod_servico = 40010;
            if ($cod_servico == 'PAC') $cod_servico = 41106;

            # ###########################################
            # Codigo dos Principais Serviços dos Correios
            # 41106 PAC sem contrato
            # 40010 SEDEX sem contrato
            # 40045 SEDEX a Cobrar, sem contrato
            # 40215 SEDEX 10, sem contrato
            # ###########################################

           $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=" 
           . $cep_origem . "&sCepDestino=" . $cep_destino . "&nVlPeso=" . $peso . "&nCdFormato=1&nVlComprimento=" 
           . $comprimento . "&nVlAltura=" . $altura . "&nVlLargura=" . $largura . "&sCdMaoPropria=n&nVlValorDeclarado=" 
           . $valor_declarado . "&sCdAvisoRecebimento=n&nCdServico=" . $cod_servico . "&nVlDiametro=0&StrRetorno=xml" ;
        
           $xml = simplexml_load_file($correios);
       
            $_arr_ = array();
            if ($xml->cServico->Erro == '0') :
                $_arr_['codigo'] = $xml->cServico->Codigo;
                $_arr_['valor'] = $xml->cServico->Valor;
                $_arr_['prazo'] = $xml->cServico->PrazoEntrega . ' Dias';
                // return $xml->cServico->Valor;
                return $_arr_;
            else :
                return false;
            endif;
        }
    }

    $_resultado = calculaFrete(
        $servico,
        $origem,
        $destino,
        $peso,
        $altura,
        $largura,
        $comprimento,
        0
    );

    $_resultado1 = calculaFrete(
        $servico_pac,
        $origem,
        $destino,
        $peso,
        $altura,
        $largura,
        $comprimento,
        0
    );
/*
    echo "<br><br><br><br><br>";
  
  	echo "VALOR: ".$_resultado['valor'];
	echo "<br>";
    echo "PRAZO: ".$_resultado['prazo'];
    echo "<br><br><br>";
    echo "VALOR: ".$_resultado1['valor'];
	echo "<br>";
	echo "PRAZO: ".$_resultado1['prazo'];
    #
    # fim da funcao
    #
*/
}


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


    <title>Morro Cavado Café | Carrinho de Compras</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <link href="../assets/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">


</head>


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
                        <a class="nav-link link text-black display-4" href="../page1.html">Institucional</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../page3.html">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="../page4.html">Contato</a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link link text-black display-4" href="../minhaconta.html">Minha conta</a>
					</li>
                </ul>
            </div>
        </nav>
    </section>

    <section class="mbr-section form1 cid-rKtYhbcEX1" id="form1-14">

        <div class="container">
            <div class="row justify-content-center">
                <table class="table border">
                    <thead>
                        <tr style="background-color: #004730; color: white; ">
                            <th scope="col"></th>
                            <th scope="col">Produto</th>
                            <th scope="col">Qtd</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($_SESSION['carrinho']) == 0) {

                            echo '<tr><td>Não há produto no carrinho</td></tr>';
                        } else {

                            require '../adm/comum.php';
                            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                $sql = "SELECT * FROM produto as P INNER JOIN frete as F on P.produto_cod = F.frete_cod WHERE produto_id='$id'";

                                $result = $obj_mysqli->query($sql);
                                $data = $result->fetch_assoc();


                                $produto = $data['produto_nome'];
                                $preco = number_format($data['produto_preco'], 2, ',', '.');
                                $sub = number_format($data['produto_preco'] * $qtd, 2, ',', '.');
                                $img = $data['produto_img'];

                                $total += $sub;

                                $peso = $data['frete_peso'] * $qtd;
                                $pesototal += $peso;
                                $altura += $data['frete_altura'];
                                $largura += $data['frete_largura'];
                                $comprimento += $data['frete_comprimento'];

                                echo '<tr>
                                            <td><img src="../assets/images/' . $img . ' "width="80px"></td>
                                            <td>' . $produto . '</td>
                                            <td><input style="border:0" type="text" size="2" name="prod[' . $id . ']" value="' . $qtd . '"/> 
                                            
                                            <a href="?acao=sub&id=' . $id . '"> 
                                            <i class="fas fa-minus-square"></i> </a>  

                                            <a href="?acao=soma&id=' . $id . '"> 
                                            <i class="fas fa-plus-square"></i></a>

                                            <a href="?acao=del&id=' . $id . '">
                                            <i class="fas fa-trash" style="color: red;"></i></a>
                                            
                                            </td>
                                            <td>R$ ' . $preco . '</td>
                                            <td>R$ ' . $sub . '</td>

                                        </tr> ';
                            } //fim foreach



                        }

                        $total = number_format($total, 2, ',', '.');

                        echo '<tr>
                                      
                                            <td colspan="5" align="right">

                                           <form action="carrinho.php" method="POST">
                                            <input type="hidden" name="peso"  value="'.$pesototal.'" />
                                            <input type="hidden" name="altura" value="'.$altura.'" />
                                            <input type="hidden" name="largura" value="'.$largura.'" />
                                            <input type="hidden" name="comprimento" value="'.$comprimento.'" />

                                            CEP <input type="text" size="12" name="destino" id="cep-destino"/>
                                           <input type="submit" value="Calcular Frete"/>
                                           </form> 
                                            </td>
                                     
                                                                           
                                        </tr>';

                        ?>

                        <form action="../checkout/index.php" method="POST">


                            <?php

                            if (@isset($_POST["destino"]) && !empty($_POST["destino"]) && !empty($_resultado)) {

                                echo '<tr align="left">

                                            <td colspan=5>
                                
                                                    <input type="radio" onClick="habilitacao()" name="correios" id="sedex" value="' . $_resultado['valor'] . '/sedex" />
                                                    <label for="sedex"><b>Sedex:</b> ' . $_resultado['prazo'] . ' R$ ' . $_resultado['valor'] . '</label>
                        <br>
                                                    <input type="radio" onClick="habilitacao()" name="correios" id="pac" value="' . $_resultado1['valor']  . '/pac" />
                                                    <label for="pac"><b>Pac:</b> ' . $_resultado1['prazo'] . ' R$ ' . $_resultado1['valor'] . ' </label>
              
                                
                                            </td>
                                            
                                        </tr>';
                            }
                            echo '<tr>
                                            <td colspan="3"></td>

                                            <th>Total</th>
                                            <th>R$ ' . $total . '</th>
                                        </tr>';
                            ?>

                    </tbody>
                    <tfoot>

                        <tr>
                            <td colspan="2" align="bottom">

                                <i class="fas fa-backward"></i>
                                <a href="../page3.html">Continuar Comprando</a>
                            </td>
                            <td colspan="3" align="right">


                                <button type="submit" id="fcompra" class="btn btn-primary btn-sm">Finalizar Compra</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </section>

    <section class="footer4 cid-rJf8j9IQHS" id="footer4-h">
        <div class="container">
            <div class="media-container-row content mbr-white">
                <div class="col-md-3 col-sm-4">
                    <div class="mb-3 img-logo">
                        <a href="index.html">
                            <img src="../assets/images/logo-branca-196x177.png" alt="morrocavadocafe" title="">
                        </a>
                    </div>
                    <p class="mb-3 mbr-fonts-style foot-title display-7"></p>
                    <p class="mbr-text mbr-fonts-style mbr-links-column display-7">Home<br>Institucional<br>Loja<br><a href="#" class="text-white">C</a>ontato</p>
                </div>
                <div class="col-md-4 col-sm-8">
                    <p class="mb-4 foot-title mbr-fonts-style display-7">Endereço;</p>
                    <p class="mbr-text mbr-fonts-style foot-text display-7">Rua Presidente Antonio Carlos, 811 - Centro <br>
                        Varginha - MG - 37002-005<br>
                        <br>Contato:
                        <br>
                        <br>Email: morrocavadocafe@gmail.com
                        <br>Telefone: 35 9 9919-2602<br>Telefone: 35 9 9941-2120<br>
                    </p>
                </div>
                <div class="col-md-4 offset-md-1 col-sm-12">
                    <p class="mb-4 mbr-fonts-style foot-title display-7">Redes Sociais</p>
                    <div class="social-list pl-0 mb-5 ml-1">
                        <div class=" mb-5 ml-0">
                            <a href="https://www.facebook.com/morrocavadocafe/" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social"><i class="fab fa-facebook-square"></i></span>
                            </a>
                        </div>
                        <div class="mb-5 ml-3">
                            <a href="https://www.instagram.com/morrocavadocafe/" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social"><i class="fab fa-instagram"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-12 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">© Copyright 2020 - Morro Cavado Café</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script language="javascript">

        document.getElementById('fcompra').disabled = true;
        console.log(document.getElementsByName('correios').length);
    
                            function habilitacao(){
                            if(document.getElementsByName('correios').length > 0){
                                document.getElementById('fcompra').disabled = false;
                              
                            }
                          
                            }
                        </script>
    <script src="../assets/web/assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/theme/js/script.js"></script>
    <script src="../assets/parallax/jarallax.min.js"></script>
    <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="../assets/smoothscroll/smooth-scroll.js"></script>


</body>

</html>