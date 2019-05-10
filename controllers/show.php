<?php
$db = include __DIR__.'/../models/database/start.php';

$post = $db->getOne('posts', $_GET['id']);
redirect('/');

include __DIR__.'/../views/show.view.php';
?>