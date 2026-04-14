
<?php
// Define a página atual para marcar o item como "Ativo" (vermelho)
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<aside class="sidebar">
    <div class="sidebar-logo">
        <img src="caminho/para/seu/logo-automaster.png" alt="AutoMaster">
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li class="<?= ($pagina_atual == 'AreaAdmin.php') ? 'active' : '' ?>">
                <a href="AreaAdmin.php">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </li>
            <li class="<?= ($pagina_atual == 'Clientes.php') ? 'active' : '' ?>">
                <a href="Clientes.php">
                    <i class="fas fa-users"></i> Clientes
                </a>
            </li>
            <li class="<?= ($pagina_atual == 'AgendarAdm.php') ? 'active' : '' ?>">
                <a href="AgendarAdm.php">
                    <i class="fas fa-calendar-alt"></i> Agendamentos
                </a>
            </li>
            <li class="<?= ($pagina_atual == 'OrdemServico.php') ? 'active' : '' ?>">
                <a href="OrdemServico.php">
                    <i class="fas fa-file-invoice"></i> Ordens de Serviço
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