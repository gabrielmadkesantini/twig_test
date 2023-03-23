<?php

require("testetwig.php");
require("pdo.inc.php");

$id = $_GET['id'];
$confirm_code = $GET['confirm'] ?? false ;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!$id){
        header('location:list_users.php?erro=3');
        die;
    }else{
        ECHO 'here::::';
        $update = $pdo->prepare('UPDATE USUARIOS SET ATIVO = 0 WHERE id = :id');
        $update->bindParam(':id', $id);
        $update->execute();
        header('location:list_users.php');
        die;
    }
}

$sql = $pdo->prepare('SELECT nome from usuarios where id = ?');
$sql->execute([$id]);
$user = $sql->fetch(PDO::FETCH_OBJ);

echo $twig->render('confirm.html', [
    "id"=>$id,
    "nome"=>$user->nome,
]);