<?php

require('testetwig.php');
require('pdo.inc.php');

$token = $_POST['token'] ?? $_GET['token'] ?? false;

if (!$token) {
    header('location:login.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['senha'] ?? false;
    $password_confi = $_POST['passwordConfirm'];

    $password = trim($password);
    $password_confi = trim($password_confi);
    
    if($password === $password_confi){
        $sql = $pdo->prepare('UPDATE usuarios SET senha = :senha AND recupera_token = NULL WHERE recupera_token = :token');
        $sql->execute([
            ':token' => $token,
            ':senha' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        header('location:login.php?erro=3');
        die;
    }else{
       $msg = 'Conseguiu errar denovo'; 
    }
}

$sql = $pdo->prepare('SELECT * FROM usuarios WHERE recupera_token=?');
$sql->execute([
    $token
]);
if ($sql->rowCount() == 1) {
    echo $twig->render('recupera_senha_form.html', [
        'token' => $token,
        'msg'=>$msg
    ]);
} else {
    header('location:login.php');
    die;
}