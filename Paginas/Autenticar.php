<?php
session_start();

// Usuário fixo (exemplo simples)
$usuario_correto = "admin";
$senha_correta = "1234";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if($usuario === $usuario_correto && $senha === $senha_correta){
    $_SESSION['usuario'] = $usuario;
<<<<<<< HEAD
    header("Location: Dashboard.php");
} else {
    header("Location: Index.php?erro=1");
}








=======
    header("Location: dashboard.php");
} else {
    header("Location: index.php?erro=1");
}
>>>>>>> 166165530edd7c388e5f5dc2933e610cbd398ee0
