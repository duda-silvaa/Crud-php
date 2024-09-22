<?php
session_start();
require 'conexao.php';
if (isset($_POST['create_funcionario'])) {
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
	$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $sexo = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
    $salario = mysqli_real_escape_string($conexao, trim($_POST['salario']));

	$sql =  "INSERT INTO funcionario (Cpf, Nome, Datanasc, Endereco, Sexo, Salario)
     VALUES ('$cpf', '$nome', '$data_nascimento', '$endereco', '$sexo', '$salario')";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Funcionário criado com sucesso';
		header('Location: funcionario.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Funcionário não foi criado';
		header('Location: funcionario.php');
		exit;
	}
}

if (isset($_POST['update_funcionario'])) {
    // Recuperar e escapar dados
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
    $sexo = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
    $salario = mysqli_real_escape_string($conexao, trim($_POST['salario']));

    // Atualizar dados do funcionário
    $sql = "UPDATE funcionario 
            SET Nome = '$nome', 
                Datanasc = '$data_nascimento', 
                Endereco = '$endereco', 
                Sexo = '$sexo', 
                Salario = '$salario'
            WHERE Cpf = '$cpf'";

    // Executar consulta
    $result = mysqli_query($conexao, $sql);

    // Verificar se a atualização foi bem-sucedida
    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Funcionário atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Funcionário não foi atualizado. Verifique os dados e tente novamente.';
    }
    
    // Redirecionar para a página principal
    header('Location: funcionario.php');
    exit;
}

if (isset($_POST['delete_funcionario'])) {
    // Escapar e recuperar o CPF do funcionário
    $cpf = mysqli_real_escape_string($conexao, $_POST['delete_funcionario']);

    // Preparar a consulta de exclusão
    $sql = "DELETE FROM funcionario WHERE Cpf = '$cpf'";

    // Executar a consulta
    $result = mysqli_query($conexao, $sql);

    // Verificar se a exclusão foi bem-sucedida
    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Funcionário deletado com sucesso';
    } else {
        $_SESSION['message'] = 'Funcionário não foi deletado. Verifique o CPF e tente novamente.';
    }

    // Redirecionar para a página principal
    header('Location: funcionario.php');
    exit;
}
?>