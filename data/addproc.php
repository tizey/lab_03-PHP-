<?php
session_start();
#Подключаюсь к БД
$link = mysqli_connect('localhost', 'root' , '','bd');

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$lang = $_POST['lang'];
$role = $_POST['role'];


if ($login === $_POST['login']) {
	#Заношу даннные полученны методом пост в таблицу БД
    mysqli_query($link, "INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `lang`, `role`) VALUES (NULL, '$login', '$password', '$name', '$surname', '$lang', '$role')"); 
    #вывожу сообщение что всё получилось
    $_SESSION['message'] = 'Регистрация прошла успешно';
    #возвращаю пользователя на страницу авторизации 
    header('location: ../index.php');
}
?>



<head>
    <title>Страница</title>
    <link rel="stylesheet" href="../style.css">
</head>