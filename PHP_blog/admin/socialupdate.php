<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Update Social</title>
<style>
#soc_option{
  background-color:#FDFDFD;
}
</style>

<article class="maincontent clear">
<div class="content">
  <h2>Social Link Update</h2>  <!--Body header-->
<?php
  if(isset($_GET['social_id']) || $_GET['social_id']!=NULL){
      $id=$_GET['social_id'];
    }else{
      header('Location:catagorylist.php');
    }
  $query_social="SELECT*FROM db_social WHERE id=$id";
  $social=$db->select($query_social);
  if($social){
    while($social_result=$social->fetch_assoc()){
  ?>

<form action="" method="POST">

            <br/>
            <p>Type: <?php echo $social_result['name']; ?></p>
            <br/>
            Link:  <input type="text" name="link" value="<?php echo $social_result['link']; ?>">
            <br/>
            <input type="submit" value="Update" style="margin-left:96px;">

</form>
<?php } }else{echo 'Fail';} ?>
</div>
</article>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$link=mysqli_real_escape_string($db->link,$_POST['link']);

if($link==""){
    echo "<span class='error'>Field must not be empty !</span>";
    }else{
        $query="UPDATE db_social
        SET
        link='$link'
        WHERE id='$id'";
        $sent_query=$db->update($query);
        if($sent_query){
            echo "<span class='success'>Link Updated successfully!</span>";   
            }else{echo "<span class='error'>Link Update unsuccessful!</span>";}
        }
    }
?>

<?php include("inc/copyright.php"); ?>