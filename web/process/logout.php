<?php

// Importação do arquivo de conexão
include("../../conecta-inc.php");

// Coleta o token da requesição
$token = $_COOKIE['token'];

// Delete token cookie
setcookie("token", "", time() - 3600, "/");

// apaga a sessao do usuario do banco
$stmt = $conn->prepare("DELETE FROM Sessao WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->close();

// Redireciona para a página inicial
header("Location:../../index.php");
?>