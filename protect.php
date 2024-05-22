<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    echo '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acesso Negado - Sistema Farmacia Unifieo</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .access-denied-container {
                text-align: center;
                padding: 40px;
                background-color: #2c3e50;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                color: white;
            }
            .access-denied-container h1 {
                margin-bottom: 20px;
                font-size: 24px;
            }
            .access-denied-container p {
                margin-bottom: 20px;
            }
            .access-denied-container a {
                display: inline-block;
                padding: 10px 20px;
                background-color: #2980b9;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .access-denied-container a:hover {
                background-color: #3498db;
            }
        </style>
    </head>
    <body>
        <div class="access-denied-container">
            <h1>Acesso Negado</h1>
            <p>Você não pode acessar essa página porque não está logado.</p>
            <a href="index.php">Entrar</a>
        </div>
    </body>
    </html>';
    exit();
}
?>
