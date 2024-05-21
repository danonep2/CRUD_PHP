<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	
</head>
	
<body>
    <h2 class="text-center"> Login </h2>
    <form action="./process/login.php" method="POST" class="meio" style="background-color: white"> 
            <label for="email" class="form-floating mb-3"> Email: </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="nome@example.com"><br><br>

            <label for="senha" class="form-floating">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"><br><br>
	
			<button type="submit" class="btn btn-danger" name="btnEntrar"> Entrar </button>		
      <center class="mt-3">
      <a href="./cadastro.php" class="link-offset-2 link-underline link-underline-opacity-0"> Cadastre-se  </a>        
      </center>
    </form>
</body>
</html> 
