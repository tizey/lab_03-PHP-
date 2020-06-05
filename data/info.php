<!DOCTYPE html>
<html>
<head>
    <title>Новый пользователь</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>
        <!--Заполняю форму данными и перекидываю их на страницу записи пользователей в БД-->
<form name = "test" action = "addproc.php" method = "post">
    <label><p>Login</p> </label>
    <input type = "text" name = "login" placeholder = "Your login">
    <label><p>Password</p> </label>
    <input type = "password" name = "password" placeholder = "Your password">
    <label><p>Name</p> </label>
    <input type = "text" name = "name" placeholder = "Your name">
    <label><p>Surname</p> </label>
    <input type = "text" name = "surname" placeholder = "Your surname">
    <label><p>Language</p> </label>
    <input type = "text" name = "lang" placeholder = "Chose language">
    <label><p>Role</p> </label>
    <input type = "text" name = "role" placeholder = "Register as...">
    <button>Registration</button>
</form>
</body>
</html>