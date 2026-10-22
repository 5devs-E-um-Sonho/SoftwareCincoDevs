<?php
$caminhoJson = __DIR__ . "/orcamento.json";
$orcamentos = [];

if (file_exists($caminhoJson)) {
    $conteudoJson = file_get_contents($caminhoJson);
    $orcamentos = json_decode($conteudoJson, true) ?? [];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cliente.css">
    <title>Clietes</title>
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
    </div><!--Nav-bar-->

     <div class="cabecalho">
        <h1>ÁREA DO CLIENTE</h1>
        <p>Acompanhe suas propostas e confirme os valores informados pelo financeiro.</p>
    </div>
    <div class="ala">

    <div class="clientes">
         <div class="orcamento">
        <?php 
        $temOrcamentoVisivel = false;

        if (!empty($orcamentos)) {
            foreach ($orcamentos as $indice => $orcamento) {
                
                $temValor = isset($orcamento["valor"]) && $orcamento["valor"] !== "";
                $status   = $orcamento["status"] ?? "";

                if ($temValor && $status !== "Rejeitado") {
                    $temOrcamentoVisivel = true;
                    ?>
                    <div class="cards" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 8px;">
                        <br>
                        <p><span class="item">Responsável: </span><?= htmlspecialchars($orcamento["responsavel"] ?? '') ?></p>
                        <p><span class="item">Empresa: </span><?= htmlspecialchars($orcamento["empresa"] ?? '') ?></p>
                        <p><span class="item">Nome do projeto: </span><?= htmlspecialchars($orcamento["nomeProjeto"] ?? '') ?></p>
                        <p><span class="item">Projeto: </span><?= htmlspecialchars($orcamento["projeto"] ?? '') ?></p>
                        <p><span class="item">Telefone: </span><?= htmlspecialchars($orcamento["telefone"] ?? '') ?></p>
                        <p><span class="item">E-mail: </span><?= htmlspecialchars($orcamento["email"] ?? '') ?></p>
                        <p><span class="item">Prazo: </span><?= htmlspecialchars($orcamento["prazo"] ?? '') ?></p>
                        <p><span class="item">Valor Proposto: </span>R$ <?= number_format((float)$orcamento["valor"], 2, ',', '.') ?></p>
                        <p><span class="item">Status: </span><?= (!empty($orcamento["pago"])) ? "Aprovado / Pago" : "Aguardando Aceite" ?></p>
                        <br>

                        <!-- Link exigido para redirecionar para o juridico.php -->
                        <a href="juridico.php?indice=<?= $indice; ?>" class="btn-termos">Ver Termos</a>
                    </div>
                    <?php
                }
            }
        }

         if (!$temOrcamentoVisivel) {
            echo "<h2>Nenhum orçamento pendente para aprovação no momento.</h2>";
        }
    </div>
    </div>

    <footer class="legal-footer">
    <div class="container">
        <p>&copy; 2026 5 Devs e Um Sonho. Todos os direitos reservados. Projeto Acadêmico - Técnico em Desenvolvimento de Sistemas. Desenvolvido por Eduardo.</p>
    </div>
</footer>
</body>
</html>