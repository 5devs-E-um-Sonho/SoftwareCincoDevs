<?php
// Carrega o orcamento.json localizado na raiz do projeto (uma pasta acima)
$caminhoJson = __DIR__ . "/../orcamento.json";
$orcamentos = [];

if (file_exists($caminhoJson)) {
    $conteudoJson = file_get_contents($caminhoJson);
    $orcamentos = json_decode($conteudoJson, true);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cliente.css">
    <title>Clientes</title>
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
        <h1>ÁREA DO CLIENTE</h1>
        <p>Acompanhe suas propostas e confirme os valores informados pelo financeiro.</p>
    </div>

    <div class="ala">
        <div class="clientes">
            <div class="orcamento">
                <?php 
                $temOrcamento = false;

                if (!empty($orcamentos)) {
                    foreach ($orcamentos as $indice => $orcamento) {
                        
                        $valor = isset($orcamento["valor"]) ? $orcamento["valor"] : "";
                        $status = isset($orcamento["status"]) ? $orcamento["status"] : "";

                        // Mostra apenas se o financeiro informou valor e o cliente nao rejeitou
                        if ($valor != "" && $status != "Rejeitado") {
                            $temOrcamento = true;
                            ?>
                            <div class="cards" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;">
                                <p><strong>Responsável:</strong> <?php echo $orcamento["responsavel"]; ?></p>
                                <p><strong>Empresa:</strong> <?php echo $orcamento["empresa"]; ?></p>
                                <p><strong>Nome do Projeto:</strong> <?php echo $orcamento["nomeProjeto"]; ?></p>
                                <p><strong>Descrição:</strong> <?php echo $orcamento["projeto"]; ?></p>
                                <p><strong>Prazo:</strong> <?php echo $orcamento["prazo"]; ?></p>
                                <p><strong>Valor:</strong> R$ <?php echo $orcamento["valor"]; ?></p>
                                <br>

                                <!-- Link exigido para redirecionar para o juridico.php -->
                                <a href="juridico.php?indice=<?php echo $indice; ?>">Ver Termos</a>
                            </div>
                            <?php
                        }
                    }
                }

                if ($temOrcamento == false) {
                    echo "<h2>Nenhum orçamento pendente para aprovação no momento.</h2>";
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="legal-footer">
        <div class="container">
            <p>&copy; 2026 5 Devs e Um Sonho. Projeto Acadêmico - Técnico em Desenvolvimento de Sistemas.</p>
        </div>
    </footer>
</body>
</html>