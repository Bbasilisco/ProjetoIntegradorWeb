<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes | JP Auto Center</title>
    <link rel="stylesheet" href="../FrontEnd/Estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="admin-body">

    <?php include "Sidebar.php"; ?>

    <div class="main-content">
        <?php include "TopoAdm.php"; ?>
    </div>
    


 <div class="header">
    <div>
      <h1>Clientes</h1>
      <p>Gerencie seus clientes</p>
    </div>
    <button class="btn">+ Novo Cliente</button>
  </div>

  <div class="card">
    <div class="search-box">
      <input type="text" placeholder="Buscar clientes..." id="search">
    </div>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Veículo</th>
          <th>Placa</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="ConsultarClientes.php">
        <!-- Dados virão do banco -->
      </tbody>
    </table>
  </div>

  <script src="script.js"></script>
    
</body>
</html>
