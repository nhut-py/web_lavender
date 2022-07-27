<!DOCTYPE html>  
<head>

<script src="js/sweetalert2-11.1.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="js/sweetalert2-11.1.2/dist/sweetalert2.min.css">
</head>

<?php  
 session_start();  
 $host = "sql6.freemysqlhosting.net";  
 $username = "sql6508813";  
 $password = "YqukAZ6R7Y";  
 $database = "sql6508813";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM khachhang WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  

                     header("location:san_pham.php");  
                }  
                else  
                {  
                 
                     $message=" <script>
                     Swal.fire({
                         icon: 'error',
                         title: 'Oops...',
                         text: 'Đăng nhập thất bại!'
                        
                       });
                     </script>";
                    

                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  

 <html>  
      <head>  
           <title>Đăng Nhập</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3 align="">Đăng nhập</h3><br />  
                <form method="post">  
                     <label>Tài khoản</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Mật khẩu</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-success" value="Đăng Nhập" />  

                  
                </form>
              
                <br>
                <a href="user_register.php"> <button class="btn btn-info">Đăng ký</button> </a>
           </div>  
           <br />  
      </body>  
 </html>  