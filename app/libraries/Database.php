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
            // $this->error = $e->getMessage();
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

        public function update($table,$id,$data)
        {
            if (isset($data['id'])){
                unset($data['id']);
            }
            $columns = array_keys($data);
            function map($item)
            {
                return $item . '=:' . $item;
            }
            $columns = array_map('map', $columns);
            $bindingSql = implode(',', $columns);
            $sql = 'UPDATE ' . $table . ' SET ' . $bindingSql . ' WHERE `id`=:id';
            $stmt = $this->pdo->prepare($sql);
            $data['id'] = $id;
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $status = $stmt->execute();
            return $status;

        }

    public function getById($table,$id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `id`= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $success = $stmt->execute();
        $row = $stmt->fetch();
        return ($success) ? $row : [];
    }

    public function getProductById($table,$id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `product_id`= :product_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':product_id',$id);
        $success = $stmt->execute();
        $row = $stmt->fetch();
        return ($success) ? $row : [];
    }


	public function getActiveProductData()
	{
		$sql = 'SELECT * FROM `products` WHERE `availability` = :availability ORDER BY `product_id` DESC';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':availability',1);
        $success = $stmt->execute();
        $row = $stmt->fetchAll();
        return ($success) ? $row : [];
	}


    public function productUpdate($table,$id,$data)
    {
        if (isset($data['product_id'])){
            unset($data['product_id']);
        }
        $columns = array_keys($data);
        function item_map($item)
        {
            return $item . '=:' . $item;
        }
        $columns = array_map('item_map', $columns);
        $bindingSql = implode(',', $columns);
        $sql = 'UPDATE ' . $table . ' SET ' . $bindingSql . ' WHERE `product_id`=:product_id';
        $stmt = $this->pdo->prepare($sql);
        $data['product_id'] = $id;
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $status = $stmt->execute();
        return $status;
        
    }

    public function deleteProduct($table,$id)
    {
        $sql = 'DELETE FROM '. $table . ' WHERE `product_id`=:product_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':product_id',$id);
        $success = $stmt->execute();
        return $success;  
    }


    public function delete($table,$id)
    {
        $sql = 'DELETE FROM '. $table . ' WHERE `id`=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $success = $stmt->execute();
        return $success;  
    }

    public function loginCheck($table, $column1, $value1,$column2, $value2) 
    {
        $sql = 'SELECT * FROM ' . $table . '  WHERE `' . $column1 . '` = :value1 AND `' .$column2 . '` = :value2';
        // echo $sql;
        // $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':value1',$value1,PDO::PARAM_STR);
        $stmt->bindParam(':value2',$value2,PDO::PARAM_STR);
        $login_success = $stmt->execute();
        $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r( $user_row);
        return ($login_success) ? $user_row : [];
   
    }

}