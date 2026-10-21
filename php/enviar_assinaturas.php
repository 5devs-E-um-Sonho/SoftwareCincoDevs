<?php 

    $conteudoJson = file_get_contents(__DIR__ . "/orcamento.json");
    $orcamentos = json_decode($conteudoJson, true);

    $nomeDaSoft = "Five Devs e Um Sonho";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contrato.css">
    <title>Visualização do Contrato Gerado</title>
</head>
<body>
        <nav> 
        <div class="Nav-bar">
            <img src="../imgHtml/Gemini_Generated_Image_5kpxl15kpxl15kpx-removebg-preview.png" alt="">
        </div>
    </nav><!--Nav-bar-->

    <div class="terms">
        <div class="termos">
            <div class="test_ass">
                <h1>Termos e condições</h1>
                <h2>
                    A empresa <?= $nomeDaSoft?>, Garante que o uso das informações do contratante <?= $responsavel ?> são confidenciais, garantido seu armazenamento 
                    e acesso somente ao pessoal autorizado. Informamos tambem que o contratante tem ate 3 edições no projeto sem adicional,
                    partindo disso os adicionais tributados ficara no valor de 3% do valor inicial, não podendo alterar o projeto em ate um dia antes da sua entrega prevista.
                    Fica da total ciencia do contratante que o projeto sera entrega em ate <?= $prazo ?> Dias uteis, e que atrasos sera informado ate um dia antes da entrega prevista
                </h2>

                <h1>Aceitações dos Termos</h1>
                
                <h2>
                    Diante as diretrizes da Empresa Credora: <?= $nomeDaSoft?>, entendo e aceito seus termos.
                    Garantindo Que as seguintes informações e valores pagos, sâo do meu conhecimento, 
                    tambem é do conhecimento a assinatura desse documento, seu uso como um comprovante.

                    <br>Assinado Empressa Credora: <?= $nomeDaSoft?>
                    <br>Assinado Cliente:  <?= $responsavel ?>
                    
                </h2>

                <div class="h1_teste">
                    <br> <a c href="financeiro.php"> [ ] Aceito os Termos</a>
                </div>

                <div class="h1_teste2">
                    <br> <a href="fince"> [ ] Quero um novo orçamento</a>
                </div>
            </div>
        </div>
    </div>

  

</body>
</html>