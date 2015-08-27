<?php
ULogin(0);

Head('Вход')
?>

<body>
<div class="wrapper">
    <div class="header"></div>
    <div class="content">
        <?php Menu();
        MessageShow()
        ?>
        <div class="Page">

            <form method="post" action="/account/login">

                <input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-Za-z0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр" required=""><br>
                <input type="password" name="password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z0-9]{5,15}" title="Не менее 5 и не более 20 латинских символов или цифр" required=""><br>
                <div class="capdiv">
                    <img class="capimg" src="/resource/captcha.php" alt="captcha">
                    <input class="capinp" type="text" name="captcha" placeholder="Капча" maxlength="5" pattern="[0-9]{1,5}" title="Введите цифры с изображения" required="">
                </div>
                <input type="checkbox" name="remember">Запомнить меня<br><br>
                <input type="submit" name="enter" value="Вход">
                <input type="reset" value="Очистить">

            </form>

            <br><a href="/restore">Восстановить пароль</a>

        </div>
    </div>
    <?php Footer()?>
</div>
</body>
</html>