<?php
declare(strict_types=1);

namespace App\Traits;

trait JsonActions
{
    public static function putInJson($contacts , string $json_file): void
    {
        file_put_contents('/var/www/db/json/' . $json_file, json_encode($contacts, JSON_PRETTY_PRINT));
    }
}