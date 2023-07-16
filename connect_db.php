<?php
$dsn = "mysql:host=localhost;dbname=school_test";    //identifies which host and database name we're connecting to
$user = 'root';  //the default username in phpMyAdmin
$pass = '';      //the default password in phpMyAdmin

try{
    $conn = new PDO($dsn,$user,$pass);   //connection variable we're going to use at the rest og the project
    echo "database is connected successfully";  //confirmation message if we successed
}catch(PDOException $e){          //checking if there's an error
    echo $e ->getMessage();      //give us the shortened error message
}
?>