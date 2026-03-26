<?php

class user{
    private $connection;
    private $table_name = 'user';
    
    public function __construct($db){
        $this->connection = $db;
    }

    public function register($name, $surname, $email, $password):bool{
        $query = "INSERT INTO {$this->table_name} (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash(password: $password, algo: PASSWORD_DEFAULT));

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function login($email, $password):bool{
        $query = "SELECT id, name, surname, email, password,role FROM {$this->table_name} WHERE email = :email";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify(password: $password, hash: $row['password'])){
                if(session_status() === PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name']=$row['name'];
                $_SESSION['role']=$row['role'];
                return true;
            }
        }
        return false;
    }
}

?>