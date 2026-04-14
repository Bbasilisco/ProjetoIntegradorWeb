<?php
include_once "Conexao.php";

/**
 * Função para buscar todas as Ordens de Serviço com seus relacionamentos
 * @param PDO $Conexao Objeto de conexão com o banco de dados
 * @return array
 */
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

$ListaOrdensServico = BuscarTodasOrdensServico($Conexao);
?>