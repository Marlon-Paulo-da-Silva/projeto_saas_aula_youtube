<?php
// Conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'teste_saas';
$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $domain = $_POST['domain'];

    // Inserir no banco de dados
    $stmt = $conn->prepare("INSERT INTO customers (name, title, phone, domain) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $title, $phone, $domain);
    $stmt->execute();
    echo "Cadastro realizado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cadastro de Cliente</h2>
    <form method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>

        <label for="title">Título da Página:</label>
        <input type="text" id="title" name="title" required>

        <label for="phone">Telefone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="domain">Domínio:</label>
        <input type="text" id="domain" name="domain" placeholder="example.com" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
