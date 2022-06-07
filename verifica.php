<?php
header('Content-Type: text/html; charset=utf-8');
// Inicia sessões 
session_start();

// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION['login']["cliente_Id"]) || !isset($_SESSION['login']["cliente_nome"]))
{
// Usuário não logado! Redireciona para a página de login 
require "login.php";
exit;
}
?> 