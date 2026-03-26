<?php

require_once 'Database.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])){
    $db=new Database();
    $connection=$db->getConnection();
    $email=$_POST['email'];

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $query="INSERT INTO newsletter(email) VALUES (:email)";
        $stmt=$connection->prepare($query);
        $stmt->bindParam(':email', $email);

        if($stmt->execute()){
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?status=success");
            exit();
        }
    }
}
header("Location: " . $_SERVER['HTTP_REFERER'] . "?status=error");
exit();

?>