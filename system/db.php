<?php

class Db {
    private $connection;
    private static $db;

    public static function getInstance($option = null){
        if (self::$db == null){
            self::$db = new Db($option);
        }

        return self::$db;
    }

    public function __construct($option = null){

        if ($option != null){
            $host = $option['host'];
            $user = $option['user'];
            $pass = $option['pass'];
            $name = $option['name'];
        } else {
            global $config;
            $host = $config['db']['host'];
            $user = $config['db']['user'];
            $pass = $config['db']['pass'];
            $name = $config['db']['name'];
        }

        $this->connection = new mysqli($host, $user, $pass, $name);
        if ($this->connection->connect_error) {
            echo "Connection failed: " . $this->connection->connect_error;
            exit;
        }

        $this->connection->query("SET NAMES 'utf8'");
    }

    public function first($sql){
        $records = $this->query($sql);
        if ($records == null) {
            return null;
        }

        return $records[0];
    }

    public function modify($sql){
        return $this->connection->query($sql);
    }

    public function insert($sql){
        return $this->connection->query($sql);
    }

    public function query($sql){
        $result = $this->connection->query($sql);
        $records = array();

        if ($result->num_rows == 0) {
            return null;
        }

        while($row = $result->fetch_assoc()) {
            $records[] = $row;
        }

        return $records;
    }

    public function connection(){
        return $this->connection;
    }

    public function close(){
        $this->connection->close();
    }


}

?>