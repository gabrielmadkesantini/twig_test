<form action="new_user_record.php" method="POST">
    <div>
        <input type="text" name="user" id="user" placeholder="Usuário">
    </div>

    <div>
        <input type="password" name="pass" id="password" placeholder="Senha">
    </div>
    <div><input type="text" name="user_name" placeholder="Apelido"></div>
    <div>
        <input type="email" name="mail" placeholder="Email">
    </div>
    <div>
        <select name="select" id="">
            <option value=1>Administrador</option>
            <option value=0>User</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Create">
    </div>

</form>

