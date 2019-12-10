<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Catagory add</title>
<style>
#cata_option{
  background-color:#FDFDFD;
}
</style>
<article class="maincontent clear">
    <div class="content">
      <h2>Catagory Update</h2>


<?php                  //For insert catagory//For insert catagory//For insert catagory
    if($_SERVER["REQUEST_METHOD"] == "POST"){

      $addcatagory=$_POST['addcatagory'];

    $addcatagory=mysqli_real_escape_string($db->link,$addcatagory);

    if(empty($addcatagory)){

      echo "<span class='error'>Field must not be empty !</span>";

    }else{
      $query="INSERT INTO db_catagory(cat_name) VALUES('$addcatagory') ORDER BY id ASC";

      $insert=$db->insert($query);

      if($insert){

        echo "<span class='success'>Catagory updated successfully !</span>";
      }
    }
    }
?>


      <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
          <table>
          <tr>
          <td>Add catagory:</td>
          <td><input type="text" name="addcatagory" placeholder="Add catagory"></td>
          </tr>
          </table>
          <input type="submit" name="update" value="Add" style="margin-left:96px;">
      </form>

    </div>

</article>

<?php include("inc/copyright.php"); ?>