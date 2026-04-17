<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<aside class="adm-sidebar">

    <nav class="adm-sidebar-nav">
        <ul>

            <li class="<?= ($pagina_atual == 'AgendarAdm.php') ? 'adm-active' : '' ?>">
                <a href="AgendarAdm.php">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="<?= ($pagina_atual == 'Clientes.php') ? 'adm-active' : '' ?>">
                <a href="Clientes.php">
                    <i class="fas fa-users"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="<?= ($pagina_atual == 'AgendarAdm.php.php') ? 'adm-active' : '' ?>">
                <a href="AgendarAdm.php.php">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Agendamentos</span>
                </a>
            </li>

            <li class="<?= ($pagina_atual == 'OrdemServico.php') ? 'adm-active' : '' ?>">
                <a href="OrdemServico.php">
                    <i class="fas fa-file-invoice"></i>
                    <span>Ordens de Serviço</span>
                </a>
            </li>

            <li>
                <a href="Logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Voltar para o site</span>
                </a>
            </li>

        </ul>
    </nav>

</aside>