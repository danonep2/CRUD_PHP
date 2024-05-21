<!-- criar-contato.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Criar Contato</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    // Importação do arquivo de conexão e do verificador do token
    include ('../conecta-inc.php');
    include ('./process/verifica-token.php');

    // Verificação do token
    verificaToken($conn);
  ?>
    <h2> <center> Criar Contato </center> </h2>
    <form action="../crud/contato/create-update.php" method="POST" class="meio" style="background-color: white">
			
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome"><br><br>
			
        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" class="form-control" id="data_nasc" name="data_nasc"><br><br>
			
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone"><br><br>
			
        <button type="submit" class="btn btn-danger"> Criar </button>
    </form>
</body>
</html>