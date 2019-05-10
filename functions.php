<?php

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
    die;
}

function redirect($url) {
    if(isset($_POST['add_post']) or isset($_POST['edit']) or isset($_POST['delete'])) {
        header("Location: $url");
        exit;
    };
}
?>