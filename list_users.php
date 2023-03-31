<?php


require('testetwig.php');
require('models/Usuario.php');

$templates = $twig->load('list_users.html');
$user = new Usuario();
$result_select = $user->getAll();

echo $templates->render([
"users"=> $result_select
]);



