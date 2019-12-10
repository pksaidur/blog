<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || User Update</title>
<style>
#adduser{
  background-color:green;
}
#user{
  background-color:green;
}
</style>

<?php                  //For insert user//For insert user//For insert user
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=mysqli_real_escape_string($db->link,$_POST['username']);
    $useremail=mysqli_real_escape_string($db->link,$_POST['useremail']);
    $userpassword=mysqli_real_escape_string($db->link,md5($_POST['userpassword']));
    $role=mysqli_real_escape_string($db->link,$_POST['role']);

    $query="SELECT*FROM db_user WHERE email='$useremail'";
    $check_query=$db->select($query);

    if( empty($username) || empty($useremail) || empty($userpassword) || empty($role) || $role==0 ){

      $note= "<span class='error'>Field must not be empty !</span>";
     
    }elseif($check_query){
      $note="<span class='error'>Email already exist!</span>";

    }else{
      $query="INSERT INTO db_user(user_name,user_password,email,role) 
      VALUES('$username','$userpassword','$useremail','$role') ORDER BY id ASC";

      $insert=$db->insert($query);

      if($insert){

        $note= "<span class='success'>User added successfully !</span>";
      }else{ $note= "<span class='error'>User don't added !</span>";}
    } 
  echo $note;
  }   
?>


<article class="maincontent clear">
<div class="content">
<nav class="mainmanu clear">
    <ul>
      <li id="adduser"><a href="user.php">Add user</a></li>
      <li id="userlist"><a href="userlist.php">User list</a></li>
    </ul>
</nav>
<form action="" method="POST">
  <table>
    <tr>
      <td>Username:</td>
      <td><input type="text" name="username" placeholder="Input user name" required='1'></td>
    </tr><tr>
      <td>Email:</td>
      <td><input type="email" name="useremail" placeholder="Input user email" required='1'></td>
    </tr><tr>
      <td>Password:</td>
      <td><input type="password" name="userpassword" placeholder="Input password" required='1'></td>
    </tr>
    <tr>
      <td>User type:</td>
      <td>
          <select name="role" >
          <option>Select user role</option>

               <?php if(Session::get("userRole")=='1'){ ?>

                <option value="1">Admin</option>
                <option value="2">Author</option>
              <?php } ?>
            
            <option value="3">Editor</option>
          </select>

      </td>
    </tr>
  </table>
  <input type="submit" name="submit" value="Submit">
</div>
</article>

<?php include("inc/copyright.php"); ?>