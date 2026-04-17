<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<aside class="admin-sidebar">
    <div class="admin-sidebar-logo">
        <img src="caminho/para/seu/logo-automaster.png" alt="AutoMaster">
    </div>

    <nav class="admin-sidebar-nav">
        <ul>
            <li class="<?= ($pagina_atual == 'AgendarAdm.php') ? 'active' : '' ?>">
                <a href="AgendarAdm.php">
                    <i class="fas fa-calendar-alt"></i> Agendamentos
                </a>
            </li>
            <li>
                <a href="Logout.php" class="link-voltar">
                    <i class="fas fa-sign-out-alt"></i> Voltar para o site
                </a>
            </li>
        </ul>
    </nav>
</aside>