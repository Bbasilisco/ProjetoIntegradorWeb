<?php
include 'Conexao.php';

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
    ('$nome', '$telefone', '$email', '$modelo', '$servico', '$data', '$hora', '$observacoes')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Agendamento realizado com sucesso!');</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>