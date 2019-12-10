<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Catagory edit</title>

<?php          //For edit catagory//For edit catagory//For edit catagory
    if(isset($_GET['catid']) || $_GET['catid']!=NULL){
      $cat_id=$_GET['catid'];
    }else{
      header('Location:catagorylist.php');
    }
      $cat_query="SELECT*FROM db_catagory WHERE id = $cat_id"; 
      $edit_cat=$db->select($cat_query);
      if($edit_cat){
      while($result_cat=$edit_cat->fetch_assoc()){ 
    ?>
        <form method="POST" action=""> 
        <table>
        <tr>
        <td>Edit catagory:</td>
        <td><input type="text" name="editcat" value="<?php echo $result_cat['cat_name']; ?>"></td>
        </tr>
        </table>
        <input type="submit" value="Save" style="margin-left:96px;">
        </form>
      <?php } }else{ echo '404';} ?>
      

<?php       //For update catagory//For update catagory//For update catagory
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $cat_name=$_POST['editcat'];
      $cat_name=mysqli_real_escape_string($db->link,$cat_name);
    if(empty($cat_name)){
      echo "<span class='error'>Field must not be empty !</span>";
    }else{
      $query="UPDATE db_catagory SET cat_name='$cat_name' WHERE id=$cat_id";
      $insert=$db->update($query);
      if($insert){
        echo "<span class='success'>Catagory updated successfully !</span>";
      }else{echo "<span class='error'>Catagory updated unsuccessfully !</span>";}
    }
    }
?>

<?php include("inc/copyright.php"); ?>