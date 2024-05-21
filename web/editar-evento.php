<!-- editar-evento.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Evento</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
	
<body>
  <h2> <center> Editar Evento </center> </h2>
  <form action="../crud/evento/create-update.php" method="POST" class="meio" style="background-color: white">
    
  <?php

    // Importação do arquivo de conexão e do verificador do token
    include ('../conecta-inc.php');
    include ('./process/verifica-token.php');

    // Verificação do token
    verificaToken($conn);
    
    $id = $_GET['id'];

    // busca o evento no banco
    $stmt = $conn->prepare("SELECT * FROM Evento WHERE id = ?");
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
    $titulo = $row['titulo'];
    $dataEvento = $row['dataEvento'];
    $desc = $row['descricao'];
    $usuario = $row['usuario'];  
    
    
    echo "
        <input type='hidden' id='evento_id' name='evento_id' value='$id'>
			
        <label for='titulo'>Título:</label>
        <input type='text' class='form-control' id='titulo' name='titulo' value='$titulo'><br><br>
			
        <label for='data'>Data do Evento:</label>
        <input type='date' class='form-control' id='data' name='dataEvento' value='$dataEvento'><br><br>
			
        <label for='descricao'>Descrição:</label>
        <textarea id='descricao' class='form-control' name='desc' >$desc</textarea><br><br>

        <input type='hidden' id='usuario' name='usuario' value='$usuario'>
        ";
			
  ?>
			<button type="submit" class="btn btn-danger"> Editar </button>
    </form>
</body>
</html>