<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a; /* Preto para o fundo */
            color: #fff; /* Texto branco */
        }
        h1 {
            color: #ff8c42; /* Laranja suave para o título */
            text-align: center;
            margin-bottom: 20px;
        }
        .list-group-item {
            background-color: #333; /* Preto para os itens */
            border: none;
            padding: 15px;
        }
        .list-group-item a {
            color: #ff8c42; /* Laranja suave para os links */
            text-decoration: none;
            font-weight: bold;
        }
        .list-group-item:hover {
            background-color: black; /* Laranja suave ao passar o mouse */
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        p {
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Sistema de Gerenciamento</h1>
        <p>Selecione uma tabela para gerenciar:</p>
        <ul class="list-group">
            <li class="list-group-item"><a href="login.php?redirect=funcionario">Tabela Funcionários</a></li>
            <li class="list-group-item"><a href="departamento.php">Tabela Departamentos</a></li>
            <li class="list-group-item"><a href="projetos.php">Tabela Projetos</a></li>
            <li class="list-group-item"><a href="dependente.php">Tabela de Dependentes</a></li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
