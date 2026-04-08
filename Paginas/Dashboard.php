<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit();
}
?>

<link rel="stylesheet" href="../FrontEnd/Estilo.css">

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Oficina </h2>
        <a class="active" href="#">Dashboard</a>
        <a href="#">Clientes</a>
        <a href="#">Veículos</a>
        <a href="#">Serviços</a>
        <a href="logout.php">Sair</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <input class="search" placeholder="Buscar...">
            <span>Admin</span>
        </div>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <span>Clientes</span>
                <h3>120</h3>
            </div>

            <div class="card">
                <span>Ordens</span>
                <h3>32</h3>
            </div>

            <div class="card">
                <span>Faturamento</span>
                <h3>R$ 18.500</h3>
            </div>
        </div>

        <!-- TABELA -->
        <div class="table-box">
            <h3>Ordens Recentes</h3>

            <table>
                <tr>
                    <th>Cliente</th>
                    <th>Veículo</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>João Silva</td>
                    <td>Gol 2015</td>
                    <td><span class="status ok">Concluído</span></td>
                </tr>

                <tr>
                    <td>Maria Souza</td>
                    <td>HB20</td>
                    <td><span class="status pendente">Pendente</span></td>
                </tr>
            </table>
        </div>

    </div>
</div>
