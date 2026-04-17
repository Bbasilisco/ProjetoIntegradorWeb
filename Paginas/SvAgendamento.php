<?php
session_start();
require_once "Conexao.php";

header('Content-Type: application/json; charset=utf-8');

function responder($sucesso, $mensagem, $dados = []) {
    echo json_encode([
        'sucesso' => $sucesso,
        'mensagem' => $mensagem,
        'dados' => $dados
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

function statusToId($status){
    if ($status === 'Confirmado') return 2;
    if ($status === 'Concluído') return 3;
    if ($status === 'Cancelado') return 4;
    return 1; // Pendente
}

function montarTextoAgendamento($servico, $veiculo){
    $servico = trim((string)$servico);
    $veiculo = trim((string)$veiculo);

    if ($veiculo === '') {
        return $servico;
    }

    return $servico . ' - ' . $veiculo;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    responder(false, 'Método inválido.');
}

$acao = $_POST['acao'] ?? '';

if ($acao === '') {
    responder(false, 'Ação não informada.');
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$idProprietario = isset($_POST['idProprietario']) ? (int)$_POST['idProprietario'] : 0;
$cliente = trim($_POST['cliente'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$veiculo = trim($_POST['veiculo'] ?? '');
$servico = trim($_POST['servico'] ?? '');
$data = trim($_POST['data'] ?? '');
$hora = trim($_POST['hora'] ?? '');
$status = trim($_POST['status'] ?? 'Pendente');
$observacoes = trim($_POST['observacoes'] ?? '');

$statusId = statusToId($status);
$dataHora = '';

if ($data !== '' && $hora !== '') {
    $dataHora = $data . ' ' . $hora . ':00';
} elseif ($data !== '') {
    $dataHora = $data . ' 00:00:00';
}

$textoAgendamento = montarTextoAgendamento($servico, $veiculo);

/*
|--------------------------------------------------------------------------
| CRIAR
|--------------------------------------------------------------------------
*/
if ($acao === 'criar') {
    if ($servico === '' || $data === '' || $hora === '') {
        responder(false, 'Preencha serviço, data e horário.');
    }

    if ($idProprietario <= 0) {
        if ($cliente === '') {
            responder(false, 'Informe o cliente.');
        }

        $sqlBuscaProp = "SELECT id FROM tblProprietario WHERE nome = ? LIMIT 1";
        $stmtBuscaProp = mysqli_prepare($conn, $sqlBuscaProp);

        if (!$stmtBuscaProp) {
            responder(false, 'Erro ao preparar busca do proprietário: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmtBuscaProp, "s", $cliente);
        mysqli_stmt_execute($stmtBuscaProp);
        $resProp = mysqli_stmt_get_result($stmtBuscaProp);
        $prop = $resProp ? mysqli_fetch_assoc($resProp) : null;
        mysqli_stmt_close($stmtBuscaProp);

        if (!$prop) {
            responder(false, 'Cliente não encontrado em tblProprietario.');
        }

        $idProprietario = (int)$prop['id'];
    }

    $sql = "INSERT INTO tblAgendamento (DATA, agendamento, idStatusAgendamento, idProprietario)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        responder(false, 'Erro ao preparar INSERT em tblAgendamento: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssii", $dataHora, $textoAgendamento, $statusId, $idProprietario);

    if (!mysqli_stmt_execute($stmt)) {
        responder(false, 'Erro ao criar agendamento: ' . mysqli_stmt_error($stmt));
    }

    $novoId = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    if ($observacoes !== '') {
        $sqlOsBusca = "SELECT id
                       FROM tblordemservico
                       WHERE idProprietario = ?
                       ORDER BY id DESC
                       LIMIT 1";

        $stmtBusca = mysqli_prepare($conn, $sqlOsBusca);
        if ($stmtBusca) {
            mysqli_stmt_bind_param($stmtBusca, "i", $idProprietario);
            mysqli_stmt_execute($stmtBusca);
            $resBusca = mysqli_stmt_get_result($stmtBusca);
            $os = $resBusca ? mysqli_fetch_assoc($resBusca) : null;
            mysqli_stmt_close($stmtBusca);

            if ($os && isset($os['id'])) {
                $osId = (int)$os['id'];
                $sqlOsUpdate = "UPDATE tblordemservico
                                SET comentario = ?
                                WHERE id = ?";
                $stmtOs = mysqli_prepare($conn, $sqlOsUpdate);
                if ($stmtOs) {
                    mysqli_stmt_bind_param($stmtOs, "si", $observacoes, $osId);
                    mysqli_stmt_execute($stmtOs);
                    mysqli_stmt_close($stmtOs);
                }
            }
        }
    }

    responder(true, 'Agendamento criado com sucesso.', [
        'id' => $novoId,
        'cliente' => $cliente,
        'telefone' => $telefone,
        'veiculo' => $veiculo,
        'servico' => $servico,
        'data' => $data,
        'hora' => $hora,
        'status' => $status,
        'observacoes' => $observacoes,
        'idProprietario' => $idProprietario
    ]);
}

/*
|--------------------------------------------------------------------------
| EDITAR
|--------------------------------------------------------------------------
*/
if ($acao === 'editar') {
    if ($id <= 0) {
        responder(false, 'ID do agendamento inválido.');
    }

    if ($servico === '' || $data === '' || $hora === '') {
        responder(false, 'Preencha serviço, data e horário.');
    }

    $sqlBuscaProp = "SELECT idProprietario FROM tblAgendamento WHERE id = ?";
    $stmtBuscaProp = mysqli_prepare($conn, $sqlBuscaProp);
    if (!$stmtBuscaProp) {
        responder(false, 'Erro ao buscar proprietário do agendamento.');
    }

    mysqli_stmt_bind_param($stmtBuscaProp, "i", $id);
    mysqli_stmt_execute($stmtBuscaProp);
    $resProp = mysqli_stmt_get_result($stmtBuscaProp);
    $rowProp = $resProp ? mysqli_fetch_assoc($resProp) : null;
    mysqli_stmt_close($stmtBuscaProp);

    if (!$rowProp) {
        responder(false, 'Agendamento não encontrado.');
    }

    $idProprietario = (int)$rowProp['idProprietario'];

    $sql = "UPDATE tblAgendamento
            SET DATA = ?, agendamento = ?, idStatusAgendamento = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        responder(false, 'Erro ao preparar UPDATE em tblAgendamento: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssii", $dataHora, $textoAgendamento, $statusId, $id);

    if (!mysqli_stmt_execute($stmt)) {
        responder(false, 'Erro ao atualizar agendamento: ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    $sqlOsBusca = "SELECT id
                   FROM tblordemservico
                   WHERE idProprietario = ?
                   ORDER BY id DESC
                   LIMIT 1";

    $stmtBusca = mysqli_prepare($conn, $sqlOsBusca);
    if ($stmtBusca) {
        mysqli_stmt_bind_param($stmtBusca, "i", $idProprietario);
        mysqli_stmt_execute($stmtBusca);
        $resBusca = mysqli_stmt_get_result($stmtBusca);
        $os = $resBusca ? mysqli_fetch_assoc($resBusca) : null;
        mysqli_stmt_close($stmtBusca);

        if ($os && isset($os['id'])) {
            $osId = (int)$os['id'];
            $sqlOsUpdate = "UPDATE tblordemservico
                            SET comentario = ?
                            WHERE id = ?";
            $stmtOs = mysqli_prepare($conn, $sqlOsUpdate);
            if ($stmtOs) {
                mysqli_stmt_bind_param($stmtOs, "si", $observacoes, $osId);
                mysqli_stmt_execute($stmtOs);
                mysqli_stmt_close($stmtOs);
            }
        }
    }

    responder(true, 'Agendamento atualizado com sucesso.', [
        'id' => $id,
        'cliente' => $cliente,
        'telefone' => $telefone,
        'veiculo' => $veiculo,
        'servico' => $servico,
        'data' => $data,
        'hora' => $hora,
        'status' => $status,
        'observacoes' => $observacoes,
        'idProprietario' => $idProprietario
    ]);
}

/*
|--------------------------------------------------------------------------
| ALTERAR STATUS
|--------------------------------------------------------------------------
*/
if ($acao === 'status') {
    if ($id <= 0) {
        responder(false, 'ID do agendamento inválido.');
    }

    $sql = "UPDATE tblAgendamento
            SET idStatusAgendamento = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        responder(false, 'Erro ao preparar update de status.');
    }

    mysqli_stmt_bind_param($stmt, "ii", $statusId, $id);

    if (!mysqli_stmt_execute($stmt)) {
        responder(false, 'Erro ao atualizar status: ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    responder(true, 'Status atualizado com sucesso.', [
        'id' => $id,
        'status' => $status
    ]);
}

/*
|--------------------------------------------------------------------------
| EXCLUIR
|--------------------------------------------------------------------------
*/
if ($acao === 'excluir') {
    if ($id <= 0) {
        responder(false, 'ID do agendamento inválido.');
    }

    $sql = "DELETE FROM tblAgendamento WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        responder(false, 'Erro ao preparar exclusão.');
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (!mysqli_stmt_execute($stmt)) {
        responder(false, 'Erro ao excluir agendamento: ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    responder(true, 'Agendamento excluído com sucesso.', [
        'id' => $id
    ]);
}

responder(false, 'Ação inválida.');