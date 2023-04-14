<?php

require('pdo.inc.php');
require('testetwig.php');

$id = $_GET['id'];
$select = $pdo->prepare('SELECT * FROM usuarios WHERE ativo != 0');
$select->execute();
$values = $select->fetch('PDO::FETCH_OBJ');

echo $twig->render('update.html', [
'user_values' => $values,
]);
