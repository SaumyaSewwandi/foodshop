<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {  
    
    ?>
<?php if ($_SESSION['role'] == 'admin') {

    header("Location: menu.php");


}else{
	header("Location: waiter.php");
} 
?>

<?php }else{
	header("Location: login.php");
} ?>