<?php 
$arquivoConcluidos = __DIR__ . "/concluidos.json";
$concluidos = [];

if (file_exists($arquivoConcluidos)) {
    $conteudo = file_get_contents($arquivoConcluidos);
    $concluidos = json_decode($conteudo, true) ?? [];
}

$totalCards = 6; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho em Grupo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav> 
        <div class="Nav-bar">
            <img src="imgHtml/Gemini_Generated_Image_5kpxl15kpxl15kpx-removebg-preview.png" alt="">
            <a href="index.php">INICIO</a>
            <a href="php/orcamento.php">ORÇAMENTO</a>
            <a href="php/financeiro.php">FINANCEIRO</a>
            <a href="php/juridico.php">JURIDICO</a>
            <a href="php/cliente.php">CLIENTES</a>
            <a href="php/desenvolvimento.php">DESENVOLVIMENTO</a><br>
            <hr>
        </div>
    </nav><!--Nav-bar-->
   
    <div class="apresentacao">
        <img src="imgHtml/Gemini_Generated_Image_22akzh22akzh22ak__1_-removebg-preview.png" alt="">
        <div class="mais">
        <h1>5 DEVS E UM SONHO</h1>
        <p>Desenvolvemos softwares sob medida para simplificar processos,<br>
            escalar operações e criar produtos digitais prontos para o futuro.</p>
            
            <button>Saiba Mais</button>
        </div><!--mais-->
    </div><!--apresentaçao-->

<!--===============================================================================================================================-->


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
          <script src="projetos.js"></script>          
</body>
</html>