<?php
    include "message_func.php";
    include "connect.php";
?>

<?php
    include("template/header.php");
?>

    <?php
        $cid = $_POST['cid'];
        $user = $_POST['user'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        echo "<form action='".editComment()."' method='POST'>
        <input type='hidden' name='cid' value='$cid'>
        <input type='hidden' name='user' value='$user'>
        <input type='hidden' name='date' value='$date'>
        <textarea name='message' id='message' cols='50' rows='5' placeholder='How do you do today??'>$message</textarea>
        <br>
        <input type='submit' name='publish' value='edit'>
        </form>";

    ?>
    
<?php
    include("template/footer.php");
?>