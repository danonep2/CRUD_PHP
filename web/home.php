<html>

<head>
  <title>Home</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body >
  <a  class="d-block text-decoration-none mt-2 position-absolute end-0 top-0 m-3" href="./process/logout.php"><button class="btn btn-danger ">Sair</button></a>
    <div class="w-auto row mt-5" >
      <div class="col">
      <h2 class="text-center">Eventos </h2>
      <table class= "table table-striped table-hover w-40 mx-2 table-bordered-dark" style="border-radius: 10px; overflow: hidden" > 
  <?php
  // Importação do arquivo de conexão e do verificador do token
  include("../conecta-inc.php"); 
  include("./process/verifica-token.php");

  // Verificação do token
  $sessao = verificaToken($conn);  

  // Buscando eventos relacionados ao usuario
  $stmt = $conn->prepare("SELECT * FROM Evento where usuario = ?");
  $stmt->bind_param("s", $sessao['usuario']);
  $stmt->execute();
  $result = $stmt->get_result();
  
  //criamos o cabeçalho da tabela e os  textos do header antes do loop  
  echo '<thead class="table-primary" >'; //abre o cabeçalho
  echo "<tr>"; //linha
  echo '<th scope = "col" >Título</th>'; //item
  echo '<th scope = "col">Descrição</th>'; //item
  echo '<th scope = "col">Data do evento</th>'; //item
  echo '<th scope = "col">Editar</th>'; //item 
  echo '<th scope = "col">Remover</th>'; //item
  echo "</tr>"; //fecha a linha     
  echo "</thead>"; //fecha o cabeçalho

  if ($result->num_rows > 0) { //verifica se não existem resultados
    // monta os dados <td> de saída linha <tr> a linha <tr> na tabela
    while ($row = $result->fetch_assoc()) {
      echo "<tr>"; //inicio da linha
      echo "<td>" . $row["titulo"] . "</td>"; //item
      echo "<td>" . $row["descricao"] . "</td>"; //item
      echo "<td>" . $row["dataEvento"] . "</td>"; //item
      echo "<td>" . '<a href="./editar-evento.php?id=' . $row['id'] . '">Atualizar</a>' . "</td>"; //item
      echo "<td>" . '<a href="../crud/evento/remove.php?id=' . $row['id'] . '">Remover</a>' . "</td>"; //item
      echo "</tr>"; //fim de linha
    } //fim do while
  } else { //else do if
    echo "<tr>";
    echo "<td colspan='7'><center>Não foram encontrados resultados</center></td>"; //Caso o select não retorne resultados
    echo "</tr>";
  } //fim do else
?>
  </table>
  <center>
    <a class=" text-decoration-none d-flex justify-content-center" href="criar-evento.php">
      <button class="btn btn-primary">Clique aqui para adicionar</button>
    </a>
  </center>
  </div>
      
  <div class="col">
    <h2 class="text-center">Contatos</h2>

    <?php 

  $stmt = $conn->prepare("SELECT * FROM Contato where usuario = ?");
  $stmt->bind_param("s", $sessao['usuario']);
  $stmt->execute();
  $result = $stmt->get_result();

  //criamos o cabeçalho da tabela e os  textos do header antes do loop, mas desta vez, para os contatos
  echo '<table class= "table table-striped table-hover w-40 mx-2 table-bordered-dark" style="border-radius: 10px; overflow: hidden" > '; //abre a tabela
  echo '<thead class="table-primary" >'; //abre o cabeçalho
  echo "<tr>"; //linha
  echo '<th scope = "col" >Nome</th>'; //item
  echo '<th scope = "col">Telefone</th>'; //item
  echo '<th scope = "col">Data de Nascimento</th>'; //item
  echo '<th scope = "col">Editar</th>'; //item
  echo '<th scope = "col">Remover</th>'; //item
  echo "</tr>"; //fecha a linha     
  echo "</thead>"; //fecha o cabeçalho

  if ($result->num_rows > 0) { //verifica se não existem resultados
    // monta os dados <td> de saída linha <tr> a linha <tr> na tabela
    while ($row = $result->fetch_assoc()) {
      echo "<tr>"; //inicio da linha
      echo "<td>" . $row["nome"] . "</td>"; //item
      echo "<td>" . $row["telefone"] . "</td>"; //item
      echo "<td>" . $row["data_nasc"] . "</td>"; //
      echo "<td>" . '<a href="./editar-contato.php?id=' . $row['id'] . '">Atualizar</a>' . "</td>"; //item
      echo "<td>" . '<a href="../crud/contato/remove.php?id=' . $row['id'] . '">Remover</a>' . "</td>"; //item
      echo "</tr>"; //fim de linha
    } //fim do while
  } else { //else do if
    echo "<tr>";
    echo "<td colspan='7'><center>Não foram encontrados resultados</center></td>"; //Caso o select não retorne resultados
    echo "</tr>";
  } //fim do else
  
  echo "</tr>"; //fecha a linha     
  echo "</thead>"; //fecha o cabeçalho

  echo '</table>'; //fecha a tabela fora das checagens
  $conn->close(); //fecha a conexão no corpo da página, já que temos uma verificação dentro do include
  ?>
  <center>
    <a class=" text-decoration-none d-flex justify-content-center" href="criar-contato.php">
      <button class="btn btn-primary">Clique aqui para adicionar</button>
    </a>
  </center>
 

    </div>
    </div>
</body>
</body>

</html>