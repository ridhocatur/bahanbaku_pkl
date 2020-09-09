<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $conn; //connection
    private $stmt; //statement

    //data source name
    public function __construct()
    {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

        // set the PDO error mode to exception
        $opsi = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $opsi);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function kueri($kueri)
    {
        $this->stmt = $this->conn->prepare($kueri);
    }

    public function bind($param, $value, $type = null)
    {
        if( is_null($type) ) {
            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                break;

                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                break;

                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                break;

                default :
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function ambilSemua()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ambilSatu()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->conn->lastInsertId();
    }
}