<?php
session_start();
require_once('db_connect.php');

if (isset($_POST['change_password'])) {
    $user_email = $_SESSION['user_email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify if new password and confirm password match
    if ($new_password !== $confirm_password) {
        header("Location: cPassword.php?error=password_mismatch");
        exit();
    }

    // Fetch user's current password from the database
    $query = "SELECT password FROM userinfo WHERE user_email = '$user_email'";
    $result = $connection->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify if the current password matches the one in the database
        if (password_verify($current_password, $hashed_password)) {
            // Hash and update the new password in the database
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE userinfo SET password = '$hashed_new_password' WHERE user_email = '$user_email'";
            $update_result = $connection->query($update_query);

            if ($update_result) {
                header("Location: cPassword.php?success=password_updated");
                exit();
            } else {
                header('Location: cPassword.php?error=update_failed');
                exit();
            }
        } else {
            header("Location: cPassword.php?error=incorrect_current_password");
            exit();
        }
    } else {
        header("Location: cPassword.php?error=user_not_found");
        exit();
    }
}
?>