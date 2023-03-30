<?php
require('models/Model.php');
require('models/usuario.php');
require('testetwig.php');
require('models/Models.php');
require('models/Usuario.php');

$templates = $twig->load('list_users.html');
$user = new Usuario();

echo $templates->render([
"users"=> $result_select
]);



