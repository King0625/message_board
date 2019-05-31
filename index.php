<?php
    include "message_func.php";
    include "connect.php";

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: signin.php");
    }else{
        $username = $_SESSION['username'];
        echo "<h1>Hi, $username !!</h1>";
    }

?>

<?php
    include("template/header.php");
?>

    <form action="signout.php">
        <input type="submit" name="logout" value="logout">
    </form>
    <br><br>
    <?php
        echo "<form action='".addComment()."' method='POST'>
        <input type='hidden' name='user' value='$username'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message' id='message' cols='50' rows='5' placeholder='How do you do today??'></textarea>
        <br>
        <input type='submit' name='publish' value='publish'>
        </form>";

        getComment();
    ?>
     
<?php
    include("template/footer.php");
?>