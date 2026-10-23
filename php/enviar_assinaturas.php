<?php 
$caminhoJson = __DIR__ . "/../orcamento.json";
$orcamentos = [];

if (file_exists($caminhoJson)) {
    $conteudoJson = file_get_contents($caminhoJson);
    $orcamentos = json_decode($conteudoJson, true);
}

$nomeDaSoft = "Five Devs e Um Sonho";

// Pega o indice vindo pela URL ou pelo Formulario
if (isset($_GET["indice"])) {
    $indice = $_GET["indice"];
} else if (isset($_POST["indice"])) {
    $indice = $_POST["indice"];
} else {
    $indice = "";
}

// Lógica ao clicar em Aceitar ou Rejeitar
if (isset($_POST["opcao"])) {
    $opcao = $_POST["opcao"];

    if ($opcao == "aceitar") {
        $orcamentos[$indice]["pago"] = true;
        $orcamentos[$indice]["status"] = "Aprovado";
    } 
    else if ($opcao == "rejeitar") {
        $orcamentos[$indice]["valor"] = "";
        $orcamentos[$indice]["pago"] = false;
        $orcamentos[$indice]["status"] = "Rejeitado";
    }

    // Salva a alteração no orcamento.json
    $jsonAtualizado = json_encode($orcamentos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($caminhoJson, $jsonAtualizado);

    // Redireciona de volta
    header("Location: cliente.php");
    exit;
}

// Carrega os dados do item selecionado
if ($indice !== "" && isset($orcamentos[$indice])) {
    $responsavel = $orcamentos[$indice]["responsavel"];
    $nomeProjeto = $orcamentos[$indice]["nomeProjeto"];
    $prazo       = $orcamentos[$indice]["prazo"];
    $valor       = "R$ " . $orcamentos[$indice]["valor"];
} else {
    $responsavel = "Cliente Não Informado";
    $nomeProjeto = "---";
    $prazo       = "---";
    $valor       = "R$ 0,00";
}
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
    </nav>

    <div class="terms">
        <div class="termos">
            <div class="test_ass">
                <h1>Termos e Condições</h1>
                <h2>
                    A empresa <?php echo $nomeDaSoft; ?>, garante que o uso das informações do contratante <?php echo $responsavel; ?> são confidenciais, garantindo seu armazenamento 
                    e acesso somente ao pessoal autorizado. Informamos também que o contratante tem até 3 edições no projeto sem custo adicional.
                    Fica da total ciência do contratante que o projeto <?php echo $nomeProjeto; ?> no valor de <?php echo $valor; ?> será entregue no prazo de <?php echo $prazo; ?>.
                </h2>

                <h1>Aceitação dos Termos</h1>
                
                <h2>
                    Diante das diretrizes da Empresa Credora: <?php echo $nomeDaSoft; ?>, entendo e aceito seus termos.
                    Garantindo que as informações e valores pagos são do meu conhecimento, 
                    como também a assinatura deste documento e seu uso como comprovante.

                    <br><br>Assinado Empresa Credora: <?php echo $nomeDaSoft; ?>
                    <br>Assinado Cliente: <?php echo $responsavel; ?>
                </h2>

                <form method="POST">
                    <input type="hidden" name="indice" value="<?php echo $indice; ?>">

                    <div class="h1_teste">
                        <br>
                        <button type="submit" name="opcao" value="aceitar" style="background: none; border: none; color: inherit; cursor: pointer; font-size: inherit;">[ X ] Aceito os Termos</button>
                    </div>

                    <div class="h1_teste2">
                        <br>
                        <button type="submit" name="opcao" value="rejeitar" style="background: none; border: none; color: inherit; cursor: pointer; font-size: inherit;">[ X ] Quero um novo orçamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>