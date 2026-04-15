<?php
session_start();
require_once "Conexao.php";

function mapStatus($statusId){
    if ($statusId == 2) return 'Confirmado';
    if ($statusId == 3) return 'Concluído';
    if ($statusId == 4) return 'Cancelado';
    return 'Pendente';
}

function badge($status){
    if ($status === 'Confirmado') return '<span class="badge badge-confirmado">Confirmado</span>';
    if ($status === 'Concluído') return '<span class="badge badge-concluido">Concluído</span>';
    if ($status === 'Cancelado') return '<span class="badge badge-cancelado">Cancelado</span>';
    return '<span class="badge badge-pendente">Pendente</span>';
}

$agendamentos = [];

$sql = "SELECT 
            a.id,
            a.DATA,
            a.agendamento,
            a.idStatusAgendamento,
            a.idProprietario,
            p.nome AS cliente
        FROM tblAgendamento a
        INNER JOIN tblProprietario p ON a.idProprietario = p.id
        ORDER BY a.id DESC";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $textoAgendamento = $row['agendamento'];
    $servico = $textoAgendamento;
    $veiculo = '';

    if (strpos($textoAgendamento, ' - ') !== false) {
        $partes = explode(' - ', $textoAgendamento, 2);
        $servico = $partes[0];
        $veiculo = $partes[1];
    }

    $agendamentos[] = [
        'id' => $row['id'],
        'cliente' => $row['cliente'],
        'telefone' => '',
        'veiculo' => $veiculo,
        'servico' => $servico,
        'data' => $row['DATA'],
        'hora' => '',
        'status' => mapStatus($row['idStatusAgendamento']),
        'observacoes' => ''
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos Admin | JP Auto Center</title>
    <link rel="stylesheet" href="../FrontEnd/Estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="admin-body">

    <?php include "Sidebar.php"; ?>

    <div class="main-content">
        <?php include "TopoAdm.php"; ?>

        <main class="dashboard-container">
            <div class="agendamento-page">
                <div class="agendamento-topbar">
                    <div class="agendamento-title-wrap">
                        <h1>Agendamentos</h1>
                        <p>Gerencie os agendamentos</p>
                    </div>

                    <button class="agendamento-btn-new" type="button" id="openCreateModal">+ Novo</button>
                </div>

                <div class="agendamento-panel">
                    <div class="agendamento-toolbar">
                        <div class="agendamento-search-box">
                            <input type="text" id="searchInput" placeholder="Buscar...">
                        </div>

                        <div class="agendamento-search-box">
                            <select id="statusFilter">
                                <option value="Todos">Todos</option>
                                <option value="Pendente">Pendente</option>
                                <option value="Confirmado">Confirmado</option>
                                <option value="Concluído">Concluído</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="agendamento-table-wrap">
                        <table class="agendamento-table">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Veículo</th>
                                    <th>Serviço</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th style="text-align:right;">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="agendamentosTableBody">
                                <?php foreach ($agendamentos as $a): ?>
                                    <tr class="agendamento-row"
                                        data-id="<?= $a['id'] ?>"
                                        data-cliente="<?= htmlspecialchars($a['cliente']) ?>"
                                        data-telefone="<?= htmlspecialchars($a['telefone']) ?>"
                                        data-veiculo="<?= htmlspecialchars($a['veiculo']) ?>"
                                        data-servico="<?= htmlspecialchars($a['servico']) ?>"
                                        data-data="<?= htmlspecialchars($a['data']) ?>"
                                        data-hora="<?= htmlspecialchars($a['hora']) ?>"
                                        data-status="<?= htmlspecialchars($a['status']) ?>"
                                        data-observacoes="<?= htmlspecialchars($a['observacoes']) ?>"
                                    >
                                        <td>
                                            <strong><?= htmlspecialchars($a['cliente']) ?></strong>
                                        </td>
                                        <td><?= htmlspecialchars($a['veiculo']) ?></td>
                                        <td><?= htmlspecialchars($a['servico']) ?></td>
                                        <td><?= htmlspecialchars($a['data']) ?></td>
                                        <td class="status-cell"><?= badge($a['status']) ?></td>
                                        <td>
                                            <div class="agendamento-actions">
                                                <button class="agendamento-icon-btn agendamento-icon-success btn-confirm" type="button" title="Confirmar">✔</button>
                                                <button class="agendamento-icon-btn agendamento-icon-danger btn-cancel" type="button" title="Cancelar">✖</button>
                                                <button class="agendamento-icon-btn agendamento-icon-dark btn-edit" type="button" title="Editar">✎</button>
                                                <button class="agendamento-icon-btn agendamento-icon-danger btn-delete" type="button" title="Excluir">🗑</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div id="emptyState" style="display:none; margin-top: 15px;">
                        Nenhum resultado
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="agendamento-modal-overlay" id="editModalOverlay">
        <div class="agendamento-modal">
            <h2>Editar</h2>
            <form id="editForm">
                <input type="hidden" id="edit_id" name="id">

                <div class="agendamento-form-grid">
                    <div class="agendamento-field">
                        <label for="edit_cliente">Cliente</label>
                        <input id="edit_cliente" name="cliente" placeholder="Cliente">
                    </div>

                    <div class="agendamento-field">
                        <label for="edit_telefone">Telefone</label>
                        <input id="edit_telefone" name="telefone" placeholder="Telefone">
                    </div>

                    <div class="agendamento-field agendamento-field-full">
                        <label for="edit_veiculo">Veículo</label>
                        <input id="edit_veiculo" name="veiculo" placeholder="Veículo">
                    </div>

                    <div class="agendamento-field agendamento-field-full">
                        <label for="edit_servico">Serviço</label>
                        <input id="edit_servico" name="servico" placeholder="Serviço">
                    </div>

                    <div class="agendamento-field">
                        <label for="edit_data">Data</label>
                        <input id="edit_data" name="data" placeholder="Data">
                    </div>

                    <div class="agendamento-field">
                        <label for="edit_hora">Hora</label>
                        <input id="edit_hora" name="hora" placeholder="Hora">
                    </div>

                    <div class="agendamento-field agendamento-field-full">
                        <label for="edit_observacoes">Observações</label>
                        <textarea id="edit_observacoes" name="observacoes" placeholder="Observações"></textarea>
                    </div>
                </div>

                <div class="agendamento-modal-actions">
                    <button class="agendamento-btn-primary" type="submit">Salvar</button>
                    <button class="agendamento-btn-secondary" type="button" id="closeEditModal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="agendamento-modal-overlay" id="createModalOverlay">
        <div class="agendamento-modal">
            <h2>Novo</h2>
            <form id="createForm">
                <div class="agendamento-form-grid">
                    <div class="agendamento-field">
                        <label for="new_cliente">Cliente</label>
                        <input id="new_cliente" name="cliente" placeholder="Cliente">
                    </div>

                    <div class="agendamento-field">
                        <label for="new_telefone">Telefone</label>
                        <input id="new_telefone" name="telefone" placeholder="Telefone">
                    </div>

                    <div class="agendamento-field agendamento-field-full">
                        <label for="new_veiculo">Veículo</label>
                        <input id="new_veiculo" name="veiculo" placeholder="Veículo">
                    </div>

                    <div class="agendamento-field agendamento-field-full">
                        <label for="new_servico">Serviço</label>
                        <input id="new_servico" name="servico" placeholder="Serviço">
                    </div>

                    <div class="agendamento-field">
                        <label for="new_data">Data</label>
                        <input id="new_data" name="data" placeholder="Data">
                    </div>

                    <div class="agendamento-field">
                        <label for="new_hora">Hora</label>
                        <input id="new_hora" name="hora" placeholder="Hora">
                    </div>

                    <div class="agendamento-field agendamento-field-full">
                        <label for="new_observacoes">Observações</label>
                        <textarea id="new_observacoes" name="observacoes" placeholder="Observações"></textarea>
                    </div>
                </div>

                <div class="agendamento-modal-actions">
                    <button class="agendamento-btn-primary" type="submit">Criar</button>
                    <button class="agendamento-btn-secondary" type="button" id="closeCreateModal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../agendamentos.js"></script>
</body>
</html>