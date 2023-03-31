<?php
require('testetwig.php');
require('models/Usuario.php');

$id = $_GET['id'] ?? false;


$user = new Usuario();

$result_select = $user->findOne($id);
var_dump($result_select);

echo $twig->render('see_user.html', [
"users"=> $result_select
]);