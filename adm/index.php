
<?php
header('Content-Type: text/html; charset=utf-8');
// Inicia sess�es 
session_start();

// Verifica se existe os dados da sess�o de login 
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]))
{
// Usu�rio n�o logado! Redireciona para a p�gina de login 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.php'>";
exit;
}
if ($_SESSION["permissao"] == "A")
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=gerir.php'>";
else
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../login.php'>";
?> 