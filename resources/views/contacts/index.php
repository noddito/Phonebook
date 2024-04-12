<!doctype HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/contacts.css">
    <link rel="stylesheet" type="text/css" href="assets/css/contacts.css">
    <title>Список контактов</title>
</head>
<body>
    <div class="content">
        <form action="create" method="POST" class="transparent">
            <div class="form-inner">
            <div hidden="">
                <?php use App\Controllers\ContactsController;
                $id = array_key_last(ContactsController::read()) + 1;
                echo ' <input hidden="" value="'.$id.'" name="id"> ';?>
            </div>
            <label for="name">Имя</label>
            <div>
                <input id="name" name="name" type="text" required placeholder="Contact Name">
            </div>
            <label for="phone">Номер телефона</label>
            <div>
                <input id="phone" name="phone" type="tel" pattern="^\7[1-9]{10}$" required placeholder="7-xxx-xxx-xxxx">
            </div>
                <input type="submit" value="Отправить" class="button">
             </div>
        </form>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Действие</th>
            </tr
            </thead>
            <tbody>
            <?php
                $contacts = ContactsController::read();
                foreach ($contacts as $contact) {
                    echo '<form action="delete" method="POST">
                          <tr><td>'.$contact['name'].'</td>';
                    echo '<td>'.$contact['phone'].'</td>';
                    echo ' <input hidden="" type="text" value="'.$contact['id'].'" name="id"> ';
                    echo '<td><input type="submit" id="submit" class="delete button" value="Удалить"></td></tr></form>';
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>