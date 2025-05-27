<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Form</title>
  <link rel="stylesheet" href="./font.css"/>
</head>
<body>

<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $select = "SELECT * FROM students WHERE id = ?";
  $stmt = mysqli_prepare($connection, $select);

  if($stmt){
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $stmt_result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($stmt_result);

    if($result){
?>
  <!-- Edit Form -->
  <div class="box1">
    <form action="update.php" method="POST">
      <div class="box">
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
        <input type="text" name="name" placeholder="Name" value="<?php echo $result['name']; ?>" required /><br/>
        <input type="text" name="section" placeholder="Section" value="<?php echo $result['section']; ?>" required /><br/>
        <input type="text" name="studentnumber" placeholder="Student Number" value="<?php echo $result['studentnumber']; ?>" required /><br/>
        <button type="submit" name="edit">Update</button>
      </div>
    </form>
  </div>
<?php
    }
    mysqli_stmt_close($stmt);
  }
}else{
?>
  
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
<?php
}
?>
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
    <tbody>
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
            <a href="font.php?id=<?php echo $display['id'];?>"><button type="button">Edit</button></a>
            <a href="delete.php?id=<?php echo $display['id'];?>" onclick="return confirm('Are you sure you want to delete this student?');"><button type="button">Delete</button></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
