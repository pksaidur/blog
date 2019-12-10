<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>

<?php 
    include("../library/Session.php");     //session for login status
    Session::checkSession();
?>


<?php include("../config/config.php"); ?>       <!--Database-->
<?php include("../library/database.php"); ?>    <!--Database-->
<?php include("../helpers/format.php"); ?>
<?php $db=new database(); 
      $fm=new Format();
?>  

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head> 

<body>
    <!-- Start my code for logout option-->
    <?php
    if(isset($_GET['action']) && $_GET['action']=="logout"){
      Session::destroy();
    }
    ?>
    <div class="template">
  <header class="headeroption clear">
  
    <h2>Admin area</h2>
    <nav class="mainmanu clear">

    <ul>
      <li id="massage"><a href="massage.php">Inbox
      <?php
            $query_count="SELECT*FROM db_contract WHERE status=0";  //database query for post list
            $get_count=$db->select($query_count);
            if($get_count){
              $count_msg=mysqli_num_rows($get_count);
              echo '('.$count_msg.')';
            }else{ echo '(0)';}
            ?>
      </a></li>
    </ul>

    <ul>
      <li id="home"><a href="index.php">Home</a></li>
<?php 
if(Session::get("userRole")=='1' ||  Session::get("userRole")=='2'){ ?>
     <li id="user"><a href="user.php">User</a></li>
<?php } ?>
      <li id="changepass"><a href="changepass.php">Change password</a></li>
      <li id="userprifile"><a href="userprofile.php">User Profile</a></li>
      <li style="color:#FFFF">Hello <?php echo Session::get('username').' '; ?><img src="../image/9df8e1dc6e.jpg" width=30px height=30px></li>
      <li id="logout"><a href="?action=logout">Logout</a></li>
    </ul>
    </nav>
  </header>