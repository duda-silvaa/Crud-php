<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #1a1a1a; /* Fundo preto */
            color: #fff; /* Texto branco */
        }
       
        .card-header {
            background-color: #ff8c42; /* Laranja suave para o cabeçalho do card */
            color: #fff; /* Texto branco */
        }
        .card-header h4 {
            margin: 0;
        }
        .btn-primary {
            background-color: black; /* Botão laranja */
            border-color: #ff8c42;
        }
        .btn-primary:hover {
            background-color: #e6762d; /* Tom mais escuro ao passar o mouse */
            border-color: #e6762d;
        }
        .btn-secondary {
            background-color: #555; /* Fundo cinza para o botão secundário */
            border-color: #555;
        }
        .btn-secondary:hover {
            background-color: #444; /* Tom mais escuro ao passar o mouse */
            border-color: #444;
        }
        .btn-success {
            background-color: #28a745; /* Verde para o botão de editar */
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838; /* Tom mais escuro ao passar o mouse */
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545; /* Vermelho para o botão de excluir */
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Tom mais escuro ao passar o mouse */
            border-color: #bd2130;
        }
        .table thead th {
            background-color: #ff8c42; /* Laranja suave para o cabeçalho da tabela */
            color: #fff; /* Texto branco */
        }
      
    </style>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4> Lista de Departamentos
                <a href="departamento-create.php" class="btn btn-primary float-end">Adicionar Departamento</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Número do Departamento</th>
                    <th>CPF - Gerente</th>
                    <th>Nome</th>
                    <th>Data Início</th>
                    <th>Local</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM departamento';
                  $departamentos = mysqli_query($conexao, $sql);
                  if ($departamentos && mysqli_num_rows($departamentos) > 0) {
                    while ($departamento = mysqli_fetch_assoc($departamentos)) {
                  ?>
                  <tr>
                    <td><?= $departamento['Dnumero'] ?></td>
                    <td><?= $departamento['Cpf_gerente'] ?></td>
                    <td><?= $departamento['Dnome'] ?></td>
                    <td><?= date('d/m/Y', strtotime($departamento['Data_inicio_gerente'])) ?></td>
                    <td><?= $departamento['LocDepartamento'] ?></td>
                    <td>
                      <a href="departamento-view.php?cpf_gerente=<?= $departamento['Cpf_gerente'] ?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                      <a href="departamento-edit.php?cpf_gerente=<?= $departamento['Cpf_gerente'] ?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="acoes_departamento.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_departamento" value="<?= $departamento['Cpf_gerente'] ?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                    }
                  } else {
                    echo '<tr><td colspan="6" class="text-center">Nenhum departamento encontrado</td></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
