<?php
require('pdo.inc.php');
$user = $_POST['user'];
$pass= $_POST['pass'];
$email = $_POST['mail'];
$user_name = $_POST['user_name'];
$select_value = $_POST['select'];

$pass = password_hash($pass, PASSWORD_BCRYPT);

$sql = $pdo->prepare('INSERT INTO usuarios (nome, email, username, senha, admin, ativo) VALUES (:user, :mail, :username, :pass, :adm, 1)');

$sql->bindParam(':user', $user);
$sql->bindParam(':pass', $pass);
$sql->bindParam(':mail', $email);
$sql->bindParam(':username', $user_name);
$sql->bindParam(':adm', $select_value);

$sql->execute();

if(!$user || !$pass){
    echo "Algum campo não foi preenchido";
    die;
    }else{
        header('location:list_users.php');
    }
