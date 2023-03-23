<?php

require('pdo.inc.php');
require('twigteste.php');

$id = $_GET['id'];
$select = $pdo->prepare('SELECT * FROM usuarios WHERE ativo != 0');
$SELECT->execute();
$values = $select->fetch('PDO::FETCH_OBJ');

echo $twig->render('update.html', [
'user_values' => $values,
]);
