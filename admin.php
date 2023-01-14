 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/style.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </head>
   <body>
    <div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-striped table-hover mt-2">
        <thead class="thead-dark">
            <th>№</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Действие</th>
        </thead>
        <tbody>
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
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['price']; ?></td>
            <td><?php echo $res['description']; ?></td>
            <td>
              <a href="id=<?php echo $res['id']; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res['id']; ?>"><i class="fa fa-edit"></i></a>
              <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
          <!-- Modal edit -->
          <div class="modal fade" id="edit<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Изменить учащиегося</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="edit.php" method="post">
                    <div class="form-group">
                      <small>Название</small>
                      <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Цена</small>
                      <input type="text" class="form-control" name="price" value="<?php echo $res['price']; ?>">
                    </div>
                    <div class="form-group">
                      <small>Описание</small>
                      <input type="text" class="form-control form" name="description" value="<?php echo $res['description']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                  </button>
                  <button type="submit" class="btn btn-primary" name="Edit">Изменить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal edit -->
          <!-- Modal delete -->
          <div class="modal fade" id="delete<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?php echo $res['id']; ?></h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $res['id'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                  </button>
                  <button type="submit" class="btn btn-danger" name="add">Удалить</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal delete -->
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
     <div class="container mt-4">
       <div class="row">
         <div class="col">
           <display-2>Добавление блюда</display-2>
           <form class="form-control" enctype="multipart/form-data" action="add_to_menu.php" method="post">
             <input type="text" class="form-control" name="name"
             id="login" placeholder="Название"><br></br>
             <input type="text" class="form-control" name="price"
             id="name" placeholder="Цена"><br></br>
             <input type="text" class="form-control" name="description"
             id="pass" placeholder="Описание"><br></br>
             <div class="mb-3">
              <input class="form-control" name="picture" type="file" id="formFileDisabled">
              <label for="formFileDisabled" class="form-label">Загрузите изображение</label>
             </div>
             <button class="btn btn-info"
             type = "submit">Добавить</button>
           </form>
           <a href="/exit.php" class="btn btn-danger btn-lg btn-block mt-2" role="button">Выход</a>
         </div>
       </div>
       
     </div>
   </body>
 </html>
