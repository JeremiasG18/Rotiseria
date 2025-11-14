<?php 

namespace Jeremias\Rotiseria\controllers;

use Jeremias\Rotiseria\models\Conexion;

class UserController extends Conexion {

    public function listFood() {
        echo 'list food';
    }

    public function createOrder() {
        echo 'create order';
    }

    public function orders() {
        echo 'orders';
    }
    
}