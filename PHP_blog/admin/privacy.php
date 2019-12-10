<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Privacy</title>
<style>
#pri_option{
  background-color:#FDFDFD;
}
</style>
<article class="maincontent clear">
  <div class="content">
    <h2>Privacy </h2>
    <?PHP
      $query="SELECT*FROM db_nav";
      $post=$db->select($query);
      if($post){
          while($result=$post->fetch_assoc()){
     ?>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Page Content:</td>
        <td><textarea type="text" name="privacybody" rows="10" cols="50">
          <?php echo $result["privacy"]; ?></textarea></td>
      </tr>
    </table>
    <input type="submit" value="Update" style="margin-left:130px;">
  </form>
  <?php } ?><!--while loop end here-->
    <?php }else{ header("Location:404.php");} ?><!--if condition end here-->
  </div>
</article>

<?php 
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $privacy=mysqli_real_escape_string($db->link,$_POST['privacybody']);

  if($_POST['privacybody']==''){
    echo "Error:404";
  }else{
    $query="UPDATE db_nav
    SET
    privacy='$privacy'
    WHERE id=1";
    $about_query=$db->update($query);
    if($about_query){
      echo "<span style='color:green'>Privecy updated successfully</span>";
    }else{echo "<span style='color:red'>Privecy updated unsuccessful</span>";}
  }  
 }
?>
<?php include("inc/copyright.php"); ?>