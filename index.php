<?php
  require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      include_once ("conection.php");
      include_once ("./model/product_model.php");
      include_once ("./entity/product.php");

      $connection = new ConnectionDB();
      $peticiones = new ProductModel($connection);

      $productos = $peticiones->get_products();
      
      if ($productos) {
        foreach ($productos as $producto) {
          echo "id: " . $producto['id'] . ", Nombre: " . $producto['name'] . ", Precio: " . $producto['price'] . ", Image: " . $producto["image_url"] . "<br>";
        }
      } else {
        echo "No se encontraron productos.";
      }

      //
      
      $prod = [
        "name" => "pablo",
        "price" => 23,
        "image_url" => "image7",
        "created_at" => date("Y-m-d")
      ];

      $new_product = new Product($prod);
      $post_product = $peticiones->create_products($new_product);
    

      ?>
</body>
</html>