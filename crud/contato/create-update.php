<?php
// Importação do arquivo de conexão e do verificador do token
include ('../../conecta-inc.php');
include ('../../web/process/verifica-token.php');

// Verificação do token
verificaToken($conn);

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data_nasc = $_POST['data_nasc'];
    $token = $_COOKIE['token'];
  
    $stmt = $conn->prepare("select * from Sessao where token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc()['usuario'];

    // Verifica se o ID do registro existe
    if ($id != null) {
        // Atualiza os dados do registro
        $stmt = $conn->prepare("UPDATE Contato SET nome = ?, telefone = ?, data_nasc = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nome, $telefone, $data_nasc, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Insere um novo registro
        $stmt = $conn->prepare("INSERT INTO Contato (nome, telefone, data_nasc, usuario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nome, $telefone, $data_nasc, $usuario);
        $stmt->execute();
        $stmt->close();
    }

    // Fecha a conexão com o banco de dados
    $conn->close();

    // Redireciona para a página inicial
    header("Location:../../index.php");
    exit();
}
?>