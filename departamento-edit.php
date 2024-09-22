<?php 
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Funcionário - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #000;
        color: #fff;
      }
     
      .card-header {
        background-color: #ff6600;
        border-bottom: none;
      }
      .card-header h4 {
        color: #fff;
      }
      .btn-primary {
        background-color: #ff6600;
        border-color: #ff6600;
      }
      .btn-danger {
        background-color: black;
        border-color: #ff3300;
      }
      .form-control {
        background-color: #333;
        color: #fff;
        border: 1px solid #ff6600;
      }
      .form-control:focus {
        background-color: #444;
        border-color: #ff3300;
        color: #fff;
      }
      .btn-primary:hover, .btn-danger:hover {
        background-color: #cc5200;
        border-color: #cc5200;
      }
      .container {
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar Funcionário
                <a href="departamento.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['cpf_gerente'])) {
                $cpf_gerente = mysqli_real_escape_string($conexao, $_GET['cpf_gerente']);
                $sql = "SELECT * FROM departamento WHERE Cpf_gerente='$cpf_gerente'";
                $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $departamento = mysqli_fetch_array($query);
              ?>
              <form action="acoes_departamento.php" method="POST">
                <input type="hidden" name="cpf_gerente" value="<?=$departamento['Cpf_gerente']?>">
                <div class="mb-3">
                  <label>Número do Departamento</label>
                  <input type="number" name="numero" value="<?=$departamento['Dnumero']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?=$departamento['Dnome']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Data Início</label>
                  <input type="date" name="data" value="<?=$departamento['Data_inicio_gerente']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Local</label>
                  <input type="text" name="local" value="<?=$departamento['LocDepartamento']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_departamento" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <?php
              } else {
                echo "<h5>departamento não encontrado</h5>";
              }
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
