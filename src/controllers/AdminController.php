<?php 

namespace Jeremias\Rotiseria\controllers;

use Jeremias\Rotiseria\models\Conexion;
use PDO;

class AdminController extends Conexion {

    public function createFood() {
        $nombre =  isset($_POST['food_name']) ? $_POST['food_name'] : '';
        $precio = isset($_POST['price']) ? $_POST['price'] : '';

        $img = $_FILES['food_image'];
        if (empty($img)){
            $error = "La imagen es obligatoria";
            require_once './src/views/createFood.php';
            // exit;
            return;
        }

        $directorio = "src/uploads/";
        $rutaFinal = "";

        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $rutaFinal = $directorio . uniqid('file_', true) . '_' . str_replace(' ', '_', basename($img['name']));
        
        move_uploaded_file($img['tmp_name'], $rutaFinal);

        $sql = "INSERT comida(nombre, precio, foto_url) VALUES (:nombre, :precio, :foto_url);";
        $stmt = $this->con()->prepare($sql);
        $respuesta = $stmt->execute([':nombre' => $nombre, ':precio' => $precio, ':foto_url' => $rutaFinal]);

        header('Location: http://localhost:8000/admin/listFood/');
    }

    public function listFood() {
        $sql = "SELECT id, nombre, precio, foto_url FROM comida;";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once './src/views/listFood.php';
    }

    public function listOrders() {
        $sql = "SELECT o.id, o.mesa, o.id_comida, c.nombre, c.precio FROM ordenes o INNER JOIN comida c ON o.id_comida = c.id;";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute();
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once './src/views/listOrders.php';
    }

}