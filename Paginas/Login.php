<?php
session_start();

$email_demo = "admin@oficina.com";
$senha_demo = "admin123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['email'] === $email_demo && $_POST['senha'] === $senha_demo) {
        $_SESSION['logado'] = true;
        header("Location: AgendarAdm.php");
        exit();
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login JP Auto Center</title>
    <link rel="stylesheet" href="../FrontEnd/Estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="login-page">
    <div class="login-wrapper">
        <header class="login-header">
            <div class="logo-box">
                <i class="fa-solid fa-wrench" style="color: white;"></i>
            </div>
            <h1>JP Auto Center</h1>
            <p>Sistema de Gestão de Oficina</p>
        </header>

        <main class="login-card">
            <h3>Área Administrativa</h3>
            
            <?php if(isset($erro)): ?>
                <div class="erro-mensagem"><?php echo $erro; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <div class="input-icon">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="admin@oficina.com" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <div class="input-icon">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="senha" id="senha" placeholder="********" required>
                    </div>
                </div>

                <button type="submit" class="btn-entrar">Entrar</button>
            </form>

            <div class="demo-info">
                <strong>Credenciais de Demonstração:</strong>
                <p>E-mail: <span>admin@oficina.com</span></p>
                <p>Senha: <span>admin123</span></p>
            </div>
        </main>
        
        <a href="../Index.php" class="link-voltar">Voltar para o site</a>
    </div>
</body>
</html>