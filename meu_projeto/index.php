<?php
// Função para calcular o IMC e a classificação
function calcularIMC($peso, $altura) {
    $imc = $peso / ($altura * $altura); // Cálculo do IMC
    $classificacao = '';

    // Classificação do IMC
    if ($imc < 18.5) {
        $classificacao = "Abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $classificacao = "Peso normal";
    } elseif ($imc >= 25 && $imc < 29.9) {
        $classificacao = "Sobrepeso";
    } elseif ($imc >= 30 && $imc < 34.9) {
        $classificacao = "Obesidade grau 1";
    } elseif ($imc >= 35 && $imc < 39.9) {
        $classificacao = "Obesidade grau 2";
    } else {
        $classificacao = "Obesidade grau 3 (mórbida)";
    }

    return array('imc' => number_format($imc, 2), 'classificacao' => $classificacao);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    // Verifica se os campos não estão vazios
    if (!empty($peso) && !empty($altura)) {
        // Calcula o IMC
        $resultado = calcularIMC($peso, $altura);
    } else {
        $erro = "Por favor, insira o peso e a altura.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo do IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .resultado {
            text-align: center;
            margin-top: 20px;
        }
        .erro {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cálculo do IMC</h1>

        <!-- Formulário para calcular o IMC -->
        <form method="POST">
            <label for="peso">Peso (kg):</label>
            <input type="number" step="0.1" name="peso" id="peso" required>

            <label for="altura">Altura (m):</label>
            <input type="number" step="0.01" name="altura" id="altura" required>

            <button type="submit">Calcular IMC</button>
        </form>

        <?php if (isset($erro)): ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php elseif (isset($resultado)): ?>
            <div class="resultado">
                <h2>Seu IMC é: <?php echo $resultado['imc']; ?></h2>
                <p><strong>Classificação:</strong> <?php echo $resultado['classificacao']; ?></p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
