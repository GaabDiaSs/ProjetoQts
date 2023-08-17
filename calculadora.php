<?php
class PrimeiraClasse {
    public static function calcularDiasTrabalhados($dataAdmissao, $dataDemissao) {
        $data1 = new DateTime($dataAdmissao);
        $data2 = new DateTime($dataDemissao);
        $interval = $data1->diff($data2);
        return $interval->days + 1; // Incluindo o último dia de trabalho
    }
}

class SegundaClasse {
    public static function calcularValorAReceber($diasTrabalhados) {
        $horasTrabalhadasPorDia = 8;
        $valorPorHora = 12.50;
        return $diasTrabalhados * $horasTrabalhadasPorDia * $valorPorHora;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataAdmissao = $_POST["data_admissao"];
    $dataDemissao = $_POST["data_demissao"];

    $diasTrabalhados = PrimeiraClasse::calcularDiasTrabalhados($dataAdmissao, $dataDemissao);
    $valorAReceber = SegundaClasse::calcularValorAReceber($diasTrabalhados);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php if (isset($diasTrabalhados) && isset($valorAReceber)) : ?>
        <p>Dias Trabalhados: <?php echo $diasTrabalhados; ?></p>
        <p>Valor a Receber: R$ <?php echo number_format($valorAReceber, 2, ',', '.'); ?></p>
    <?php endif; ?>
    <a href="index.html">Voltar</a>
</body>
</html>

