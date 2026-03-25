<?php

     class Database{
        private $host = 'localhost';
        private $dbname = 'projekti';
        private $username = 'root';
        private $password = '';
        private $connection;


        public function __construct(){
            try{
                $this->connection=new PDO(dsn: "mysql:host={$this->host};dbname={$this->dbname}",username:$this->username, password:$this->password);
                $this->connection->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e){
                die("Connection failed: ". $e->getMessage());
            }
        }
        public function getConnection(): PDO{
            return $this->connection;
        }
     }

?>