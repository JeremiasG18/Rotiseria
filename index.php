<?php

require_once './vendor/autoload.php';

use Jeremias\Rotiseria\controllers\UserController;
use Jeremias\Rotiseria\controllers\AdminController;

$user = new UserController();
$admin = new AdminController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($_SERVER['REQUEST_URI']) {
            case '/admin/createFood/':
                require_once './src/views/createFood.php';
                break;

            case '/admin/listFood/':
                $admin->listFood();
                break;

            case '/admin/listOrders/':
                $admin->listOrders();
                break;

            case '/user/listFood/':
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $user->listFood();
                break;

            case '/user/createOrder/':
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
                $user->createOrder();
                break;

            case '/user/orders/':
                $id = isset($_GET['id']) ? $_GET['id'] : 0;
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

            case '/user/createOrder/':
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