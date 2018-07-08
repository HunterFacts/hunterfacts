<?php
  if (isset($_POST["submit"])){
    /*Данные записываются в переменные с преобразованием специальных символов и без пробелов*/
    $name = htmlspecialchars(trim($_POST["name"]));
    $mail = htmlspecialchars(trim($_POST["mail"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $check_police = htmlspecialchars(trim($_POST["privace"]));
    $check_news = htmlspecialchars(trim($_POST["privace2"]));
    $error = '';
    $register = 0;
    /*Проверка данных с полей*/
    if ($name != '' and $mail != '' and $password != ''){
      /*Проверка mail*/
      if (stripos($mail, htmlspecialchars('@')) == true){
        /*Проверка длинны пароля*/
        if (strlen ($password) >= 5){
          /*Проверка политики конфендициальности*/
          if ($check_police == "yes"){
            /*В случаи успеха переменная меняется*/
            $register = 1;
          }
          else $error = 'You must accept privacy policy';
        }
        else $error = 'Password length at least 6 characters';
      }
      else $error = 'Your e-mail is incorrect';
    }
    else $error = "Enter data in the fields";
    /*Проверка переменной*/
    if ($register == 1){
      /*Кодируем пароль в мд5 и создаем дату*/
      $new_password = md5($password);
      $data = date("d.m.y");
      /*Проверяем согласился ли пользователь на рассылку*/
      if ($check_news != 'yes'){
        $check_news = 'no';
      }
      /*В случаи успеха регистрируем пользователя и перезагружаем страницу, чтобы предостеречь повторную регистрацию*/
      $mysqli->query("INSERT INTO `users` (`id`, `name`, `mail`, `password`, `data`, `news`) VALUES (NULL, '$name', '$mail', '$new_password', '$data', '$check_news');");
      header ('Location: index.php');
    }
    if ($error != ''){
      /*В случаи неудачи выдаем пользователю ошибку*/
      $error = '<br /><span style="color: red;" class="No-credit-card-requi-Copy">'.$error.'</span>';
    }
  }
?>
