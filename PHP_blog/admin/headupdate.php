<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Update head</title>
<style>
#hea_option{
  background-color:#FDFDFD;
}
</style>

<article class="maincontent clear">
<div class="content">
  <h2>Social Link Update</h2>  <!--Body header-->
<?php
  if(isset($_GET['head_id']) || $_GET['head_id']!=NULL){
      $id=$_GET['head_id'];
    }else{
      header('Location:catagorylist.php');
    }
  $query_social="SELECT*FROM header WHERE id=$id";
  $header=$db->select($query_social);
  if($header){
    while($header_result=$header->fetch_assoc()){
  ?>

<form action="" method="POST">

            <br/>
            <p>Type: <?php echo $header_result['name']; ?></p>
            <br/>
           Edit:  <input type="text" name="title" value="<?php echo $header_result['title']; ?>">
            <br/>
            <input type="submit" value="Update" style="margin-left:96px;">

</form>
<?php } }else{echo 'Fail';} ?>
</div>
</article>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$title=mysqli_real_escape_string($db->link,$_POST['title']);

if($title==""){
    echo "<span class='error'>Field must not be empty !</span>";
    }else{
        $query="UPDATE header
        SET
        title='$title'
        WHERE id='$id'";
        $sent_query=$db->update($query);
        if($sent_query){
            echo "<span class='success'>Link Updated successfully!</span>";   
            }else{echo "<span class='error'>Link Update unsuccessful!</span>";}
        }
    }
?>

<?php include("inc/copyright.php"); ?>