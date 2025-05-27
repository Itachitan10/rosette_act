<?php
session_start();
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Student List</title>
  <link rel="stylesheet" href="./font.css"/>
</head>
<body>

  <div class="box1">
    <form action="insertdata.php" method="POST">
      <div class="box">
        <input type="text" name="name" placeholder="Name" required /><br/>
        <input type="text" name="section" placeholder="Section" required /><br/>
        <input type="text" name="studentnumber" placeholder="Student Number" required /><br/>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
<h1>Student List</h1>
<div class="container">
  <table cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>Name</th>
        <th>Section</th>
        <th>Student Number</th>
        <th>Actions</th>
      </tr>
    </thead>

  <?php
  
  $select = "SELECT * FROM students";
$check = mysqli_query($connection, $select);
$students = mysqli_fetch_all($check, MYSQLI_ASSOC);
  foreach ($students as $display) { ?>
    <tr>
      <td><?php echo $display['name']; ?></td>
      <td><?php echo $display['section']; ?></td>
      <td><?php echo $display['studentnumber']; ?></td>
      <td>
        <a href="font.php?id=<?php echo $display['id']; ?>"><button type="button">Edit</button></a>
     <a href="delete.php?id=<?php echo $display['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">
      <button type="button">Delete</button>
        </a>
      </td>
    </tr>


  <?php } ?>

</table>

</body>
</html>
