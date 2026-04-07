<<<<<<< HEAD
<?php include 'Conexao.php'; ?>
=======
<?php include 'conexao.php'; ?>
>>>>>>> 166165530edd7c388e5f5dc2933e610cbd398ee0

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Depoimentos</title>

<style>
    body {
        background-color: #f2f2f2;
        font-family: Arial;
    }

    .container {
        max-width: 900px;
        margin: 60px auto;
        text-align: center;
    }

    h2 span {
        color: red;
    }

    .card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
        text-align: left;
    }

    .stars {
        color: #ffb400;
        margin-bottom: 10px;
    }
</style>

</head>
<body>

<div class="container">
    <h2>O que nossos <span>clientes</span> dizem</h2>

    <?php
    $sql = "SELECT * FROM depoimentos ORDER BY id DESC";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()):
    ?>

        <div class="card">
            <div class="stars">
                <?php
                for ($i = 0; $i < $row['estrelas']; $i++) {
                    echo "★";
                }
                ?>
            </div>

            <div class="text">
                "<?php echo $row['mensagem']; ?>"
            </div>

            <div class="name">
                <?php echo $row['nome']; ?>
            </div>
        </div>

    <?php endwhile; ?>

</div>

</body>
<<<<<<< HEAD
</html>








=======
</html>
>>>>>>> 166165530edd7c388e5f5dc2933e610cbd398ee0
