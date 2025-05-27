
<?php
include('config.php');

if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $section = $_POST['section'];
  $studentnumber = $_POST['studentnumber'];

  $update = "UPDATE students SET name='$name', section='$section', studentnumber='$studentnumber' WHERE id=$id";
  $result = mysqli_query($connection, $update);

  if ($result) {

    echo "<script>window.location.href = 'edit.php';</script>";

    } else {
    echo "Update failed: ";
  }
}
?>
