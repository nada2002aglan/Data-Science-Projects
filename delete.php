<?php
require_once('./connect_db.php');

global $conn;

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($GET['Id'])){
        $stmt = $conn->prepare('DELETE FROM students WHERE Id=?');
        $stmt->execute(array($GET['Id']));

        header('location:index.php');
    }
} ///comment
?>


<?php 
include_once('./includes/template/footer.php');
?>