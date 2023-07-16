<?php
$page_title = 'Student info';
$css_file = 'style.css';
include_once('./includes/template/header.php');
require_once('./connect_db.php');

global $conn;

$stmt = $conn->prepare('SELECT * FROM students');
$stmt->execute();
$students = $stmt->fetchAll();

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($students as $student){ ?>
    <tr>
      <td><?php echo $student['Id']?></td>
      <td><?php echo $student['name']?></td>
      <td><?php echo $student['age']?></td>
      <td><?php echo $student['phone']?></td>
      <td><?php echo $student['address']?></td>
      <td><a class="btn btn-danger" href="delete.php?Id=<?php echo $student['Id']?>">Delete</a></td>
    </tr>
    <?php } ?>

  </tbody>
</table>

<a href="add.php">Add Student</a>

<?php 
include_once('./includes/template/footer.php');
?>