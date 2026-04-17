<?php

include 'Conexao.php';

function BuscarTodasOrdensServico($Conexao) {
    try {
        $Sql = "SELECT 
                    OS.id AS IdOrdem,
                    P.nome AS NomeCliente,
                    M.MarcaVeiculo AS Marca,
                    V.modelo AS ModeloVeiculo,
                    V.ano AS AnoVeiculo,
                    TS.TipoServico AS DescricaoServico,
                    TS.Valor AS ValorTotal,
                    SOS.statusOrdemServico AS StatusDescricao
                FROM tblOrdemServico OS
                INNER JOIN tblProprietario P ON OS.idProprietario = P.id
                INNER JOIN tblTiposServicos TS ON OS.idTipoServico = TS.id
                INNER JOIN tblStatusOrdemServico SOS ON OS.idStatusOrdemServico = SOS.id
                LEFT JOIN tblVeiculo V ON V.idProprietario = P.id
                LEFT JOIN tblMarcaVeiculo M ON V.idMarcaVeiculo = M.id
                ORDER BY OS.id DESC";

        $Query = $Conexao->prepare($Sql);
        $Query->execute();
        
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $Erro) {
        // Em ambiente acadêmico, é importante tratar e exibir o erro de forma clara
        die("Erro ao consultar ordens de serviço: " . $Erro->getMessage());
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $modelo = $_POST['modelo'];
    $servico = $_POST['servicos_desejados'];
    $data = $_POST['data_agendamento'];
    $hora = $_POST['hora_agendamento'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO tblAgendamento 
    (nome, telefone, email, modelo, servico, data_agendamento, hora_agendamento, observacoes)
    VALUES 
    ( '$email', '$modelo', '$servico', '$data', '$hora', '$observacoes')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Agendamento realizado com sucesso!');</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>