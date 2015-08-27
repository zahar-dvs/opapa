<?php
ULogin(1);
Head('Профиль пользователя')
?>

<body>
<div class="wrapper">
    <div class="header"></div>
    <div class="content">
        <?php Menu();
        MessageShow()
        ?>
        <div class="Page"">
            <?php
            if($_SESSION['USER_AVATAR'] == 0){
                $Avatar = 0;
            }else{
                $Avatar = $_SESSION['USER_AVATAR'].'/'.$_SESSION['USER_ID'];
            }
            echo
                '<img src="/resource/avatar/'.$Avatar.'.jpg" width="120" height="120" alt="Аватар" align="left">
                 <div class="Block">
                 ID:'.$_SESSION['USER_ID'].'<br>'.
                'Имя: '.$_SESSION['USER_NAME'].'<br>'.
                'Дата регистрации: '.$_SESSION['USER_REGDATE'].'<br>'.
                'E-mail: '.$_SESSION['USER_EMAIL'].'<br>'.
                'Страна: '.$_SESSION['USER_COUNTRY'].'<br>
                 </div>
                 <br>
                 <p>
                    Изменить данные профиля:
                 </p>
                 <br>
                 <form method="post" action="/account/edit" enctype="multipart/form-data">
                    <input type="password" name="opassword" placeholder="Старый пароль" maxlength="15" pattern="[A-Za-z0-9]{5,15}" title="Не менее 5 и не более 20 латинских символов или цифр"><br>
                    <input type="password" name="npassword" placeholder="Новый пароль" maxlength="15" pattern="[A-Za-z0-9]{5,15}" title="Не менее 5 и не более 20 латинских символов или цифр"><br>

                    <input type="text" name="name" placeholder="Имя" maxlength="20" pattern="[A-Za-zА-Яа-я0-9]{3,20}" title="Не менее 3 и не более 20 латинских или кирилических символов или цифр" value = "'.$_SESSION['USER_NAME'].'" required=""><br>

                    <select size="1" name="country">
                    '.str_replace('>'.$_SESSION['USER_COUNTRY'], 'selected>'.$_SESSION['USER_COUNTRY'], '
                        <option value="0">Выбрать страну</option>
                        <option value="1">Украина</option>
                        <option value="2">Россия</option>
                        <option value="3">США</option>
                        <option value="4">Канада</option>').'
                    </select><br>
                    <input type="file" name="avatar"><br><br>
                    <input type="submit" name="enter" value="Сохранить">
                    <input type="reset" value="Очистить">
                 </form>'
            ?>

        </div>
    </div>
    <?php Footer()?>
</div>
</body>
</html>