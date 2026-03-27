<?php

class Content{
    private $connection;

    public function __construct($db){
        $this->connection=$db;
    }

    public function getSection($key){
        $query= "SELECT * FROM about_sections WHERE section_key=:key LIMIT 1";
        $stmt=$this->connection->prepare($query);
        $stmt->bindParam(':key', $key);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getWhyUSPoints(){
        $query="SELECT * FROM about_sections WHERE section_key LIKE 'why_us_%' AND section_key != 'why_us_main'";
        $stmt=$this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllInstructors(){
        $query="SELECT * FROM instructors";
        $stmt=$this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}

?>