<?php
// Identifica se o arquivo que executou este código está na raiz ou na pasta Paginas
$diretorioAtual = basename(dirname($_SERVER['PHP_SELF']));

// Se estiver em 'Paginas', o prefixo para voltar à raiz é '../'
// Caso contrário (na raiz), o prefixo é vazio ''
$prefixo = ($diretorioAtual == 'Paginas') ? '../' : '';
?>

<link rel="stylesheet" href="<?php echo $prefixo; ?>FrontEnd/Estilo.css">

<header class="index-topo topo-admin">
    <div class="index-container topo-conteudo">
        <div class="logo-marca">
            <div class="logo-box">🔧</div>
            <span>JP Auto Center</span>
        </div>
    </div>
</header>