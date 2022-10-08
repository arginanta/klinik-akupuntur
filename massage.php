<?php

// message.php

$messages = [
    1 => "Data berhasil ditambahkan",
    2 => "Data berhasil diupdate",
    3 => "Data berhasil didelete",
    4 => "MySQL Database Error, silahkan check query yang dimasukan",
];
$messages_id = isset($_GET["message"]) ? (int) $_GET["message"] : 0;

if ($messages_id != 0 && in_array($messages_id, [1, 2, 3, 4])) {
    echo $messages[$messages_id];
}