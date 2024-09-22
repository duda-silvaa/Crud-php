<?php 
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dependente - Editar</title>
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
              <h4>Editar Dependente
                <a href="dependente.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
                if (isset($_GET['func'])) {  // Alterar 'nome' para 'cpf' ou outro campo único
                  $func = mysqli_real_escape_string($conexao, $_GET['func']);
                  $sql = "SELECT * FROM dependente WHERE funcionario_Cpf = '$func'";  // Usar CPF como identificador
                  $query = mysqli_query($conexao, $sql);
                  
                  if (mysqli_num_rows($query) > 0) {
                      $dependente = mysqli_fetch_array($query);
              ?>
              <form action="acoes_dependente.php" method="POST">
                <input type="hidden" name="func" value="<?=$dependente['funcionario_Cpf']?>">
                <div class="mb-3">
                  <label>Sexo</label>
                  <input type="text" name="sexo" value="<?=$dependente['Sexo']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Data de Nascimento</label>
                  <input type="date" name="data_nascimento" value="<?=$dependente['Datanasc']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Parentesco</label>
                  <input type="text" name="parentesco" value="<?=$dependente['Parentesco']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_dependente" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <?php
              } else {
                echo "<h5>dependente não encontrado</h5>";
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
