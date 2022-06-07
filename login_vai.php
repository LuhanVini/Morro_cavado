<?php
session_start();
// Conex�o com o banco de dados
require "adm/comum.php";



// Recupera o login
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
/*
echo "Login -----> ". $login;
echo "<br>";
echo "Senha -----> ". $senha;
*/
// Usu�rio n�o forneceu a senha ou o login
if (!$login || !$senha) {
    echo "Voc� deve digitar sua senha e login!";
    exit;
}

/**
 * Executa a consulta no banco de dados.
 * Caso o n�mero de linhas retornadas seja 1 o login � v�lido,
 * caso 0, inv�lido.
 */


//$SQL = "SELECT id, nome, login, senha, tipo FROM usuarios WHERE login = '" . $login . "'";
$SQL = "SELECT * FROM `cliente` WHERE `cliente_email`= '" . "$login" . "'";
$result_id = mysqli_query($obj_mysqli, $SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);


// Caso o usu�rio tenha digitado um login v�lido o n�mero de linhas ser� 1..
if ($total) {
    // Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
    $dados = mysqli_fetch_array($result_id);

    // Agora verifica a senha
    if (!strcmp($senha, $dados["cliente_senha"])) {
        // TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
        $_SESSION['login']["cliente_Id"]   =               $dados["cliente_Id"];
        $_SESSION['login']["cliente_cpf"]    =           $dados["cliente_cpf"];
        $_SESSION['login']["cliente_nome"] =            stripslashes($dados["cliente_nome"]);
        $_SESSION['login']["cliente_email"]    =        $dados["cliente_email"];
        $_SESSION['login']["cliente_data_nascimento"] = $dados["cliente_data_nascimento"];
        $_SESSION['login']["cliente_ddd"] =             $dados["cliente_ddd"];
        $_SESSION['login']["cliente_telefone"] =     $dados["cliente_telefone"];
        $_SESSION['login']["cliente_endereco"] =     $dados["cliente_endereco"];
        $_SESSION['login']["cliente_numero"]   =    $dados["cliente_numero"];
        $_SESSION['login']["cliente_bairro"] =       $dados["cliente_bairro"];
        $_SESSION['login']["cliente_cidade"] =       $dados["cliente_cidade"];
        $_SESSION['login']["cliente_cep"] =         $dados["cliente_cep"];
        $_SESSION['login']["cliente_estado"]   =    $dados["cliente_estado"];



       if ($_SESSION['carrinho'])
       {
            if(count($_SESSION['carrinho']) > 0){

            echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=carrinho/carrinho.php">';
            exit;
        }
        else if(count($_SESSION['carrinho'] <= 0))
        {
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=page3.html">';
            exit;
        }else{

            echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=page3.html">';
            exit;
        }

       }else{

        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=page3.html">';
        exit;
       }
     
    }
    // Senha inv�lida
    else {
        echo "Senha inv�lida!";
        exit;
    }
}
// Login inv�lido
else {
    echo "O login fornecido por voc� � inexistente!";
    exit;
}
