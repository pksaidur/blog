<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Change Pass</title>
<style>
#changepass{
  background-color:green;
}
</style>

<?php
$userid=Session::get("userId");

if($_SERVER['REQUEST_METHOD']=='POST'){
  $oldpass=$fm->validation(md5($_POST['oldpass']));
  $newpass=$fm->validation(md5($_POST['newpass']));

  $query="SELECT*FROM db_user WHERE  user_password='$oldpass' AND id='$userid'";
  $check_query=$db->select($query);
 
  if($check_query){
    $query_setpass="UPDATE db_user SET  user_password='$newpass' WHERE id='$userid'";
    $update=$db->update($query_setpass);
    if($update){

    echo "Password changed successfully";

    }else{ echo "Password update fail!";}

  }else{echo "Password don't match";}

}
?>


<article class="maincontent clear">
<div class="content">
  <h2>Change Password</h2>
<form action="" method="POST">
  <table>
    <tr>
      <td>Old Password:</td>
      <td><input type="password" name="oldpass" placeholder="Input old password" required='1'></td>
    </tr><tr>
      <td>New Password:</td>
      <td><input type="password" name="newpass" placeholder="Input new password" required='1'></td>
    </tr>
  </table>
  <input type="submit" name="update" value="Update" style="margin-left:105px;">
</form>
</div>
</article>
<?php include("inc/copyright.php"); ?>