<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || About Us</title>
<style>
#abo_option{
  background-color:#FDFDFD;
}
</style>
<article class="maincontent clear">
<div class="content">
  <h2>About Us </h2>
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

      <td><textarea type="text" name="updatedescription" rows="10" cols="50">
        <?php echo $result["aboutus"]; ?></textarea></td>
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
  $aboutus=mysqli_real_escape_string($db->link,$_POST['updatedescription']);

if($_POST['updatedescription']==''){
  echo "Empty not exccepted";
}else{
  $query="UPDATE db_nav
  SET
  aboutus='$aboutus'
  WHERE id=1";
  $about_query=$db->update($query);
  if($about_query){
    echo "<span style='color:green'>About US updated successfully</span>";
  }else{echo "<span style='color:red'>About US updated unsuccessful</span>";}
}}
?>

<?php include("inc/copyright.php"); ?>