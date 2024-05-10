<?php

  include_once("./entity/product.php");

  class ProductModel {
    private $db;

    function __construct(ConnectionDB $connectionDB)
    {
      $this->db = $connectionDB;
    }

    function get_products(): array {
      try {
        $this->db->connect();
        $conection = $this->db->get_connection();
        if (!$conection) {
          throw new Exception("Error de conexión a la base de datos");
        }
  
        $query = "SELECT * FROM product";
        $prepare = $conection->prepare($query);
        if (!$prepare) {
          throw new Exception("Error al preparar la consulta SQL");
        }
  
        $prepare->execute();
        $response = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $this->db->disconnect();
        return $response;
        
      } catch (Exception $e) {
        echo "Error al obtener los productos: " . $e->getMessage();
      }

    }

    function create_products($product): bool {
      try {
        $this->db->connect();
        $conection = $this->db->get_connection();
        if (!$conection) {
          throw new Exception("Error de conexión a la base de datos");
        }

        $query = "INSERT INTO product(name, price, image_url, created_at) VALUES (:name, :price, :image_url, :created_at)";
        $prepare = $conection->prepare($query);
        if (!$prepare) {
          throw new Exception("Error al preparar la consulta SQL");
        }

        foreach ($product as $key => $value) {
          $prepare->bindValue(':' . $key, $value);
        }

        $prepare->execute();
        $this->db->disconnect();
        echo "Producto insertado correctamente";
        return true;
      } catch (Exception $e) {
        echo "Error al insertar el producto: " . $e->getMessage();
        return false;
      }
    }

    function update_products() {}

    function delete_products() {}

  }

?>