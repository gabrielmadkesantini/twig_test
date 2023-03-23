<?php
    $pass = $_POST['pass'] ?? false;
    if ($pass) {
        
        echo password_hash($pass, PASSWORD_BCRYPT);
    }
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="password" name="pass">
    <br>
    <input type="submit" value="Criptogafia">
</form>