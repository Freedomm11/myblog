<?php

class Route {

    public static function routes() {

        $route = $_SERVER['REQUEST_URI'];

        $data = [
                '/' => 'controllers/homepage.php',
                '/create' => 'controllers/create.php',
                '/show?id='.$_GET['id'] => 'controllers/show.php',
                '/edit?id='.$_GET['id'] => 'controllers/edit.php',
                '/delete?id='.$_GET['id'] => 'controllers/delete.php',
            ];

        if(array_key_exists($route,$data)) {
            include __DIR__ . "/../{$data[$route]}";
        } else {
            dd('404');
        }
    }

}

