<?php 

namespace Jeremias\Rotiseria\controllers;

use Jeremias\Rotiseria\models\Conexion;
use Pdo;

class UserController extends Conexion {
    public function listFood() {
        $sql = "SELECT id, nombre, precio, foto_url FROM comida";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: Application/json');
        http_response_code(200);
        echo json_encode($respuesta);
        exit;
    }

    public function createOrder() {
        $data = json_decode(file_get_contents("php://input"));

        foreach ($data->carrito as $value) {
            $sql = "INSERT INTO ordenes(id_comida, mesa) VALUES (:id_comida, :mesa);";
            $stmt = $this->con()->prepare($sql);
            $stmt->execute([':id_comida' => $value->id, ':mesa' => $data->mesa]);
        }

        echo json_encode("Orden creada exitosamente");
        exit;
    }

    public function orders() {
        $mesa = $_GET['mesa'];
        $sql = "SELECT c.nombre, c.precio FROM ordenes o INNER JOIN comida c ON o.id_comida = c.id WHERE mesa = :mesa";
        // SELECT o.id, o.mesa, o.id_comida, c.nombre, c.precio FROM ordenes o INNER JOIN comida c ON o.id_comida = c.id;
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([':mesa' => $mesa]);
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        echo json_encode($respuesta);
        exit;
    }
    
}