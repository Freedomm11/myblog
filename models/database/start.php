<?php
$config = include __DIR__.'/../../config.php';
include __DIR__.'/../../models/database/QueryBuilder.php';
include __DIR__.'/../../models/database/Connection.php';

return new QueryBuilder(
    Connection::make($config['database'])
);
?>