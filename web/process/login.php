<?php

// Importação do arquivo de conexão e um gerador de token
include("../../conecta-inc.php");
include("./gerar-token.php");

// Verifica se o botao foi precionado
if (isset($_POST["btnEntrar"])) {
    // extrai os dados
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Busca o usuario no banco de dados
    $stmt = $conn->prepare("SELECT * FROM Usuario WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // configurando o cookie usando a função setcookie() e random_str_generator()
        $token = random_str_generator(10);
        setcookie('token', $token , time() + 3600, "/");

        // pegando id do usuario para criar a sessao
        $usuarioID = $result->fetch_assoc()['id'];
      
        // criando sessao no banco de dados
        $stmtI = $conn->prepare("INSERT INTO Sessao (usuario, token ) VALUES (?, ?)");
        $stmtI->bind_param("is", $usuarioID , $token);
        $stmtI->execute();
        header("Location:../../index.php");
        exit();
    } 
  
} 
  // Redireciona para a página inicial
  header("Location:../../index.php");
  exit();
?>