<?php
// Carrega o arquivo JSON localizado na raiz do projeto
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

                        // Exibe orçamentos que já possuem valor definido e não foram rejeitados
                        if ($valor != "" && $status != "Rejeitado") {
                            $temOrcamento = true;
                            ?>
                            <div class="cards">
                                <br>
                                <p><span class="item">Responsável: </span><?php echo $orcamento["responsavel"]; ?></p>
                                <p><span class="item">Empresa: </span><?php echo $orcamento["empresa"]; ?></p>
                                <p><span class="item">Nome do projeto: </span><?php echo $orcamento["nomeProjeto"]; ?></p>
                                <p><span class="item">Projeto: </span><?php echo $orcamento["projeto"]; ?></p>
                                <p><span class="item">Telefone: </span><?php echo $orcamento["telefone"]; ?></p>
                                <p><span class="item">E-mail: </span><?php echo $orcamento["email"]; ?></p>
                                <p><span class="item">Prazo: </span><?php echo $orcamento["prazo"]; ?></p>
                                <p><span class="item">Valor Proposto: </span>R$ <?php echo $orcamento["valor"]; ?></p>
                                <br>

                                <!-- Envia a posição do item escolhido para o juridico.php -->
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
            <p>&copy; 2026 5 Devs e Um Sonho. Todos os direitos reservados. Projeto Acadêmico - Técnico em Desenvolvimento de Sistemas. Desenvolvido por Eduardo.</p>
        </div>
    </footer>
</body>
</html>