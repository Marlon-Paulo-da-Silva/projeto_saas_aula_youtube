<?php
// Conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$pass = '';
$db = '';
$conn = new mysqli($host, $user, $pass, $db);

// Obtém o domínio atual
$domain = $_SERVER['HTTP_HOST'];

// Consulta no banco de dados o cliente que tem esse domínio
$stmt = $conn->prepare("SELECT name, title, phone FROM customers WHERE domain = ?");
$stmt->bind_param("s", $domain);
$stmt->execute();
$stmt->bind_result($name, $title, $phone);
$stmt->fetch();

// Se o domínio for encontrado, exibe a landing page
if ($name) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .contact {
            margin-top: 20px;
            font-size: 16px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <p>Bem-vindo(a), <?php echo htmlspecialchars($name); ?>!</p>
    <p class="contact">Entre em contato conosco: <?php echo htmlspecialchars($phone); ?></p>
</div>

</body>
</html>
<?php
} else {
    echo "Domínio não encontrado.";
}
?>
