<?php
declare(strict_types=1);

namespace system;

class Router
{
    private $pages = array();

    function addRoute($url, $path): void
    {
        $this->pages[$url] = $path;
    }

    function route($url)
    {
        if (!array_key_exists($url, $this->pages)) {
            require "../public/errors/404.php";
            die();
        }

        $path = $this->pages[$url];
        if ($path !== '') {
            $file_dir = "../resources/views/" . $path;
            if (file_exists($file_dir)) {
                require $file_dir;
            }
        } else
            require "../public/errors/404.php";
        die();
    }
}