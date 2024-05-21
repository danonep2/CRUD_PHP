<?php
include '../../conecta-inc.php';

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criar usuario
    $stmt = $conn->prepare("INSERT INTO Usuario (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);
    $stmt->execute();    

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>


<script >
  window.location.href = "/index.php";
</script>