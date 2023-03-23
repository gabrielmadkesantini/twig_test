<?php
require('pdo.inc.php');
require('testetwig.php');

$sql = $pdo->prepare('SELECT * FROM USUARIOS WHERE ATIVO != 0');

$sql->execute();

$result_select = $sql->fetchAll(PDO::FETCH_OBJ);

$templates = $twig->load('list_users.html');

echo $templates->render([
"users"=> $result_select
]);



