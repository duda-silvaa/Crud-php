<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_projetos'])) {
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $local = mysqli_real_escape_string($conexao, trim($_POST['local']));

    $sql =  "INSERT INTO projeto (Projnumero, Projnome, Projlocal)
     VALUES ('$numero', '$nome','$local')";
    mysqli_query($conexao, $sql);
    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Projeto criado com sucesso. ';
        header('Location: projetos.php');
        exit;
    } else {
        $_SESSION['mensagem'] = ' Projeto não foi criado.';
        header('Location: projetos.php');
        exit;
    }
}

if (isset($_POST['update_projetos'])) {  // Alterado de update_funcionario para update_departamento
    // Recuperar e escapar dados
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $local = mysqli_real_escape_string($conexao, trim($_POST['local']));
    // Atualizar dados do departamento (sem atualizar o Cpf_gerente)
    $sql = "UPDATE projeto 
            SET  Projnome = '$nome', 
                Projlocal = '$local'
            WHERE Projnumero = '$numero'";  // Mantemos o CPF como critério de busca

    // Executar consulta
    $result = mysqli_query($conexao, $sql);

    // Verificar se a atualização foi bem-sucedida
    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Projeto atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Projeto não foi atualizado. Verifique os dados e tente novamente.';
    }

    // Redirecionar para a página principal
    header('Location: projetos.php');
    exit;
}

if (isset($_POST['delete_projetos'])) {
    // Escapar e recuperar o CPF do funcionário
    $projnumero = mysqli_real_escape_string($conexao, $_POST['delete_projetos']);

    // Preparar a consulta de exclusão
    $sql = "DELETE FROM projeto WHERE Projnumero = '$projnumero'";

    // Executar a consulta
    $result = mysqli_query($conexao, $sql);

    // Verificar se a exclusão foi bem-sucedida
    if ($result && mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Projeto deletado com sucesso. ';
    } else {
        $_SESSION['mensagem'] = 'Projeto não foi deletado.  ';
    }

    // Redirecionar para a página principal
    header('Location: projetos.php');
    exit;
}
?>
