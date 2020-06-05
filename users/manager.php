<?php
session_start();

include 'C:\Users\Admin\Downloads\Open Server 5.3.5\OSPanel\domains\final-3lb\resources\lang.php';
	
#Ловлю методом GET то что пользователь нажал на exit
if($_GET["exit"])
{
    session_destroy(); #разрушаю сессию
    header("Location: ..\index.php"); #перекидываю пользователя на страницу ввода л/п
}

#Ловлю методом GET то что пользователь нажал на кнопку смены языка
if (isset($_GET['lang'])){
    $_SESSION['user']['lang'] = $_GET['lang'];
}

#if (!(isset($_SESSION['login'])) && (!(isset($_SESSION['password'])))){
  #  session_destroy();
  #  header('location:  ..\index.php');
#}


#Проверяю залогинен ли вообще ХОТЬ КТО-ТО, а так же если это клиент - не пускаю его
if (!(isset($_SESSION['login'])) && (!(isset($_SESSION['password'])))){
    session_destroy();
    header('location:  ..\index.php');
}


if ($_SESSION['user']['role'] == 'client'){
    session_destroy();
    header('location:  ..\index.php');
}





#1 - admin
#2 -manager
#3 - client

if ($_SESSION['user']['role'] == 'admin') {
    $n_rl = 1;
}

if ($_SESSION['user']['role'] == 'manager') {
    $n_rl = 2;
}

if ($_SESSION['user']['role'] == 'client') {
    $n_rl = 3;
}


if ($_SESSION['user']['lang'] == 'ru') {
    echo $lang[0]['ru'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['ru'];
}

if ($_SESSION['user']['lang'] == 'en') {
# code...
    echo $lang[0]['en'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['en'];
}

if ($_SESSION['user']['lang'] == 'ua') {

    echo $lang[0]['ua'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['ua'];

}

if ($_SESSION['user']['lang'] == 'it') {

    echo $lang[0]['it'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[$n_rl]['it'];
}

?>


<head>
    <title>Менеджер</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit"value="Save">
</form>

<form method="GET">
    <input type="submit" name="exit" class= "ex-b" value="Exit">
</form>
<form name = "test" action = "client.php" method = "post">
    <button>Client</button>
</form>

<?php if($_SESSION['user']['role'] == 'admin') { ?>

    <form name = "test" action = "admin.php" method = "post">
        <button>Admin</button>
    </form>

<?} ?>

<?php if($_SESSION['user']['role'] == 'manager') { ?>

  
   <form name = "test" action = "client.php" method = "post">
    <button>Client</button>
    </form>
<?} ?>



</body>

