<?php
$page_title = 'Add New Student';            // dynamic variable been played on the top of each page
$css_file = 'style.css';                    //reading css file before executing the header file
include_once('./includes/template/header.php'); // executing header file
require_once('./connect_db.php');               // get connected to the database

global $conn;                                  // global variable to deal with database and execute queries

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){  //if condition to check if there's a request and to check if it's method is post or not
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);                 //storing the inputs into variables using the $_POST approach
$age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);                   //filter_var is used to filter input from special charaecter which may be used in some hacking techniques.
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);               //FILTER_SANITIZE_STRING is used to sanitize a string based on it's type
$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

$stmt = $conn->prepare("INSERT INTO students(name, age, phone, address) value(?,?,?,?)"); //preparing a query to store the data been held in the previous variables 
$stmt->execute(array($name,$age,$phone,$address)); //executing this query by passing the variables in an array to replace the ? in the query by their values.
header("Refresh:3;url=add.php"); //used to redirect the user to the same page after 3 sec, incase he wanted to add another student
}
?>

 <!-- Form for user to fill it with student info and it been put into container  -->
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
<div class="container mt-5">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Age</label>
    <input type="number" name="age" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">phone</label>
    <input type="tel" name="phone" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" name="address" class="form-control">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>


<?php include_once("./includes/template/footer.php");  //including footer file in every single page of the project
 ?>

