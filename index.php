<?php
// Configuração da rota inicial do projeto

include("./conecta-inc.php");

// Coleta token da pagina
$token = $_COOKIE['token'] ?? '';

// Busca token no banco
$stmt = $conn->prepare('select * from Sessao where token = ?');
$stmt->bind_param('s', $token);
$stmt->execute();
$result = $stmt->get_result();

// Se o token existir, ele vai direto para a tela home (pulando o login)
if ($result->num_rows > 0){
  header("Location:./web/home.php");
  exit();
}

// Caso o token não exista, ele vai para a tela de login
header("Location:./web/login.php");
exit();
?>