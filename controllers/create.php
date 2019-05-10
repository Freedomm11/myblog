<?php
$db = include __DIR__.'/../models/database/start.php';

$db->create('posts',[
    'title' => $_POST['title'],
]);

redirect('/');

include __DIR__.'/../views/create.view.php';
?>
