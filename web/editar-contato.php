<!-- criar-evento.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Contato </title>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2> <center> Editar Contato </center> </h2>
  <form action="../crud/contato/create-update.php" method="POST" class="meio" style="background-color: white">
  <?php
    // Importação do arquivo de conexão e do verificador do token
    include ('../conecta-inc.php');
    include ('./process/verifica-token.php');

    // Verificação do token
    verificaToken($conn);

    $id = $_GET['id'];

    // busca os dados no banco referente ao usuario
    $stmt = $conn->prepare("SELECT * FROM Contato WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // verifica se o contato existe
    if($result->num_rows == 0 ){
      echo '
      <script>
        // Gambiarras de redireciamento para o login 💀👍
        window.location.href = "../index.php";
      </script>
      ';
    }

    $row = $result->fetch_assoc();

    // extrai os dados do objeto
    $id = $row['id'];
    $nome = $row['nome'];
    $telefone = $row['telefone'];
    $data_nasc = $row['data_nasc'];
    $usuario = $row['usuario'];

        // mostra os dados no formulario
        echo  "
        <input type='hidden' name='id' value='$id'>

        <label for='titulo'> Nome: </label>
        <input type='text' value='$nome' class='form-control' id='nome' name='nome'><br><br>

        <label for='titulo'> Telefone: </label>
        <input type='text' value='$telefone' class='form-control' id='telefone' name='telefone'><br><br>

        <label for='titulo'> Data de nascimento: </label>
        <input type='date' value='$data_nasc' class='form-control' id='data_nasc' name='data_nasc'><br><br>

        <input type='hidden' name='usuario' value='$usuario'>";
      ?>
      <button type="submit" class="btn btn-danger"> Editar </button>
    </form>
</body>
</html>