<?php
require_once "src/conection.php";
require_once "src/entity/product.php";
require_once "src/models/product_model.php";

$connection = new ConnectionDB();
$peticiones = new ProductModel($connection);

$productos = $peticiones->get_products();

if ($productos) {
    foreach ($productos as $producto) {
        echo "id: " . $producto['id'] . ", Nombre: " . $producto['name'] . ", Precio: " . $producto['price'] . ", Image: " . $producto["image_url"] . "<br>";
    }
} else {
    echo "No se encontraron productos.<br>";
}

$prod = [
    "name" => "pablo",
    "price" => 23,
    "image_url" => "image7",
    "created_at" => date("Y-m-d")
];

$new_product = new Product($prod);
$post_product = $peticiones->create_products($new_product);

require_once "src/views/home.view.php";