<?php

require('verifica_login.php');
require('twig-carregar.php');

$user = $_SESSION['user'];

echo $twig->render('boasvindas.html', [
    "user" => $user
]);