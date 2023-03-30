<?php

require('testetwig.php');
require('pdo.inc.php');

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['username'] ?? false;
    $response = $pdo->prepare('SELECT * FROM usuarios WHERE nome = ?');
    $response->execute([$nome]);

    if ($response->rowCount()) {
        $user = $response->fetch(PDO::FETCH_ASSOC);
        $token = uniqid(null, true) . bin2hex(random_bytes(16));
         
        $update = $pdo->prepare('UPDATE usuarios SET recupera_token = :token WHERE id=:id_usr');
        $update->execute([
            ':token' => $token,
            ':id_usr' => $user['id']
        ]);
        $msg = 'Senha alterada com sucesso';
        echo $twig->render('altera_senha.html', [
            'msg' => $msg,
            'token'=>$token
        ]);
        die;
    }else{
            $msg = 'MEU DEUS CARA NEM TEU NOME TU SABE KKKKKKKKKKK';
    }
   
} 

echo $twig->render('recupera_senha.html', [
    'msg' => $msg
]);
