<?php
    session_start();
    if(isset($_POST['username'])){

        include "connect.php";

        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $query = "SELECT * FROM users where username='$username' and password='$password'";
        $result = mysqli_query($connection, $query) or die(mysqli_error());
        $info = mysqli_fetch_assoc($result);
        if($info){
            $_SESSION['username'] = $username;
	        header("Location: index.php");
        }else{
            echo "Incorrect username or password!!";
        }

        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
</head>
<body>
    <h1>Sign in</h1>
    <form action="signin.php" method="POST">
        <label for="username">Username: </label><input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password: </label><input type="password" id="password" name="password" required>
        <br>
        <input type="submit" id="signin-sublit" name="submit" value="submit">
        <p>Don't have an account? <span><a href="signup.php">Sign up now!!</a></span></p>

    </form>
</body>
</html>