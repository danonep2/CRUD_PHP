<?php
  function verificaToken($conn) {
    // Recebe o token enviado pelo usuário
    $token = $_COOKIE['token'] ?? '';

    // Busca token no banco de dados
    $stmt = $conn->prepare("SELECT * FROM Sessao WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    //Verifica se o token é inválido
    if ($result->num_rows === 0) {
      echo '
      <script>
        // Gambiarras de redireciamento para o login 💀👍
        window.location.href = "../index.php";
      </script>
      ';
    }

    // Retorna a sessão encontrada caso precise
    return $result->fetch_assoc();
  }
?>