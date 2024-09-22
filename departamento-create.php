<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>departamento - Criar</title>
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
      .btn-primary {
        background-color: #ff6600;
        border-color: #ff6600;
      }
      .btn-primary:hover {
        background-color: #cc5200;
        border-color: #cc5200;
      }
      .btn-danger:hover {
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
              <h4>Adicionar departamento
                <a href="departamento.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
            <form action="acoes_departamento.php" method="POST">
                <div class="mb-3">
                  <label>Número do Departamento</label>
                  <input type="number" name="numero" class="form-control">
                </div>
                <div class="mb-3">
                  <label>CPF - Gerente</label>
                  <input type="number" name="cpf_gerente" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Data Início</label>
                  <input type="date" name="data" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Local</label>
                  <input type="text" name="local" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="create_departamento" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>