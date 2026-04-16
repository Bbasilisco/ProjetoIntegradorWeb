<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente - Oficina</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .container {
            width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastro de Cliente</h2>

    <form action="salvar_cliente.php" method="POST">

        <label>Nome Completo</label>
        <input type="text" name="nome" required>

        <label>CPF</label>
        <input type="text" name="cpf" required>

        <label>Telefone</label>
        <input type="text" name="telefone" required>

        <label>Email</label>
        <input type="email" name="email">

        <label>Endereço</label>
        <input type="text" name="endereco">

        <h3>Dados do Veículo</h3>

        <label>Placa</label>
        <input type="text" name="placa" required>

        <label>Marca</label>
        <input type="text" name="marca">

        <label>Modelo</label>
        <input type="text" name="modelo">

        <label>Ano</label>
        <input type="number" name="ano">

        <label>Cor</label>
        <input type="text" name="cor">

        <input type="submit" class="btn" value="Cadastrar Cliente">
    </form>
</div>

</body>
</html>0