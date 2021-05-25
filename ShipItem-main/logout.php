

<?php 

    session_start();

    if(isset($_SESSION['firstname'])){

        session_destroy();
        echo "You are now logged-out!";
        echo "<script>location.href='login.php'</script>";
    }
    else{

        // echo "you are already logged-out, login again"."<script>location.href='login.php'</script";
     	echo "<script>location.href='login.php'</script>";   
    }


?>

