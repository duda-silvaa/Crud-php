<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_departamento'])) {
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $cpf_gerente = mysqli_real_escape_string($conexao, trim($_POST['cpf_gerente']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $data = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $local = mysqli_real_escape_string($conexao, trim($_POST['local']));

    $sql =  "INSERT INTO departamento (Dnumero, Cpf_gerente, Dnome, Data_inicio_gerente, LocDepartamento)
     VALUES ('$numero', '$cpf_gerente', '$nome', '$data', '$local')";
    mysqli_query($conexao, $sql);
    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Departamento criado com sucesso';
        header('Location: departamento.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Departamento não foi criado';
        header('Location: departamento.php');
        exit;
    }
}

if (isset($_POST['update_departamento'])) {  // Alterado de update_funcionario para update_departamento
    // Recuperar e escapar dados
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $cpf_gerente = mysqli_real_escape_string($conexao, trim($_POST['cpf_gerente']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $data = mysqli_real_escape_string($conexao, trim($_POST['data']));
    $local = mysqli_real_escape_string($conexao, trim($_POST['local']));

    // Atualizar dados do departamento (sem atualizar o Cpf_gerente)
    $sql = "UPDATE departamento 
            SET Dnumero = '$numero', 
                Dnome = '$nome', 
                Data_inicio_gerente = '$data', 
                LocDepartamento = '$local'
            WHERE Cpf_gerente = '$cpf_gerente'";  // Mantemos o CPF como critério de busca

    // Executar consulta
    $result = mysqli_query($conexao, $sql);

    // Verificar se a atualização foi bem-sucedida
    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Departamento atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Departamento não foi atualizado. Verifique os dados e tente novamente.';
    }

    // Redirecionar para a página principal
    header('Location: departamento.php');
    exit;
}

if (isset($_POST['delete_departamento'])) {
    // Escapar e recuperar o CPF do funcionário
    $cpf_gerente = mysqli_real_escape_string($conexao, $_POST['delete_departamento']);

    // Preparar a consulta de exclusão
    $sql = "DELETE FROM departamento WHERE Cpf_gerente = '$cpf_gerente'";

    // Executar a consulta
    $result = mysqli_query($conexao, $sql);

    // Verificar se a exclusão foi bem-sucedida
    if ($result && mysqli_affected_rows($conexao) < 0) {
        $_SESSION['mensagem'] = 'Departamento não foi deletado. Verifique o CPF e tente novamente. ';
    } else {
        $_SESSION['mensagem'] = 'Departamento deletado com sucesso';
    }

    // Redirecionar para a página principal
    header('Location: departamento.php');
    exit;
}
?>
