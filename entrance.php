 <!DOCTYPE html>
 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Вход</title>
     <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/style.css">
   </head>
   <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Кафе</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Меню</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Корзина</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="entrance.php" tabindex="-1">Редактирование</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
     <div class="container mt-4">
       <?php
         if($_COOKIE['user'] == ''):
       ?>
       <div class="row">
         <div class="col">
           <h1>Форма авторизации</h1>
           <form action="auth.php" method="post">
             <input type="text" class="form-control" name="login"
             id="login" placeholder="Введите логин"><br></br>
             <input type="password" class="form-control" name="pass"
             id="pass" placeholder="Введите пароль"><br></br>
             <button class="btn btn-success"
             type = "submit">Войти</button>
           </form>
         </div>
       <?php else: ?>
        
         <p>Здравствуйте, <?=$_COOKIE['user']?>. Вы авторизованы. Для перехода в интерфейс админимстратора нажмите
         <a href="/admin/admin.php"> здесь</a></p>
       <?php endif;?>
       </div>
     </div>