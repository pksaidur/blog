<?php 
    include("../library/Session.php"); 
    Session::init();
?>
<?php include("../config/config.php"); ?>       <!--Database-->
<?php include("../library/database.php"); ?>    <!--Database-->
<?php include("../helpers/format.php"); ?>
<?php $db=new database(); 
      $fm=new Format();
?>                          <!--Database object create-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">
</head>
<body style="background-color:black">

<div class="login">
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$fm->validation($_POST['username']);
    $password=$fm->validation(md5($_POST['password']));

    $username=mysqli_real_escape_string($db->link,$username);
    $password=mysqli_real_escape_string($db->link,$password);

    $query="SELECT*FROM db_user WHERE user_name='$username' AND user_password='$password'";
    $result=$db->select($query);
    if($result!=false){
        $value=mysqli_fetch_array($result);
        $row=mysqli_num_rows($result); 

        if($row>0){
           Session::set("login",true);
           Session::set("username",$value['user_name']);  //1. get input and 2. database username
           Session::set("userId",$value['id']);
           Session::set("userRole",$value['role']);
           
           header('Location:index.php');

        }else{
            echo "<span class='error'>No result found.</span>";
        }
    }else{
        echo "<span class='error'>User name or password not match!!.</span>";
    }
 }
?>
    <h1>Admin Login</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
        <div class="userpass"> 
            <input type="text" name="username" placeholder="Enter username" required='1'>
            <input type="password" name="password" placeholder="Enter Password" required='1'>
        </div>
        <div class="submit">
            <input type="submit" name="submit" value='Log in'>
        </div>  
        <a href="forgatpass.php" style='text-decoration:none;color:red;margin-left:10px'>Forgat Password</a>
    </form>
    <p>PK Technology</p>
</div>

</body>
</html>