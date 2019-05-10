<?php
$db = include __DIR__.'/../models/database/start.php';

$post = $db->getOne('posts', $_GET['id']);

$db->update('posts', [
    'title' => $_POST['title']
], $_GET['id']);

redirect('/');

include __DIR__.'/../views/edit.view.php';
?>