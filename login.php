<?php
session_start();
require 'conexao.php';

if (isset($_POST['login'])) {
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
    
    $sql = "SELECT * FROM login WHERE usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        $login = mysqli_fetch_array($result);
        
        // Criptografar a senha fornecida pelo usuário com SHA256
        $senha_criptografada = hash('sha256', $senha);
        
        // Comparar a senha criptografada com a armazenada no banco de dados
        if ($senha_criptografada === $login['senha']) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_usuario'] = $login['usuario'];

            // Definir o valor de $redirect a partir do parâmetro GET
            $redirect = isset($_GET['redirect']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['redirect']) : 'index';
            
            // Redirecionar para a página da tabela correspondente
            header("Location: {$redirect}.php");
            exit;
        } else {
            $_SESSION['login_message'] = 'Senha incorreta';
        }
    } else {
        $_SESSION['login_message'] = 'Usuário não encontrado';
    }
}

if (isset($_SESSION['login_message'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['login_message'] . '</div>';
    unset($_SESSION['login_message']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a; /* Fundo preto */
            color: #fff; /* Texto branco */
        }
        .card {
            background-color: #333; /* Fundo preto para o card */
            border: none;
        }
        .card-header h4 {
            color: #ff8c42; /* Laranja suave para o título */
            text-align: center;
        }
        label {
            color: #ff8c42; /* Laranja suave para os labels */
        }
        .form-control {
            background-color: #1a1a1a; /* Fundo preto para os campos de input */
            color: #fff; /* Texto branco */
            border: 1px solid #ff8c42; /* Borda laranja suave */
        }
        .form-control:focus {
            background-color: #1a1a1a;
            color: #fff;
            border-color: #ff8c42;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #ff8c42; /* Botão laranja */
            border-color: #ff8c42;
        }
        .btn-primary:hover {
            background-color: #e6762d; /* Tom mais escuro ao passar o mouse */
            border-color: #e6762d;
        }
        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="login.php?redirect=<?php echo isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : ''; ?>" method="POST">
                            <div class="mb-3">
                                <label>Usuário</label>
                                <input type="text" name="usuario" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
