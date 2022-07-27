 <?php   
 //logout.php  
 session_start();  
 session_destroy();  
 header("location:pdo_admin_login.php");  
 ?>  