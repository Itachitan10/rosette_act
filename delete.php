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

            exit();
        } else {
            echo "Error deleting student.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }
} else {
    echo "No student id specified.";
}

mysqli_close($connection);
?>
