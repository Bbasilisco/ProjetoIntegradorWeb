<?php

include 'conexao.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$veiculo = $_POST['veiculo'];
$servico = $_POST['servico'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$observacoes = $_POST['observacoes'];

$sql = "INSERT INTO `tblagendamento`(`id`, `DATA`, `agendamento`, `idStatusAgendamento`, `idProprietario`) VALUES (NULL,'$data','$servico',1,1)"; 
('$nome','$telefone','$email','$veiculo','$servico','$data','$hora','$observacoes')";

if(mysqli_query($conexao,$sql)){
    echo "Agendamento realizado com sucesso!";
}else{
    echo "Erro: " . mysqli_error($conexao);
}

?>