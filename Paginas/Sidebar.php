
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
            <li class="<?= ($pagina_atual == 'index.php') ? 'active' : '' ?>">
                <a href="index.php">
                    <i class="fas fa-th-large"></i> Visão Geral
                </a>
            </li>
            <li class="<?= ($pagina_atual == 'clientes.php') ? 'active' : '' ?>">
                <a href="clientes.php">
                    <i class="fas fa-users"></i> Clientes
                </a>
            </li>
            <li class="<?= ($pagina_atual == 'agendamentos.php') ? 'active' : '' ?>">
                <a href="agendamentos.php">
                    <i class="fas fa-calendar-alt"></i> Agendamentos
                </a>
            </li>
            <li class="<?= ($pagina_atual == 'ordens.php') ? 'active' : '' ?>">
                <a href="ordens.php">
                    <i class="fas fa-file-invoice"></i> Ordens de Serviço
                </a>
            </li>
            <li>
                <a href="../Index.php" class="link-voltar">
                    <i class="fas fa-sign-out-alt"></i> Voltar para o site
                </a>
            </li>   
        </ul>
    </nav>
</aside>