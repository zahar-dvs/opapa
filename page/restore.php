<?php
ULogin(0);

Head('Восстановление пароля')
?>

<body>
<div class="wrapper">
    <div class="header"></div>
    <div class="content">
        <?php Menu();
        MessageShow()
        ?>
        <div class="Page">

            <form method="post" action="/account/restore">

                <input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-Za-z0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр" required=""><br>
                <div class="capdiv">
                    <img class="capimg" src="/resource/captcha.php" alt="captcha">
                    <input class="capinp" type="text" name="captcha" placeholder="Капча" maxlength="5" pattern="[0-9]{1,5}" title="Введите цифры с изображения" required="">
                </div>
                <input type="submit" name="enter" value="Восстановить">
                <input type="reset" value="Очистить">

            </form>

        </div>
    </div>
    <?php Footer()?>
</div>
</body>
</html>