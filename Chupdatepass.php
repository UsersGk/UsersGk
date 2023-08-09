<?php
session_start();
$old = $_POST['old_password'];
$new = $_POST['new_password'];
$confirm = $_POST['confirm_password'];
include_once('./Database.php'); // Make sure the database connection is established
if (isset($_POST)) {
$sql = "SELECT * FROM login WHERE password='$old'";
$query = mysqli_query($conn, $sql);

$count = mysqli_num_rows($query);

if ($new == $confirm && $count == 1) {
    $update = "UPDATE `login` SET `password`='$new' WHERE password='$old'";
    $updatequery = mysqli_query($conn, $update);

    if ($updatequery) {
        if (session_destroy()) {
            header('location: new.php');
            exit(); // Make sure to exit after redirection
        } // Always exit after redirection
    } else {
         $_SESSION['error_msg'] = "Invalid code or password doesn't match";
    }
} else {
    $_SESSION['error_msg'] = "New password and confirm password do not match or old password is incorrect";
}
}

// Redirect to the appropriate page with an error message, if needed
header('Location: changeupdatepass.php');
exit();
?>
