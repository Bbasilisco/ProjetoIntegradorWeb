<?php
session_start();

if ($_POST) {
    if ($_POST['usuario'] === "admin" && $_POST['senha'] === "1234") {
        $_SESSION['logado'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $erro = "Login inválido";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login AutoMaster</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <h2>Oficina Pro</h2>
        <?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button>Entrar</button>
        </form>
    </div>
</div>
</body>
</html>







