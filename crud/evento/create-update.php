<?php
include('../../conecta-inc.php');
include('../../web/process/verifica-token.php');
verificaToken($conn);
// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $id = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'];
    $dataEvento = $_POST['dataEvento'];
    $descricao = $_POST['descricao'];

    $token = $_COOKIE['token'];

    $stmt = $conn->prepare("select * from Sessao where token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc()['usuario'];

    // Verifica se o ID do registro existe
    if ($id != null) {
        // Atualiza os dados do registro
        $stmt = $conn->prepare("UPDATE Evento SET titulo = ?, dataEvento = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("sssi", $titulo, $dataEvento, $descricao, $id);      
        $stmt->execute();
        $stmt->close();
    } else {
        // Insere um novo registro
        $stmt = $conn->prepare("INSERT INTO Evento (titulo, dataEvento, descricao, usuario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $titulo, $dataEvento, $descricao, $usuario);
        $stmt->execute();
        $stmt->close();
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
  header("Location:../../index.php");
?>