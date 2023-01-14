<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);

  $mysql = new mysqli('localhost', 'root', 'root', 'cafe');

  $result = $mysql->query("SELECT * FROM `users` WHERE `login` =
  '$login'");

  $user = $result->fetch_assoc();
  if(count($user) == 0) {
    echo "Пользователь не зарегестрирован";
    exit();
  }
  $hash = $user['pass'];
  if (!password_verify($pass, $hash)) {
    echo "Неверный пароль";
    exit();
  }


  setcookie('user', $user['name'], time() + 3600, "/");

  $mysql->close();

  header('Location: /admin.php');

?>
