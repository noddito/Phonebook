<?php
declare(strict_types=1);

require "../app/Controllers/ContactsController.php";

require "../system/Routing.php";

use App\Controllers\ContactsController;
use system\Router;

$url = $_SERVER["REQUEST_URI"];

$router = new Router();

$router->addRoute("/" , "contacts/index.php");
$router->addRoute("/delete" , "contacts/delete.php");
$router->addRoute("/create" , "contacts/create.php");

ContactsController::index($url , $router);
