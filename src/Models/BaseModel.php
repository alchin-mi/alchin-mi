<?php


namespace App\Models;

use PDO;

class BaseModel {
    private $connect;

    public function __construct() {
        $this->setConnect();
    }

    public function getConnect() {
        return $this->connect;
    }

    private function setConnect(): void {
        $this->connect = $this->openConnection();
    }

    private function openConnection(): PDO
    {
        return new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    }

    protected function closeConnection()
    {
        $this->connect = null;
    }
}