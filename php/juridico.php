

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/juridico.css">
    <title>Central Jurídica e Termos</title>
</head>
<body>

    <div class="Nav-bar">
        <img src="../imgHtml/Gemini_Generated_Image_5kpxl15kpxl15kpx-removebg-preview.png" alt="">
        <a href="../index.php">INICIO</a>
        <a href="orcamento.php">ORÇAMENTO</a>
        <a href="financeiro.php">FINANCEIRO</a>
        <a href="juridico.php">JURIDICO</a>
        <a href="cliente.php">CLIENTES</a>
        <a href="desenvolvimento.php">DESENVOLVIMENTO</a>
    </div>

    <div class="cabecalho">
        <h1>CENTRAL JURÍDICA E TERMOS</h1>
        <p>Confira as cláusulas antes de prosseguir.</p>
    </div>

    <div class="container" style="padding: 20px;">
        <div class="contrato-box" style="border: 1px solid #ccc; padding: 20px; background: #fff;">
            <h2>Minuta Padrão de Contrato</h2>
            
            <p><strong>CONTRATADA:</strong> Five Devs e um Sonho</p>
            <p><strong>CONTRATANTE:</strong> <?php echo $cliente_nome; ?> <?php if ($empresa_nome != "") { echo "(Empresa: " . $empresa_nome . ")"; } ?></p>
            <p><strong>PROJETO:</strong> <?php echo $nome_projeto; ?></p>
            <p><strong>PRAZO:</strong> <?php echo $prazo_entrega; ?></p>
            <p><strong>VALOR TOTAL:</strong> R$ <?php echo $valor_orcamento; ?></p>

            <hr>

            <h3>Cláusula 1 - LGPD e Sigilo</h3>
            <p>Garantimos sigilo sobre as ideias, regras de negócio e dados do cliente durante a execução do projeto.</p>

            <h3>Cláusula 2 - Garantia</h3>
            <p>Garantia técnica de 30 dias após a entrega para correção de falhas sem custo adicional.</p>

            <br>
            
        </div>
    </div>

</body>
</html>