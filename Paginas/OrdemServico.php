<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ordem de Serviço | JP Auto Center</title>
    <link rel="stylesheet" href="../FrontEnd/Estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="admin-body">

    <?php 
        include "Sidebar.php"; 
        // Inclui a lógica de consulta antes de renderizar o conteúdo
        include "ConsultarOrdemServico.php"; 
    ?>

    <div class="main-content">
        <?php include "TopoAdm.php"; ?>

        <section class="container-servicos">
            <div class="header-pagina">
                <h1>Ordens de Serviço</h1>
                <p>Gerencie as ordens de serviço</p>
                <button class="btn-nova-ordem"><i class="fas fa-plus"></i> Nova Ordem</button>
            </div>

            <div class="tabela-container">
                <table class="tabela-os">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Veículo</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ListaOrdensServico as $Ordem): ?>
                        <tr>
                            <td>
                                <strong><?php echo $Ordem['NomeCliente']; ?></strong><br>
                                <span class="subtexto">OS #<?php echo $Ordem['IdOrdem']; ?></span>
                            </td>
                            <td>
                                <?php echo $Ordem['Marca'] . " " . $Ordem['ModeloVeiculo']; ?><br>
                                <span class="subtexto">Ano: <?php echo date('Y', strtotime($Ordem['AnoVeiculo'])); ?></span>
                            </td>
                            <td>
                                <strong>R$ <?php echo number_format($Ordem['ValorTotal'], 2, ',', '.'); ?></strong>
                            </td>
                            <td>
                                <span class="badge-status">
                                    <?php echo $Ordem['StatusDescricao']; ?>
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </td>
                            <td class="acoes">
                                <i class="fas fa-eye"></i>
                                <i class="fas fa-trash text-red"></i>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    
</body>
</html>