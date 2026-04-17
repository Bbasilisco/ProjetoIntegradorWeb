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

    $dataCompleta = trim((string)$row['DATA']);
    $data = '';
    $hora = '';

    if ($dataCompleta !== '') {
        $timestamp = strtotime($dataCompleta);
        if ($timestamp !== false) {
            $data = date('Y-m-d', $timestamp);
            $hora = date('H:i', $timestamp);
        }
    }

    $agendamentos[] = [
        'id' => $row['id'],
        'idProprietario' => $row['idProprietario'],
        'cliente' => $row['cliente'],
        'telefone' => '',
        'veiculo' => $veiculo,
        'servico' => $servico,
        'data' => $data,
        'hora' => $hora,
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
                                        data-id="<?= (int)$a['id'] ?>"
                                        data-idproprietario="<?= (int)$a['idProprietario'] ?>"
                                        data-cliente="<?= htmlspecialchars($a['cliente']) ?>"
                                        data-telefone="<?= htmlspecialchars($a['telefone']) ?>"
                                        data-veiculo="<?= htmlspecialchars($a['veiculo']) ?>"
                                        data-servico="<?= htmlspecialchars($a['servico']) ?>"
                                        data-data="<?= htmlspecialchars($a['data']) ?>"
                                        data-hora="<?= htmlspecialchars($a['hora']) ?>"
                                        data-status="<?= htmlspecialchars($a['status']) ?>"
                                        data-observacoes="<?= htmlspecialchars($a['observacoes']) ?>"
                                    >
                                        <td><strong><?= htmlspecialchars($a['cliente']) ?></strong></td>
                                        <td><?= htmlspecialchars($a['veiculo']) ?></td>
                                        <td><?= htmlspecialchars($a['servico']) ?></td>
                                        <td><?= htmlspecialchars($a['data']) ?> <?= htmlspecialchars($a['hora']) ?></td>
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
                <input type="hidden" id="edit_acao" name="acao" value="editar">
                <input type="hidden" id="edit_id" name="id">
                <input type="hidden" id="edit_idProprietario" name="idProprietario">

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
                        <input type="date" id="edit_data" name="data">
                    </div>

                    <div class="agendamento-field">
                        <label for="edit_hora">Hora</label>
                        <input type="time" id="edit_hora" name="hora">
                    </div>

                    <div class="agendamento-field">
                        <label for="edit_status">Status</label>
                        <select id="edit_status" name="status">
                            <option value="Pendente">Pendente</option>
                            <option value="Confirmado">Confirmado</option>
                            <option value="Concluído">Concluído</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
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
                <input type="hidden" id="new_acao" name="acao" value="criar">
                <input type="hidden" id="new_idProprietario" name="idProprietario" value="0">
                <input type="hidden" id="new_status" name="status" value="Pendente">

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
                        <select id="new_servico" name="servico">
                            <option value="">Selecione o serviço</option>
                            <option value="Revisão Completa">Revisão Completa</option>
                            <option value="Troca de Óleo">Troca de Óleo</option>
                            <option value="Alinhamento e Balanceamento">Alinhamento e Balanceamento</option>
                            <option value="Freios">Freios</option>
                            <option value="Suspensão">Suspensão</option>
                            <option value="Ar Condicionado">Ar Condicionado</option>
                            <option value="Injeção Eletrônica">Injeção Eletrônica</option>
                            <option value="Sistema Elétrico">Sistema Elétrico</option>
                            <option value="Diagnóstico Computadorizado">Diagnóstico Computadorizado</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>

                    <div class="agendamento-field">
                        <label for="new_data">Data</label>
                        <input type="date" id="new_data" name="data">
                    </div>

                    <div class="agendamento-field">
                        <label for="new_hora">Hora</label>
                        <select id="new_hora" name="hora">
                            <option value="">Selecione o horário</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                        </select>
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

    <script>
        const createModalOverlay = document.getElementById('createModalOverlay');
        const editModalOverlay = document.getElementById('editModalOverlay');
        const openCreateModalBtn = document.getElementById('openCreateModal');
        const closeCreateModalBtn = document.getElementById('closeCreateModal');
        const closeEditModalBtn = document.getElementById('closeEditModal');
        const createForm = document.getElementById('createForm');
        const editForm = document.getElementById('editForm');
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const emptyState = document.getElementById('emptyState');

        function abrirCreateModal() {
            createModalOverlay.classList.add('show');
        }

        function fecharCreateModal() {
            createModalOverlay.classList.remove('show');
            createForm.reset();
            document.getElementById('new_acao').value = 'criar';
            document.getElementById('new_status').value = 'Pendente';
            document.getElementById('new_idProprietario').value = '0';
        }

        function abrirEditModal() {
            editModalOverlay.classList.add('show');
        }

        function fecharEditModal() {
            editModalOverlay.classList.remove('show');
            editForm.reset();
        }

        async function enviarFormulario(formData) {
            const response = await fetch('SvAgendamento.php', {
                method: 'POST',
                body: formData
            });

            const texto = await response.text();

            try {
                return JSON.parse(texto);
            } catch (e) {
                console.error('Resposta inválida:', texto);
                return {
                    sucesso: false,
                    mensagem: 'Resposta inválida do servidor.'
                };
            }
        }

        function filtrarTabela() {
            const termo = searchInput.value.toLowerCase().trim();
            const statusSelecionado = statusFilter.value;
            const linhas = document.querySelectorAll('.agendamento-row');
            let visiveis = 0;

            linhas.forEach(linha => {
                const cliente = (linha.dataset.cliente || '').toLowerCase();
                const veiculo = (linha.dataset.veiculo || '').toLowerCase();
                const servico = (linha.dataset.servico || '').toLowerCase();
                const data = (linha.dataset.data || '').toLowerCase();
                const status = linha.dataset.status || '';

                const combinaBusca =
                    cliente.includes(termo) ||
                    veiculo.includes(termo) ||
                    servico.includes(termo) ||
                    data.includes(termo);

                const combinaStatus =
                    statusSelecionado === 'Todos' || status === statusSelecionado;

                if (combinaBusca && combinaStatus) {
                    linha.style.display = '';
                    visiveis++;
                } else {
                    linha.style.display = 'none';
                }
            });

            emptyState.style.display = visiveis === 0 ? 'block' : 'none';
        }

        openCreateModalBtn.addEventListener('click', () => {
            abrirCreateModal();
        });

        closeCreateModalBtn.addEventListener('click', fecharCreateModal);
        closeEditModalBtn.addEventListener('click', fecharEditModal);

        createModalOverlay.addEventListener('click', (e) => {
            if (e.target === createModalOverlay) {
                fecharCreateModal();
            }
        });

        editModalOverlay.addEventListener('click', (e) => {
            if (e.target === editModalOverlay) {
                fecharEditModal();
            }
        });

        searchInput.addEventListener('input', filtrarTabela);
        statusFilter.addEventListener('change', filtrarTabela);

        createForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(createForm);
            const resultado = await enviarFormulario(formData);

            if (resultado.sucesso) {
                alert(resultado.mensagem);
                window.location.reload();
            } else {
                alert(resultado.mensagem);
            }
        });

        document.querySelectorAll('.btn-edit').forEach(botao => {
            botao.addEventListener('click', function() {
                const linha = this.closest('.agendamento-row');

                document.getElementById('edit_id').value = linha.dataset.id || '';
                document.getElementById('edit_idProprietario').value = linha.dataset.idproprietario || '';
                document.getElementById('edit_cliente').value = linha.dataset.cliente || '';
                document.getElementById('edit_telefone').value = linha.dataset.telefone || '';
                document.getElementById('edit_veiculo').value = linha.dataset.veiculo || '';
                document.getElementById('edit_servico').value = linha.dataset.servico || '';
                document.getElementById('edit_data').value = linha.dataset.data || '';
                document.getElementById('edit_hora').value = linha.dataset.hora || '';
                document.getElementById('edit_status').value = linha.dataset.status || 'Pendente';
                document.getElementById('edit_observacoes').value = linha.dataset.observacoes || '';

                abrirEditModal();
            });
        });

        editForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(editForm);
            const resultado = await enviarFormulario(formData);

            if (resultado.sucesso) {
                alert(resultado.mensagem);
                window.location.reload();
            } else {
                alert(resultado.mensagem);
            }
        });

        document.querySelectorAll('.btn-delete').forEach(botao => {
            botao.addEventListener('click', async function() {
                const linha = this.closest('.agendamento-row');
                const id = linha.dataset.id || '';

                if (!id) {
                    alert('ID do agendamento inválido.');
                    return;
                }

                if (!confirm('Deseja realmente excluir este agendamento?')) {
                    return;
                }

                const formData = new FormData();
                formData.append('acao', 'excluir');
                formData.append('id', id);

                const resultado = await enviarFormulario(formData);

                if (resultado.sucesso) {
                    alert(resultado.mensagem);
                    window.location.reload();
                } else {
                    alert(resultado.mensagem);
                }
            });
        });

        document.querySelectorAll('.btn-confirm').forEach(botao => {
            botao.addEventListener('click', async function() {
                const linha = this.closest('.agendamento-row');
                const id = linha.dataset.id || '';

                if (!id) {
                    alert('ID do agendamento inválido.');
                    return;
                }

                const formData = new FormData();
                formData.append('acao', 'status');
                formData.append('id', id);
                formData.append('status', 'Confirmado');

                const resultado = await enviarFormulario(formData);

                if (resultado.sucesso) {
                    alert(resultado.mensagem);
                    window.location.reload();
                } else {
                    alert(resultado.mensagem);
                }
            });
        });

        document.querySelectorAll('.btn-cancel').forEach(botao => {
            botao.addEventListener('click', async function() {
                const linha = this.closest('.agendamento-row');
                const id = linha.dataset.id || '';

                if (!id) {
                    alert('ID do agendamento inválido.');
                    return;
                }

                const formData = new FormData();
                formData.append('acao', 'status');
                formData.append('id', id);
                formData.append('status', 'Cancelado');

                const resultado = await enviarFormulario(formData);

                if (resultado.sucesso) {
                    alert(resultado.mensagem);
                    window.location.reload();
                } else {
                    alert(resultado.mensagem);
                }
            });
        });
    </script>
</body>
</html>