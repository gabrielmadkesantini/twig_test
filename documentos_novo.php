
<?php
require('testetwig.php');
require('func/sintize_file.php');
require('verify_file.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !$_FILES['arquivo']['error']){
$arquivo = sintize_filename($_FILES['arquivo']['name']);

$arquivo = verifica_nome_arquivo($_FILES['arquivo']['tmp_name'], 'uploads/'.$arquivo);
}
    
echo $twig->render('documentos_novo.html');