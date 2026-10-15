<?php 
// Lê o arquivo de concluídos gerado pelo desenvolvimento.php
$arquivoConcluidos = __DIR__ . "/concluidos.json";
$concluidos = [];

if (file_exists($arquivoConcluidos)) {
    $conteudo = file_get_contents($arquivoConcluidos);
    $concluidos = json_decode($conteudo, true) ?? [];
}

$totalCards = 6; // Mantém a quantidade de 6 cards na tela
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/projetos.css">
    <title>Projetos</title>
    <!-- Adicione o seu arquivo CSS aqui -->
</head>
<body>

    <div class="Nav-bar">
            <img src="../imgHtml/Gemini_Generated_Image_5kpxl15kpxl15kpx-removebg-preview.png" alt="">
            <a href="../index.php">INICIO</a>
            <a href="orcamento.php">ORÇAMENTO</a>
            <a href="financeiro.php">FINANCEIRO</a>
            <a href="juridico.php">JURIDICO</a>
            <a href="projetos.php">PROJETOS</a>
            <a href="desenvolvimento.php">DESENVOLVIMENTO</a>
        </div><!--Nav-bar-->

<section id="projetos" class="projetos-secao">
    <div class="projetos">
        <?php for ($i = 0; $i < $totalCards; $i++): ?>
            <?php 
                // Formata o número do card: 01, 02, 03... 06
                $numeroFormatado = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                
                // Verifica se existe um projeto concluído salvo nesta posição
                $temProjeto = isset($concluidos[$i]);
            ?>

            <div class="card">
                <div class="numero-projeto">
                    <?= $numeroFormatado; ?>
                </div>

                <?php if ($temProjeto): ?>
                    <!-- CARD PREENCHIDO (PROJETO CONCLUÍDO NO DESENVOLVIMENTO) -->
                    <h3><?= htmlspecialchars($concluidos[$i]['nomeProjeto'] ?? 'Projeto Finalizado'); ?></h3>
                    <p><?= htmlspecialchars($concluidos[$i]['projeto'] ?? 'Projeto concluído pela equipe.'); ?></p>

                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                    </div>

                    <a href="#">Ver Projeto</a>

                <?php else: ?>
                    <!-- CARD PADRÃO (ESPAÇO VAGO) -->
                    <h3>Faça Parte da Nossa História</h3>
                    <p>Seu projeto exibido aqui</p>

                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                    </div>

                    <a href="#">Ver Projetos</a>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</section>

</body>
</html>