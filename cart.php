<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cart</title>
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

  <div class="row">
    <div class="col-auto">
      <table class="table table table-hover mt-2 ms-4">
            <thead class="thead-dark">
              <th>Блюдо</th>
              <th>Цена</th>
              <th>Действие</th>
            </thead>
            <tbody>
              <?php
              $sum = 0;
              $mysql = new mysqli(
                'localhost', 
                'root', 
                'root', 
                'cafe'
               );
               $q = "SELECT * FROM `cart`";
               if (mysqli_query($mysql, $q)) {
                $res0 = mysqli_query($mysql, $q);
                $result = mysqli_fetch_all($res0, MYSQLI_ASSOC);
               } else {
                   echo "Error: ".$q."<br>".mysqli_error($mysql);
               }
               mysqli_close($mysql);  
              ?>
            <?php foreach ($result as $res):

              $mysql = new mysqli(
                'localhost', 
                'root', 
                'root', 
                'cafe'
              );
              $pr_id = $res['product_id'];
              $q = "SELECT * FROM `menu` WHERE `id`='$pr_id'";
              if (mysqli_query($mysql, $q)) {
                $result = mysqli_query($mysql, $q);
                $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
              } else {
                  echo "Error: ".$q."<br>".mysqli_error($mysql);
              }
              mysqli_close($mysql);
              $sum += (int)$post[0]['price'];
            ?>
            <tr>
              <td><?php echo $post[0]['name']; ?></td>
              <td><?php echo $post[0]['price']; ?></td>
              <td>
                <form action="delete_cart.php" method="POST">
                <button type="submit" name="btn" value="<?=$post[0]['id']?>" class="btn btn-danger btn-sm">Удалить</button>
            </form>
            </tr>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
            <td></td>
            <td></td>
            <td>Итого: <?php echo $sum;?></td>
          </tfoot>
      </table>
      <form action="order.php" method="POST">
        <button type="submit" class="btn btn-success btn-lg btn-block ms-4 mt-2" role="button">Заказать</button>
      </form>
    </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>