<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Меню</title>
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
            <a class="nav-link active" href="cart.php">Корзина</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="entrance.php" tabindex="-1">Редактирование</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-2">
    <form>
      <div class="row row-cols-auto">
        <?php
              $mysql = new mysqli(
            'localhost', 
            'root', 
            'root', 
            'cafe'
           );
           $q = "SELECT * FROM `menu`";
           if (mysqli_query($mysql, $q)) {
            $res0 = mysqli_query($mysql, $q);
            $result = mysqli_fetch_all($res0, MYSQLI_ASSOC);
           } else {
               echo "Error: ".$q."<br>".mysqli_error($mysql);
           }
          ?>
        <?php foreach ($result as $res): ?>
        <div class="col md-2 gap-3">
          <div class="card" style="width: 18rem;height: 30rem;">
            <img src="<?php echo $res['path'];?>" class="card-img-top" alt="<?php echo 
            $res['name'];?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $res['name'];?></h5>
              <p class="card-text"><?php echo $res['description'];?></p>
              <form action="add_to_cart.php" method="POST" class="align-bottom">
                <button type="submit" name="buy" class="btn btn-primary" value="<?php echo $res['id'];?>">В корзину</button>
              </form>
            </div>
            <div class="card-footer"><?php echo $res['price'];?></div>
          </div>
        </div>
        <?php endforeach;?>

      </div>
    </form>
  </div>  
    

 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>