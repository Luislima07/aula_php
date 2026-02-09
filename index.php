
<?php 
    setlocale(LC_TIME,"pt-BR","pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
    date_default_timezone_set(timezoneId: 'America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <?php include_once 'cabecalho.php'; ?>
</head>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container mt-3">
    <div class="alert alert-primary">
        <?php 
        echo"Seja bem-vindo";
        ?>

        <?php 
        $var = 10;
        if ($var == 0) {
            $mensagem = "Valor = 10";
        }else if ($var > 10) {
            $mensagem = "Valor > 10a";
        }
        ?>
    </div>
        <div class="card" style="width: 18rem;">
            <img src="https://images.cults3d.com/7LvplDjBFpk73mGPa6up5UXHix0=/516x516/filters:no_upscale():format(webp)/https://fbi.cults3d.com/uploaders/46726640/illustration-file/60068f76-8706-4ed6-bbda-31756a184406/ChatGPT-Image-21-de-dez.-de-2025%2C-22_45_14.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <?php include_once 'scripts.php'; ?>
</body>
</html>