<?php
include('conexao.php');
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu E-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua Senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
        

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Farmacia Unifieo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(45deg, #34495e, #2c3e50);
        }
        img {
            width: 400px; /* Ajuste conforme necessário */
            margin-bottom: 20px;
        }
        h1 {
            color: #ecf0f1;
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #ecf0f1;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            outline: none;
            box-sizing: border-box;
            background-color: #ecf0f1;
        }
        button[type="submit"] {
            background-color: #2980b9;
            color: #fff;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #3498db;
        }
        .container {
            width: 300px;
            padding: 20px;
            border-radius: 15px;
            background-color: rgba(0, 0, 0, 0.85);
            text-align: center;
        }
        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    <img src="Unifieo Logo.png" alt="Logo">
    <h1>Acesso Sistema 
        Farmacia Unifieo</h1>
    <div class="container">
        <fieldset>
            <form action="" method="post">
                <p>
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email">
                </p>
                <p>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha">
                </p>
                <button type="submit">Entrar</button>
            </form>
        </fieldset>
    </div>
        
    </body>
</html>