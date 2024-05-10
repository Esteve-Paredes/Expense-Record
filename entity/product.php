<?php
class Product {
  public int $id;
  public string $name;
  public int $price;
  public string $image_url;
  public string $created_at;

  public function __construct($product)
  {
    $this->id = $product["id"];
    $this->name = $product["name"];
    $this->price = $product["price"];
    $this->image_url = $product["image_url"];
    $this->created_at = $product["created_at"];
  }

}
?>