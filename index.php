<?php
setlocale(LC_TIME, "pt-BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
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
        <?php
        $pagina = filter_input(INPUT_GET, 'p');
        if (empty($pagina)) {
            include_once 'home.php';
        } else {
            if (file_exists($pagina . '.php')) {
                include_once $pagina . '.php';
            } else {
                echo "Erro 404 - página não encontrada!";
            }
        }
        ?>
    </div>
        </div>
    </div>
    <?php include_once 'scripts.php'; ?>
</body>

</html>