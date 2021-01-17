<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // PDO::ATTR_EMULATE_PREPARES   => false // For General Error
        );

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            // print_r($this->pdo);
            // echo "Success";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function create ($table,$data)
    {
        try {
            $column = array_keys($data);
            $columnSql = implode(',', $column);
            $bindingSql = ':' . implode (',:', $column); // :name,:email,:password 
            $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
            $stmt = $this->pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(':'. $key, $value);
            }
            
                $status = $stmt->execute();
            
            return ($status) ? $this->pdo->lastInsertId() : false;
        }catch (PDOException $e) {
            echo $e;
        }
    }

        public function readAll($table)
        {
            $sql = 'SELECT * FROM ' .$table;
            // echo $sql;
            $stmt = $this->pdo->prepare($sql);
            $success = $stmt->execute();
            $row = $stmt->fetchAll();
            return ($success) ? $row : [];
        }

}