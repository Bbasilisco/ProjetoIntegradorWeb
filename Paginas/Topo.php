<?php
$diretorioAtual = basename(dirname($_SERVER['PHP_SELF']));

$prefixo = ($diretorioAtual == 'Paginas') ? '../' : '';
?>

<link rel="stylesheet" href="<?php echo $prefixo; ?>FontEnd/Estilo.css">

<header class="index-topo">
    <div class="index-container topo-conteudo">
        <div class="logo-marca">
            <div class="logo-box">🔧</div>
            <span>JP Auto Center</span>
        </div>

        <nav class="menu-topo">
            <a href="<?php echo $prefixo; ?>Index.php" class="ativo">Início</a>
            
            <a href="<?php echo $prefixo; ?>Index.php#servicos">Serviços</a>
            
            <a href="<?php echo ($diretorioAtual == 'Paginas') ? '' : 'Paginas/'; ?>Agendar.php">Agendar</a>
            
            <a href="<?php echo ($diretorioAtual == 'Paginas') ? '' : 'Paginas/'; ?>AreaAdmin.php" class="btn-admin">Área Admin</a>
        </nav>
    </div>
</header>