<?php

namespace Yemisi;

use Dotenv\Dotenv;

abstract class Connection
{

    protected $db;

    public function __construct()
    {
        $this->loadDotEnv();
        $this->engine   = getenv('DB_ENGINE');
        $this->name     = getenv('DB_NAME');
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
    }

    private function loadDotEnv(){
        $dotenv = new Dotenv(__DIR__ . '/../');
        $dotenv->load();
    }

    protected function CreateConnection()
    {
        try {
            $this->db = new \PDO($this->engine . ":host=localhost;dbname=" . $this->name, $this->username, $this->password);
        } catch (\Exception $e) {
            die("Cannot connect to database");
        }
    }
}