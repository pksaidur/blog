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

    $email=$fm->validation($_POST['email']);

    $email=mysqli_real_escape_string($db->link,$email);

    $query="SELECT*FROM db_user WHERE email='$email'";  //email match
    $result=$db->select($query);

    if($result!=false){                                 //email senting
     $new_pass=rand(1000)+99999;
     $to=$email;
     $subject="Password reset";
     $massage="Pk technology ltd.'\r''\n' Your new Password is:".$new_pass;
     $from=array(
                'From' => 'pksaidur@gmail.com',
                'Reply-To' => $email,
                'X-Mailer' => 'PHP/' . phpversion()
                );
     $sent_email=mail($to,$subject,$massage,$from);       //password change
     if($sent_email==true){
        $query="UPDATE db_user
        SET
        user_password='$new_pass'
         WHERE email='$email'";
        $result=$db->update($query);

        echo 'Check your mail';

     }else{echo "<span class='error'>Email not sent</span>"; }
      
    }else{
            echo "<span class='error'>Email not vaild.</span>";
        }
    }
?>
    <h1>Forgat Password</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
        <div class="userpass"> 
            <label style="color:white">Enter your valid email:</label>
            <input style="padding:10px" type="email" name="email" placeholder="Enter valid email" required='1'>
        </div>
        <div class="submit">
            <input type="submit" value='Submit'>
        </div>  
        <a href="login.php" style='text-decoration:none;color:red;padding:5px;margin-left:10px'>Login!</a>
    </form>
    <p>PK Technology</p>
</div>

</body>
</html>