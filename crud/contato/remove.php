<?php
// Importação do arquivo de conexão e do verificador do token
include("../../conecta-inc.php");
include '../../web/process/verifica-token.php';

// Verificação do token
verificaToken($conn);


if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  $id = trim($_GET["id"]); //trata e armazena o parâmetro
  $stmt = $conn->prepare("DELETE FROM Contato WHERE id = ?"); //preparamos a query
  $stmt->bind_param("i", $id); //informamos os tipos e  as variáveis
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
    echo "<h2>Registro removido com sucesso!</h2>";
      
    } else { //else do if num_rows
      echo "Ocorreu um erro ao executar o comando!";
  }//fim do else 
} //fim dos if isset
$stmt->close();
$conn->close();
header("location: index.php");
exit();
?>