<?php
include('config.php');

 $name = trim(mysqli_real_escape_string($connection, $_POST['name']));
    $section = trim(mysqli_real_escape_string($connection, $_POST['section']));
    $studentnumber = trim(mysqli_real_escape_string($connection, $_POST['studentnumber']));  
    $insert = "INSERT INTO students(name,section,studentnumber) VALUES( ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert);

        if($stmt){ 
        mysqli_stmt_bind_param($stmt, "ssi", $name, $section, $studentnumber);

        if(mysqli_stmt_execute($stmt)){ 
              echo '<script>alert("successfull insert")</script>';
            echo '<script>window.location.href = "font.php";</script>';

        } else { 
            echo "<script>alert('Failed to execute statement.')</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failed to prepare statement.')</script>";
    }

    mysqli_close($connection);
?>