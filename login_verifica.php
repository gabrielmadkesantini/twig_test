<?php
require('pdo.inc.php');
$user = $_POST['user'];
$pass = $_POST['pass'] ?? false;

if ($pass) {
    echo password_hash($pass, PASSWORD_BCRYPT);
}
//Criar a cansulta e aguarda os dados
$sql = $pdo->prepare('SELECT * FROM usuarios WHERE nome=:usr AND senha=:pass');

//Adiciona os dados da consulta 
$sql->bindParam(':usr', $user);
$sql->bindParam(':pass', $password);

$sql->execute();

$user = $sql->fetch(PDO::FETCH_OBJ);

if($sql->bindParam(':pass', $password)){
    $user = $sql->fetch(PDO::FETCH_OBJ);
    $sql = $pdo->prepare('UPDATE senha FROM usuarios WHERE nome=:usr AND senha=: pass');
}

echo $sql->rowCount();

if ($sql->rowCount()) {
    session_start();
    $_SESSION['user'] = $user->nome;
    header('location: boasvindas.php');
    die;
} else {
    header('location: login.php?erro=1');
}