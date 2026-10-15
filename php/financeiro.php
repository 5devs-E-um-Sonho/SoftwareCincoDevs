<!-- COMMIT FEITO POR DANIEL -->

<?php 
require_once "orcamento.php";   
if (isset($_POST["pagar"])) 
//VERIFICA SE(if) O VALOR EXISTE/FOI PAGO(isset)
{   
    $indice = $_POST["indice"];

    $conteudoJson = file_get_contents(__DIR__ . "/orcamentos.json");
    $orcamentos = json_decode($conteudoJson, true);

    if (isset($orcamentos[$indice])) 
    //VERIFICA SE QUAL VALOR DEVE SER ALTERADO: FALSE PARA TRUE
    {
        $orcamentos[$indice]["pago"] = true;

        $jsonAtualizado = json_encode(
            $orcamentos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        file_put_contents(__DIR__ . "/orcamentos.json",$jsonAtualizado);
    }
} 

$conteudoJson = file_get_contents(__DIR__ . "/orcamentos.json");
$orcamentos = json_decode($conteudoJson, true);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/financeiro.css">
    <title>Financeiro</title>
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

    <!-- Cabeçalho principal -->
     <div class="cabecalho">
        <h1>FINANCEIRO</h1>
        <p>Consulte os projetos que ainda aguardam confirmação de pagamento</p>
    </div>

    <div class="orcamento">

        
    <?php 
        foreach($orcamentos as $indice => $orcamento){
    ?>
        
        <p>Responsavel: <?= $orcamento["responsavel"]?></p>
        <p>Empresa: <?= $orcamento["empresa"]?></p>
        <p>Nome do projeto: <?= $orcamento["nomeProjeto"]?></p>
        <p>Projeto: <?= $orcamento["projeto"]?></p>
        <p>Telefone: <?= $orcamento["telefone"]?></p>
        <p>Email: <?= $orcamento["email"]?></p>
        <p>Prazo: <?= $orcamento["prazo"]?></p>

        <?php 
            if($orcamento["pago"] == false){
        ?>

        <form method="POST">
            
            <input type="hidden" name="indice" value="<?= $indice; ?>">   

            <button class="submit" name="pagar">
                O PAGAMENTO JÁ FOI EFETUADO: ATUALIZAR
            </button>
            
        </form>

        <?php }} ?>

        

    <?php if(empty($orcamentos)) { ?>
        
            <h2>Nenhum orçamento foi efetuado ainda</h2>
        
    <?php } ?>
            
    </div>
</body>
</html>