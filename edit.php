<?php
include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = ("SELECT * FROM students WHERE id = $id");
    $result = mysqli_query($connection, $select);


        $student = mysqli_fetch_assoc($result);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $section = mysqli_real_escape_string($connection, $_POST['section']);
    $studentnumber = mysqli_real_escape_string($connection, $_POST['studentnumber']);

    if (!empty($name) && !empty($section) && !empty($studentnumber)) {
        $update = "UPDATE students SET 
                   name='$name',
                   section='$section',
                   studentnumber='$studentnumber'
                   WHERE id = $id";

        $check_query = mysqli_query($connection, $update);

        if ($check_query) {
        echo '<script>window.location.href="font.php"</script>';
            
        } else {
            echo "Error updating data: " . mysqli_error($connection);
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
</head>
<link rel="stylesheet" href="./font.css">
<body>
    <div class="box1">
  <form method="POST">
    <div class='box'>
    <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required /><br/>
    <input type="text" name="section" value="<?php echo htmlspecialchars($student['section']); ?>" required /><br/>
    <input type="text" name="studentnumber" value="<?php echo htmlspecialchars($student['studentnumber']); ?>" required /><br/>
    <button type="submit">Update</button>
    </div>
  </form>
</div>
</body>
</html>


 