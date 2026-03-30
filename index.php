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
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                            <?php
                            // Captura e sanitiza o parâmetro
                            $pagina = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_SPECIAL_CHARS);
        
                            // Define páginas permitidas (lista branca)
                            include_once 'rotas.php';
        
                            // Página padrão
                            if (empty($pagina)) {
                                $pagina = 'index';
                            }
        
                            // Verifica se está na lista branca
                            if (array_key_exists($pagina, $paginasPermitidas)) {
                                include_once $paginasPermitidas[$pagina];
                            } else {
                                http_response_code(404);
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Erro 404 - Página não encontrada!
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div><!--fim linha conteúdo-->
                    </div>
                </div>
        </div>
    </div>
        <?php include_once 'scripts.php'; ?>
</body>

</html>