<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * string $table - название таблицы
     * return array
     */

    public function getAll($table) {
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * string $table - название таблицы
     * int $id - id записи
     * return array
     */

    public function getOne($table, $id) {
        $sql = "SELECT * FROM {$table} WHERE id = :id ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    /**
     * string $table - название таблицы
     * string $data - массив данных с ключами и значениями полей таблицы
     */

    public function create($table, $data)
    {
        $keys = implode(',',array_keys($data));
        $tags = ":" . implode(', :',array_keys($data));

        $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }


    /**
     * string $table - название таблицы
     * tring $data - массив данных с ключами и значениями полей таблицы
     * int $id - id записи
     */

    public function update($table, $data, $id) {

        $keys = array_keys($data);
        $string = '';

        foreach ($keys as $key) {
            $string .= $key . '=:' . $key . ',';
        }
        $keys = rtrim($string,',');
        $data['id'] = $id;

        $sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);

        $statement->execute($data);

    }


    /**
     * string $table - название таблицы
     * int $id - id записи
     */

    public function delete($table, $id) {
        $sql = "DELETE FROM {$table} WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);
    }
}

?>