<?php
// Credenciais do banco
$dbhost = "";
$dbname = "";
$dbusername = "";
$dbpasswd = "";

// Conectando ao banco
$conn = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);

// Checando conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  /*
  Estrutura do banco de dados
  
  create table Usuario(
    id int not null PRIMARY KEY,
    nome varchar(50),
    email varchar(40),
    senha varchar(40)
  );

  create table Evento (
    id int not null PRIMARY KEY,
    titulo varchar(80),
    dataEvento date,
    descricao text,
    usuario int,
    FOREIGN KEY(usuario) REFERENCES Usuario(id)
  );

  create table Contato (
    id int not null PRIMARY KEY,
    nome varchar(90),
    telefone varchar(20),
    data_nasc date,
    usuario int,
    FOREIGN KEY(usuario) REFERENCES Usuario(id)
  );  

  create table Sessao (
    id int not null PRIMARY KEY,
    token VARCHAR(10),
    usuario int,
    FOREIGN KEY(usuario) REFERENCES Usuario(id)
  );
  */
  
?>