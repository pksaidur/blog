
<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php
$userid=Session::get('userId');
$userrole=Session::get('userRole');
?>

<title>Admin panel || profile Update</title>
<style>
#userprofile{
  background-color:#FDFDFD;  
}
</style>


<?php                  //For insert Post//For insert Post//For insert Post
    if($_SERVER["REQUEST_METHOD"] == "POST"){

          $name=mysqli_real_escape_string($db->link,$fm->validation($_POST['name']));
     $user_name=mysqli_real_escape_string($db->link,$fm->validation($_POST['user_name']));
         $email=mysqli_real_escape_string($db->link,$fm->validation($_POST['email']));
        $editor=mysqli_real_escape_string($db->link,$fm->validation($_POST['editor']));

    $query="UPDATE db_user
    SET
         name='$name',
    user_name='$user_name',
        email='$email',
     details ='$editor'
    WHERE id = '$userid' AND role='$userrole'";

    $post_update=$db->update($query);
 
    if ($post_update) {
      echo "<span class='success'>Profile Updated Successfully.</span>";
    }else {
      echo "<span class='error'>Profile Not Updated !</span>";
    }
  }
?>


<article class="maincontent clear">
    <div class="content">
      <h2>User Profile Update</h2>


      <?php
      $user_query="SELECT*FROM db_user WHERE id = '$userid' AND role='$userrole'"; 
      $user_sent=$db->select($user_query);
      if($user_sent){
      while($result_info=$user_sent->fetch_assoc()){ 
      ?>


      <form action="" method="POST">
          <table>
          <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $result_info['name'];?>"></td>
          </tr><tr>
            <td>Username:</td>
            <td><input type="text" readonly name="user_name" value="<?php echo $result_info['user_name'];?>"></td>
          </tr>
          <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo $result_info['email'];?>"></td>
          </tr>
          <tr>
            <td>Details:</td>
            <td><textarea name="editor" ><?php echo $result_info['details'];?></textarea></td>
          </tr>
            <td><script>CKEDITOR.replace( 'editor' );</script></td>
          </table>
          <input type="submit" value="Update" style="margin-left:96px;">
      </form>
      <?php } }else{ echo '404';} ?>
    </div>

</article>
<?php include("inc/copyright.php"); ?>