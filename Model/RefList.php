<?php

namespace Model;

use PDO;

class RefList
{

private $user = 'root';
private $pass = 'root';
private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=cutter;charset=utf8';
        $this->pdo = new PDO($dsn, $this->user, $this->pass);
    }

    /**
     * @param $original
     * @param $cuttetSafe
     * @return void
     */

    public function insertRef($original, $cuttetSafe)
    {

        try
        {

            $sql = "INSERT INTO refs (original, cutted) VALUES ('$original', '$cuttetSafe')";
            $this->pdo->exec($sql);
            if ($this->pdo->connect_error)
            {

                die("Ошибка: " . $this->pdo->connect_error);

            }
        }
        catch (PDOException $e)
        {

            echo "Что то пошло не по плану:" . $e->getMessage();

        }
    }

    /**
     * @param $uri
     * @return void
     */

    public function redirect ($uri) {

        try {
            $sql = 'SELECT original FROM refs WHERE cutted LIKE ' . "'" . $uri . "'";
            $original = $this->pdo->query($sql);
            $result = $original->fetchAll();
            header('Location: ' . $result[0]['original']);
            if ($this->pdo->connect_error) {
                die("Ошибка: " . $this->pdo->connect_error);
            }
        } catch (PDOException $e) {
            echo "Что то пошло не по плану:" . $e->getMessage();
        }
    }

}