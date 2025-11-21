<?php

require_once './vendor/autoload.php';

use Jeremias\Rotiseria\controllers\UserController;
use Jeremias\Rotiseria\controllers\AdminController;

$user = new UserController();
$admin = new AdminController();

$data = $_SERVER['REQUEST_URI'];
$data = explode('/', $data);
$url = '/'.$data[1].'/'.$data[2].'/';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($url) {
            case '/admin/createFood/':
                require_once './src/views/createFood.php';
                break;

            case '/admin/listFood/':
                $admin->listFood();
                break;

            case '/admin/listOrders/':
                $admin->listOrders();
                break;

            case '/Rotiseria/?url=user_listFood/':
                $user->listFood();
                break;

            case '/Rotiseria/?url=user_listOrder/':
                $user->orders();
                break;
            default:
                require_once './src/views/404.php';
                break;
        }
        break;

    case 'POST':
        switch ($_SERVER['REQUEST_URI']) {
            case '/admin/createFood/':
                $admin->createFood();
                break;

            case '/Rotiseria/?url=user_createOrder/':
                // $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $user->createOrder();
                break;
                
            default:
                require_once './src/views/404.php';
                break;
        }
        break;

    default:
        echo 'no exist this method';
        break;
}