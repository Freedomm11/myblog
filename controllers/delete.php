<?php
$db = include __DIR__.'/../models/database/start.php';

$db->delete('posts', $_GET['id']);

header('Location: /');
?>