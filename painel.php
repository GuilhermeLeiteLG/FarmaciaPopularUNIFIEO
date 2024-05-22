<?php
include('protect.php');
if(!isset($_SESSION)) {
    session_start();
}

// Informações de conexão com o banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'usuarios_farms'; // Nome do banco de dados

// Conectando ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para recuperar os usuários
$sql = "SELECT * FROM bd_usuarios";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Sistema Farmacia Unifieo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            position: relative;
        }

        .logout {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }

        .logout:hover {
            background-color: #c0392b;
        }

        .tabs {
            display: flex;
            justify-content: center;
            background-color: #34495e;
        }

        .tab {
            padding: 15px 20px;
            cursor: pointer;
            color: white;
            text-align: center;
            flex-grow: 1;
        }

        .tab:hover {
            background-color: #3b5998;
        }

        .active-tab {
            background-color: #2980b9;
        }

        .tab-content {
            display: none;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: white;
        }

        select option {
            padding: 10px;
        }

        button[type="submit"] {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
        }

        #search-cpf {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        Painel Sistema Farmacia Unifieo
        <a href="logout.php" class="logout">Sair</a>
    </div>
    <div class="tabs">
        <div class="tab active-tab" onclick="openTab(event, 'cadastro')">Cadastro de Medicamentos</div>
        <div class="tab" onclick="openTab(event, 'usuarios')">Usuários</div>
        <div class="tab" onclick="openTab(event, 'estoque')">Estoque</div>
        <div class="tab" onclick="openTab(event, 'cadastro-usuario')">Cadastrar Usuário</div>
    </div>
    <div class="container">
    <div id="cadastro" class="tab-content active-content">
        <h2>Cadastro de Medicamentos</h2>
        <form>
            <label for="nome">Nome do Medicamento:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" maxlength="255" required></textarea>
            <small>Máximo de 255 caracteres</small>

            <label for="medicamentos">Escolha o Tipo de Medicamento: </label>
            <select id="medicamentos" name="mendi" required>
                <option value="" disabled selected>Selecione uma opção</option>
                <option value="analgesico_antipiretico">Analgésico/Antipirético</option>
                <option value="aine">Anti-inflamatório não esteroidal (AINE)</option>
                <option value="antibiotico">Antibiótico</option>
                <option value="antihistaminico">Anti-histamínico</option>
                <option value="antihipertensivo">Antihipertensivo</option>
                <option value="inibidor_bomba_protons">Inibidor da bomba de prótons</option>
                <option value="hipolipemiante">Hipolipemiante</option>
                <option value="antidiabetico">Antidiabético</option>
                <option value="antidepressivo">Antidepressivo</option>
                <option value="ansiolitico">Ansiolítico</option>
                <option value="anticonvulsivante">Anticonvulsivante</option>
                <option value="broncodilatador">Broncodilatador</option>
                <option value="antiemetico">Antiemético</option>
                <option value="antifungico">Antifúngico</option>
                <option value="antiviral">Antiviral</option>
                <option value="anticoagulante">Anticoagulante</option>
                <option value="antipsicotico">Antipsicótico</option>
                <option value="diuretico">Diurético</option>
                <option value="laxante">Laxante</option>
                <option value="antidiarreico">Antidiarreico</option>
                <option value="imunossupressor">Imunossupressor</option>
                <option value="hormonal">Hormonal</option>
                <option value="anestesico">Anestésico</option>
                <option value="antimalarico">Antimalárico</option>
                <option value="antiparasitario">Antiparasitário</option>
                <option value="corticosteroide">Corticosteroide</option>
                <option value="antiespasmodico">Antiespasmódico</option>
                <option value="antigotoso">Antigotoso</option>
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <div class="equivalencia-container">
                <label for="sal">Equivalência Sal-Base:</label>
                <input type="number" id="sal_quantidade" name="sal_quantidade" placeholder="Quantidade do Sal (mg)" required>
                <input type="text" id="sal_nome" name="sal_nome" placeholder="Nome do Sal" required>
                <input type="text" id="base_nome" name="base_nome" placeholder="Nome da Base" required>
                <input type="number" id="base_quantidade" name="base_quantidade" placeholder="Quantidade da Base (mg)" required>
            </div>
            <small>TOTAL RESPONSABILIDADE AO PREENCHER AS INFORMAÇÕES</small><BR></BR>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
        <div id="usuarios" class="tab-content">
            <h2>Usuários</h2>
            <!-- Campo de pesquisa por CPF -->
            <input type="text" id="search-cpf" placeholder="Pesquisar por CPF">

            <!-- Tabela para exibir os usuários -->
            <table>
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Situação Empregatícia</th>
                        <th>Aluno UNIFIEO</th>
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th>RG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Exibir os usuários na tabela
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nome_completo"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["telefone"] . "</td>";
                            echo "<td>" . $row["emprego"] . "</td>";
                            echo "<td>" . ($row["aluno"] ? "Sim" : "Não") . "</td>";
                            echo "<td>" . $row["data_nascimento"] . "</td>";
                            echo "<td>" . $row["cpf"] . "</td>";
                            echo "<td>" . $row["rg"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Nenhum usuário encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="estoque" class="tab-content">
            <h2>Estoque</h2>
            <p>Aqui estará listado todo o estoque de medicamentos.</p>
            <table>
        <thead>
            <tr>
                <th>Nome do Medicamento</th>
                <th>Classe Terapêutica</th>
                <th>Indicação</th>
                <th>Dosagem Recomendada</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Paracetamol</td>
                <td>Analgésico/Antipirético</td>
                <td>Febre e dor leve a moderada</td>
                <td>500 mg a cada 4-6 horas</td>
            </tr>
            <tr>
                <td>Ibuprofeno</td>
                <td>Anti-inflamatório não esteroidal (AINE)</td>
                <td>Dor, inflamação e febre</td>
                <td>200-400 mg a cada 4-6 horas</td>
            </tr>
            <tr>
                <td>Amoxicilina</td>
                <td>Antibiótico</td>
                <td>Infecções bacterianas</td>
                <td>500 mg a cada 8 horas</td>
            </tr>
            <tr>
                <td>Loratadina</td>
                <td>Anti-histamínico</td>
                <td>Rinite alérgica e urticária</td>
                <td>10 mg uma vez ao dia</td>
            </tr>
            <tr>
                <td>Losartana</td>
                <td>Antihipertensivo</td>
                <td>Hipertensão arterial</td>
                <td>50 mg uma vez ao dia</td>
            </tr>
            <tr>
                <td>Omeprazol</td>
                <td>Inibidor da bomba de prótons</td>
                <td>Refluxo gastroesofágico</td>
                <td>20 mg uma vez ao dia</td>
            </tr>
            <tr>
                <td>Simvastatina</td>
                <td>Hipolipemiante</td>
                <td>Dislipidemia</td>
                <td>20-40 mg uma vez ao dia</td>
            </tr>
            <tr>
                <td>Metformina</td>
                <td>Antidiabético</td>
                <td>Diabetes tipo 2</td>
                <td>500 mg duas vezes ao dia</td>
            </tr>
        </tbody>
    </table>

        </div>
        <div id="cadastro-usuario" class="tab-content">
            <h2>Cadastrar Usuário</h2>
            <form>
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">
                <label for="situacao-empregaticia">Situação Empregatícia:</label>
                <input type="text" id="situacao-empregaticia" name="situacao-empregaticia">
                <label for="aluno-unifieo">Aluno da UNIFIEO:</label>
                <select id="aluno-unifieo" name="aluno-unifieo">
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" id="data-nascimento" name="data-nascimento">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14">
                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" maxlength="20">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active-tab", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active-tab";
        }
    </script>
</body>
</html>

<?php
// Feche a conexão com o banco de dados
$conn->close();
?>
