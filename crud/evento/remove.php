<?php
// Importação do arquivo de conexão e o verificador de token
include("../../conecta-inc.php");
include ('../../web/process/verifica-token.php');

// Verifica token
verificaToken($conn);

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  $id = trim($_GET["id"]); //trata e armazena o parâmetro
  $stmt = $conn->prepare("DELETE FROM Evento WHERE id = ?"); //preparamos a query
  $stmt->bind_param("i", $id); //informamos os tipos e  as variáveis
  $stmt->execute();
} //fim dos if isset
$stmt->close();
$conn->close();
header("Location:../../index.php");
exit();
?>