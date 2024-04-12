<?php
declare(strict_types=1);

use App\Controllers\ContactsController;

ContactsController::delete($_POST['id']);