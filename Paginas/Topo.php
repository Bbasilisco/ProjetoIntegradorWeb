<?php
$diretorioAtual = basename(dirname($_SERVER['PHP_SELF']));
$prefixo = ($diretorioAtual == 'Paginas') ? '../' : '';
?>

<link rel="stylesheet" href="<?php echo $prefixo; ?>FontEnd/Estilo.css">

<header class="adm-topas">
    <div class="topo-conteudo">
        <div class="logo-marca">
            <div class="logo-box">🔧</div>
            <span>JP Auto Center</span>
        </div>
    </div>
</header>