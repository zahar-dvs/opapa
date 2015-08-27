<?php
ULogin(0);

Head('Регистрация')?>
<body>
<div class="wrapper">
    <div class="header"></div>
    <div class="content">
        <?php Menu();
        MessageShow()
        ?>

        <div class="Page">
        <form method="post" action="/account/register">
            <input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-Za-z0-9]{3,10}" title="Не менее 3 и не более 10 латинских символов или цифр" required=""><br>
            <input type="email" name="email" placeholder="E-mail" required=""><br>
            <input type="password" name="password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z0-9]{5,15}" title="Не менее 5 и не более 20 латинских символов или цифр" required=""><br>
            <input type="text" name="name" placeholder="Имя" maxlength="20" pattern="[A-Za-zА-Яа-я0-9]{3,20}" title="Не менее 3 и не более 20 латинских или кирилических символов или цифр" required=""><br>

            <select size="1" name="country" required="">
                <option value="0">Выбрать страну</option>
                <option value="1">Украина</option>
                <option value="2">Россия</option>
                <option value="3">США</option>
                <option value="4">Канада</option>
            </select><br>
            <div class="capdiv">
            <img class="capimg" src="/resource/captcha.php" alt="captcha">
            <input class="capinp" type="text" name="captcha" placeholder="Капча" maxlength="5" pattern="[0-9]{1,5}" title="Введите цифры с изображения" required="">
            </div>
            <input type="submit" name="enter" value="Регистрация">
            <input type="reset" value="Очистить">
        </form>
        </div>

    </div>
    <?php Footer()?>
</div>
</body>
</html>
