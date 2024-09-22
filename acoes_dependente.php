<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_dependente'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $sexo = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
    $func = mysqli_real_escape_string($conexao, trim($_POST['func']));
    $parentesco = mysqli_real_escape_string($conexao, trim($_POST['parentesco']));

    $sql = "INSERT INTO dependente (Nome, Sexo, Datanasc, Parentesco, funcionario_Cpf)
            VALUES ('$nome', '$sexo', '$data_nascimento', '$parentesco', '$func')";

    $result = mysqli_query($conexao, $sql);
    
    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Dependente criado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Dependente não foi criado';
    }

    header('Location: dependente.php');
    exit;
}


if (isset($_POST['update_dependente'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $sexo = mysqli_real_escape_string($conexao, trim($_POST['sexo']));
    $parentesco = mysqli_real_escape_string($conexao, trim($_POST['parentesco']));
    $func = mysqli_real_escape_string($conexao, trim($_POST['func'])); 

    $sql = "UPDATE dependente 
            SET Datanasc = '$data_nascimento', 
                Sexo = '$sexo', 
                Parentesco = '$parentesco'
            WHERE funcionario_Cpf = '$func'";  // Usar ID único para atualização

    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Dependente atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Dependente não foi atualizado. Verifique os dados e tente novamente.';
    }

    header('Location: dependente.php');
    exit;
}

if (isset($_POST['delete_dependente'])) {
    $func = mysqli_real_escape_string($conexao, $_POST['delete_dependente']);

    $sql = "DELETE FROM dependente WHERE funcionario_Cpf = '$func'";

    $result = mysqli_query($conexao, $sql);

    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Dependente deletado com sucesso';
    } else {
        $_SESSION['message'] = 'Dependente não foi deletado.';
    }

    header('Location: dependente.php');
    exit;
}

?>