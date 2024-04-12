<?php
declare(strict_types=1);

namespace App\Controllers;
class Controller
{
    public static function index($url, $router): void
    {
        $router->route($url);
    }

    public static function create($data)
    {

    }

    public static function read()
    {

    }

    public static function update()
    {

    }

    public static function delete($id)
    {

    }
}