<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de IMC</title>
</head>
<body>

<div class="container">
    <h1>Calculadora de IMC</h1>
    <form method="POST">
        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" id="peso" step="0.1" required>

        <label for="altura">Altura (m):</label>
        <input type="number" name="altura" id="altura" step="0.01" required>

        <input type="submit" value="Calcular IMC">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Cálculo do IMC
        $imc = $peso / ($altura * $altura);
        $imc = round($imc, 2); // Arredondar para 2 casas decimais

        // Classificação do IMC
        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            $classificacao = "Peso normal";
        } elseif ($imc >= 25 && $imc < 29.9) {
            $classificacao = "Sobrepeso";
        } else {
            $classificacao = "Obesidade";
        }

        echo "<div class='resultado'>Seu IMC é: $imc - Classificação: $classificacao</div>";
    }
    ?>
</div>

</body>
</html>
