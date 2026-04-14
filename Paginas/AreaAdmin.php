<?php
session_start();
require_once "Conexao.php";

// 1. Consulta para o Card: Agendamentos Pendentes
$sql_pendentes = "SELECT COUNT(*) as total 
                  FROM tblAgendamento 
                  INNER JOIN tblStatusAgendamento ON tblAgendamento.idStatusAgendamento = tblStatusAgendamento.id 
                  WHERE tblStatusAgendamento.statusAgendamento = 'Pendente'";
$res_pendentes = mysqli_query($conn, $sql_pendentes);
$row_pendentes = mysqli_fetch_assoc($res_pendentes);

// 2. Consulta para o Card: Receita do Mês (Somente ordens concluídas)
$sql_receita = "SELECT SUM(ts.Valor) as total 
                FROM tblOrdemServico os
                INNER JOIN tblTiposServicos ts ON os.idTipoServico = ts.id
                INNER JOIN tblStatusOrdemServico sos ON os.idStatusOrdemServico = sos.id
                WHERE sos.statusOrdemServico = 'Concluída'";
$res_receita = mysqli_query($conn, $sql_receita);
$row_receita = mysqli_fetch_assoc($res_receita);

// 3. Consulta para a Tabela: 5 últimas Ordens de Serviço
$sql_recentes = "SELECT p.nome, v.modelo, ts.TipoServico, ts.Valor, sos.statusOrdemServico
                 FROM tblOrdemServico os
                 INNER JOIN tblProprietario p ON os.idProprietario = p.id
                 INNER JOIN tblTiposServicos ts ON os.idTipoServico = ts.id
                 INNER JOIN tblStatusOrdemServico sos ON os.idStatusOrdemServico = sos.id
                 LEFT JOIN tblVeiculo v ON v.idProprietario = p.id
                 ORDER BY os.id DESC LIMIT 5";
$query_recentes = mysqli_query($conn, $sql_recentes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin | JP Auto Center</title>
    <link rel="stylesheet" href="../FrontEnd/Estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="admin-body">

    <?php include "Sidebar.php"; ?>

    <div class="main-content">
        <?php include "TopoAdm.php"; ?>

        <main class="dashboard-container">
            <header>
                <h2>Dashboard</h2>
                <p>Visão geral de JP Auto Center</p>
            </header>

            <div class="metrics-grid">
                <div class="card-metric">
                    <div class="text">
                        <span>Agendamentos Pendentes</span>
                        <h3><?php echo $row_pendentes['total']; ?></h3>
                    </div>
                    <i class="fa-solid fa-clock-rotate-left" style="color: #f59e0b;"></i>
                </div>

                <div class="card-metric">
                    <div class="text">
                        <span>Receita Concluída</span>
                        <h3>R$ <?php echo number_format($row_receita['total'] ?? 0, 2, ',', '.'); ?></h3>
                    </div>
                    <i class="fa-solid fa-sack-dollar" style="color: #10b981;"></i>
                </div>
            </div>

            <div class="table-section">
                <h3><i class="fa-solid fa-list-check"></i> Ordens de Serviço Recentes</h3>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Veículo</th>
                            <th>Serviço</th>
                            <th>Valor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($ordem = mysqli_fetch_assoc($query_recentes)): ?>
                        <tr>
                            <td><?php echo $ordem['nome']; ?></td>
                            <td><?php echo $ordem['modelo'] ?? 'N/A'; ?></td>
                            <td><?php echo $ordem['TipoServico']; ?></td>
                            <td>R$ <?php echo number_format($ordem['Valor'], 2, ',', '.'); ?></td>
                            <td>
                                <span class="badge <?php echo strtolower($ordem['statusOrdemServico']); ?>">
                                    <?php echo $ordem['statusOrdemServico']; ?>
                                </span>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>