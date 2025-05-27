<?php
session_start();
include('config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $delete = "DELETE FROM students WHERE id = ?";
    $stmt = mysqli_prepare($connection, $delete);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
           echo '<script>window.location.href="font.php"</script>';
        } else {
            echo "Error deleting student.";
        }

    } else {

    }
} else {

}

mysqli_close($connection);
?>
