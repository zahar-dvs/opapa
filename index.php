<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<?php
include_once('setting.php');
session_start();
$CONNECT = mysqli_connect(HOST, USER, PASSWORD, DB);

if($_SESSION['USER_LOGIN_IN'] != 1 and $_COOKIE['user']){
    $Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id`, `name`, `regdate`, `email`, `country`, `avatar`, `login` FROM `users` WHERE `password` = '$_COOKIE[user]'"));
    $_SESSION['USER_LOGIN'] = $Row['login'];
    $_SESSION['USER_ID'] = $Row['id'];
    $_SESSION['USER_NAME'] = $Row['name'];
    $_SESSION['USER_REGDATE'] = $Row['regdate'];
    $_SESSION['USER_EMAIL'] = $Row['email'];
    $_SESSION['USER_COUNTRY'] = UserCountry($Row['country']);
    $_SESSION['USER_AVATAR'] = $Row['avatar'];
    $_SESSION['USER_LOGIN_IN'] = 1;
}

if ($_SERVER['REQUEST_URI'] == '/'){
    $Page = 'index';
    $Module = 'index';
    }else{
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path, ' /'));
    $Page = array_shift($URL_Parts);
    $Module = array_shift($URL_Parts);

    if (!empty($Module)){
        $Param = array();
        for ($i = 0; $i < count($URL_Parts); $i++){
            $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
        }
    }
}

function MessageSend($p1, $p2, $p3 = ''){
    if ($p1 == 1) $p1 = 'ERROR';
    else if ($p1 == 2) $p1 = 'Подсказка';
    else if ($p1 == 3) $p1 = 'Информация';
    $_SESSION['message'] = '<div class = "MessageBlock"><b>'.$p1.'</b>: '.$p2.'</div>';
    if($p3) $_SERVER['HTTP_REFERER'] = $p3;
    exit (header('Location: '.$_SERVER['HTTP_REFERER']));
}

function MessageShow(){
    if ($_SESSION['message']) $Message = $_SESSION['message'];
    echo $Message;
    $_SESSION['message'] = array();
}

if ($Page == 'index') include('page/index.php');
else if ($Page == 'register') include('page/register.php');
else if ($Page == 'login') include('page/login.php');
else if ($Page == 'account') include('form/account.php');
else if ($Page == 'profile') include('page/profile.php');
else if ($Page == 'restore') include('page/restore.php');
else if ($Page == 'chat') include('page/chat.php');
else if($Page == 'news'){
    if(!$Module or $Page == 'news' and $Module == 'category' or $Page == 'news' and $Module == 'main') include('module/news/main.php');
    else if($Module == 'material') include('module/news/material.php');
}

function ULogin($p1){
    if($p1 <= 0 and $_SESSION['USER_LOGIN_IN']){
        MessageSend(1, 'Данная страница доступна только для гостей.', '/');
    }else if($_SESSION['USER_LOGIN_IN'] != $p1){
        MessageSend(1, 'Данная страница доступна только для зарегистрированных пользователей.', '/');
    }
}

function UserCountry($p1){
    switch($p1){
        case 1: return 'Украина';
            brake;
        case 2: return 'Россия';
            brake;
        case 3: return 'США';
            brake;
        case 4: return 'Канада';
            brake;
        case 0: return 'Нет данных';
            brake;
        default: return '-';
    }

}

function RandomString($p1){
    $String = '';
    $Char = '0123456789abcdefghijklmnopqrstuvwxyz';
    for($i = 0; $i < $p1; $i++){
        $String .= $Char[rand(0, strlen($Char) - 1)];
    }
    return $String;
}

function HideEmail($p1){
    $Explode = explode('@', $p1);
    return $Explode[0].'@*****';
}

function FormChars($p1){
    return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}

function GenPass($p1, $p2){
    return md5('SashOk'.md5('1125'.$p1.'1125').md5('ca'.$p2.'ca'));
}

function Head($p1){
    echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>'.$p1.'</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="/resource/style.css" rel="stylesheet" />
</head>';
}

function Menu(){
    if($_SESSION['USER_LOGIN_IN'] != 1){
        $Menu = '<a href="/register"><div class="menu">Регистрация</div></a>
                 <a href="/login"><div class="menu">Вход</div></a>';
    }else{
        $Menu = '<a href="/profile"><div class="menu">Профиль</div></a>
                 <a href="/chat"><div class="menu">Чат</div></a>
                 <a href="/account/logout"><div class="menu">Выход</div></a>';

    }

    echo '<div class="menuHead"><a href="/"><div class="menu">Главная</div></a><a href="/news"><div class="menu">Новости</div></a>'.$Menu.'</div>';
}

function Footer(){
    echo ' <footer class="footer">2015 <a href="https://www.youtube.com/channel/UCZ-_KdgvHvy5X8rTDJXYixQ" target="_blank">SashOk</a>. All rights reserved.</footer>';
}

?>