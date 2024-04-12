<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Traits\JsonActions;

require "Controller.php";
require "/var/www/app/Traits/JsonActions.php";

class ContactsController extends Controller
{
    use JsonActions;

    public static function index($url, $router): void
    {
        $router->route($url);
    }

    public static function create($data)
    {
        $contacts = ContactsController::read();
        foreach ($contacts as $key => $contact) {
            if (in_array($data['phone'], $contact) === true) {
                $contacts[$key] = array_merge($contact, $data);
                self::putInJson($contacts, 'contacts.json');
                return header("Location: /");
            }
        }

        $contacts[] = $data;
        self::putInJson($contacts, 'contacts.json');

        header("Location: /");
    }

    public static function read()
    {
        return (json_decode(file_get_contents('/var/www/db/json/contacts.json'), true));
    }

    public static function update()
    {

    }

    public static function delete($id): void
    {
        $contacts = ContactsController::read();

        foreach ($contacts as $key => $contact) {
            if ($contact['id'] == $id) {
                unset($contacts[$key]);
            }
        }

        self::putInJson($contacts, 'contacts.json');
        header("Location: /");
    }
}