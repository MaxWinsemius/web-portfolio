<?php namespace portfolio\database;

/**
 * Class DB
 * @package moonconsultancy\database
 */
class DB {
    private $host, $username, $password, $db_name, $pdoClass, $pdo;

    /**
     * @param $host
     * @param $username
     * @param $password
     * @param $db_name
     */
    public function __construct($host, $username, $password, $db_name)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
        $this->pdo = $this->getPDOInstance();
    }

    /**
     * @return \PDO
     * @throws \Exception
     */
    private function getPDOInstance()
    {
        try {
            $this->pdoClass = new \PDO("mysql:dbname=$this->db_name;host=$this->host", $this->username, $this->password);
            $this->pdoClass->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->pdoClass;
        } catch (\PDOException $e) {
            throw new \Exception("DB Connect failed: " . $e->getMessage());
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
            throw new \Exception("DB insert failed: " . $e->getMessage());
        }
    }

    public function receiveQuery($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            throw new \Exception("DB insert failed: " . $e->getMessage());
        }
    }
}