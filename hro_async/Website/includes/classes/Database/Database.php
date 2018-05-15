<?php

namespace campers\Database;

class Database {
    private $host, $username, $password, $db_name, $pdoClass, $pdo;

    public function __construct()
    {
        //DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME
        $this->host = DB_HOST;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->db_name = DB_DATABASE_NAME;
        $this->pdo = $this->getPDOInstance();
    }

    /**
     * @return \PDO
     * @throws \Exception
     */
    public function getPDOInstance()
    {
        try {
            $this->pdoClass = new \PDO("mysql:dbname=$this->db_name;host=$this->host", $this->username, $this->password);
            $this->pdoClass->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->pdoClass;
        } catch (\PDOException $e) {
            throw new \Exception("DB open failed: " . $e->getMessage());
        }

    }

    /**
     * Executes the query without giving values back
     *
     * @param $query
     * @return bool
     * @throws \Exception
     */
    public function executeQuery($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return true;
        } catch (\PDOException $e) {
            throw new \Exception("DB execute failed: " . $e->getMessage());
        }
    }

    /**
     * Executes the query and returns the values
     *
     * @param $query
     * @return array
     * @throws \Exception
     */
    public function getAsArray($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            throw new \Exception("DB receive failed: " . $e->getMessage());
        }
    }
}