<?php
header('Content-Type: text/html; charset=utf-8');
// Inicia sess�es 
session_start();

// Verifica se existe os dados da sess�o de login 
if(!isset($_SESSION['login']["cliente_Id"]) || !isset($_SESSION['login']["cliente_nome"]))
{
// Usu�rio n�o logado! Redireciona para a p�gina de login 
require "login.php";
exit;
}
?> 