<?php
require('pdo.inc.php');
require('models/Usuario.php');
$user = $_POST['user'];
$pass= $_POST['pass'];
$email = $_POST['mail'];
$user_name = $_POST['user_name'];
$select_value = $_POST['select'];

$pass = password_hash($pass, PASSWORD_BCRYPT);
echo $user;
$usr = new Usuario();

$usr->create([
   'username' => $user_name,
   'nome' =>  $user,
   'email' => $email,
   'admin' => $select_value,
   'senha' => $pass,
   'ativo' => 1
]);

if(!$user || !$pass){
    echo "Algum campo não foi preenchido";
    die;
    }else{
        header('location:list_users.php');
    }
