<html lang="ru">
<head>
    <title>Удаление</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>

<?php
session_start();

#Подключаюсь к БД
$link = mysqli_connect('localhost', 'root' , '','bd');
#Делаю запрос на то что бы вытащить конкретного пользователя для дальнейших манипуляций
$sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");

if (isset($_GET['del_id'])) {

    $sql = mysqli_query($link, "DELETE FROM `users` WHERE `id` = {$_GET['del_id']}");
    if ($sql) {
        echo "<p>Пользователь удален.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

if (isset($_GET['red_id'])) {
    $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");
    $user = mysqli_fetch_array($sql);
}

?>

<table style="border: 2px solid #D5D5D5; background: #EEEEEE">
    <tr>
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Role</td >
        <td > Удаление</td >
    </tr >

    <?php
    $sql = mysqli_query($link, 'SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users`');
    while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
            "<td>{$result['id']}</td>" .
            "<td>{$result['name']}</td>" .
            "<td>{$result['surname']}</td>" .
            "<td>{$result['login']}</td>" .
            "<td>{$result['password']}</td>" .
            "<td>{$result['lang']}</td>" .
            "<td>{$result['role']}</td>" .
            "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
            '</tr>';
    }
    ?>
</table>
</body>
</html>