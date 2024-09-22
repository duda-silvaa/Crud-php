<?php
define('HOST', '127.0.0.1');
define('USER', 'root'); // Atualize com seu usuário do MySQL
define('SENHA', '046024');   // Atualize com a senha correta
define('DB', 'dbempresa');

$conexao = mysqli_connect(HOST, USER, SENHA, DB) or die ('Não foi possível conectar');
?>

