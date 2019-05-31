<?php
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['new_name'];
        $password = $_POST['new_password'];

        include "connect.php";

        $query = "INSERT INTO users(username, password)";
        $query .= " VALUES('$username', '$password')";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: signin.php");
        }else{
            die("Query error");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign up</h1>
    <form action="signup.php" method="POST">
        <label for="new_name">Username: </label><input type="text" name="new_name" id="new_name" required>
        <br>
        <label for="new_password">Password: </label><input type="password" name="new_password" id="new_password" required>
        <br>
        <!-- <label for="confirm_password">Confirm password: </label><input type="password" id="confirm_password"> -->
        <br>
        <input type="submit" id="signup-submit" name="submit" value="submit">
        <p>Already have an account? <span><a href="signin.php">Login here.</a></span></p>

    </form>
</body>
</html>