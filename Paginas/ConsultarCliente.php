<?php
include_once "Conexao.php";

/**
 * Função para buscar todas os clientes com seus relacionamentos
 * @param PDO $Conexao Objeto de conexão com o banco de dados
 * @return array
 */
function BuscarTodosClientes($Conexao) {
    try { 
        $Sql = "SELECT    
                * FROM tblProprietario P
                LEFT JOIN tblVeiculo V ON V.idProprietario = P.id
                LEFT JOIN tblMarcaVeiculo M ON V.idMarcaVeiculo = M.id
                INNER JOIN tblTelefone T ON T.idProprietario = P.id
                ORDER BY P.id DESC   
        
        ";

        $Query = $Conexao->prepare($Sql);
        $Query->execute();

        return $Query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $Erro) {
        die("Erro ao consultar clientes: " . $Erro->getMessage());
    }
}

$listaClientes = BuscarTodosClientes($Conexao);
?>