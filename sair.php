<?php
// Inicia sess�es, para assim poder destru�-las
session_start();
session_destroy();

header("Location: login.php");
?>

<!-- so testando o git -->