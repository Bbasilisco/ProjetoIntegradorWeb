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

<link rel="stylesheet" href="style.css">

<div class="login-container">
    <div class="login-box">
        <h2>Oficina Pro</h2>

        <?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>

        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <button>Entrar</button>
        </form>
    </div>
</div>