<?php
    date_default_timezone_set('Asia/Taipei');
    include "connect.php";

    
    function addComment(){
        if(isset($_POST['publish'])){
            // include "connect.php";
            global $connection;
            $user = $_POST['user'];
            $date = $_POST['date'];
            $message = $_POST['message'];

            $query = "INSERT INTO comments(user,date,message) VALUES('$user','$date','$message')";
            $result = mysqli_query($connection, $query);

        }
    }

    function getComment(){
        // include "connect.php";
        global $connection;
        $query = "SELECT * from comments";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='message'>";
            echo "<h2>".$row['user']."</h2>";
            
            echo $row['date']."<br>";
            echo $row['message']."<br><br>";
            // echo "<p>Replies:</p>";
            // echo "<p>".$row['reply']."</p><br>";
            // echo "<input type='text' placeholder='Your reply'>";
            // echo "<form class='reply-btn' action='".addReply()."' method='POST'>
            // <input type='hidden' name='name' value='".$row['user']."'>
            // <input type='submit' name='reply' value='reply'>
            // </form>";

            echo "<form class='delete-btn' action='".deleteComment()."' method='POST'>
            <input type='hidden' name='cid' value='".$row['cid']."'>
            <input type='submit' name='delete' value='delete'>
            </form>";
            
            echo "<form class='edit-btn' action='editMessage.php' method='POST'>
            <input type='hidden' name='cid' value='".$row['cid']."'>
            <input type='hidden' name='user' value='".$row['user']."'>
            <input type='hidden' name='date' value='".$row['date']."'>
            <input type='hidden' name='message' value='".$row['message']."'>
            <input type='submit' name='edit' value='edit'>
            </form>";
            echo "</div>";            
        }      
    }

    function editComment(){
        if(isset($_POST['editing'])){
            // include "connect.php";
            global $connection;
            $cid = $_POST['cid'];
            $user = $_POST['user'];
            $date = $_POST['date'];
            $message = $_POST['message'];

            $query = "UPDATE comments SET message='$message', date='$date' WHERE cid='$cid'";
            $result = mysqli_query($connection, $query);
            header("Location: index.php");

        }
    }

    function deleteComment(){
        if(isset($_POST['delete'])){
            // include "connect.php";
            global $connection;
            $cid = $_POST['cid'];
            $query = "DELETE FROM comments WHERE cid='$cid'";
            $result = mysqli_query($connection, $query);
            header("Location: index.php");

        }
    }

    // function addReply(){
    //     if(isset($_POST['reply'])){
    //         global $connection;
    //         // $user = $_POST['user'];
    //         $reply = $_POST['reply'];

    //         $query = "INSERT INTO comments(reply) VALUES('$reply')";
    //         $result = mysqli_query($connection, $query);
    //     }
    // }

    // function showReply(){

    // }
?>