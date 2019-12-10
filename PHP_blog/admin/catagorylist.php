<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Catagory list</title>


<?php          //For delete catagory//For delete catagory//For delete catagory
    if(isset($_GET['deletecat'])){
      $catid=$_GET['deletecat'];
      $query="DELETE FROM db_catagory WHERE id = '$catid'";
      $delete_cat=$db->delete($query);
      if($delete_cat){
        echo "<span class='success'>Catagory deleted successfully !</span>";
      }else{
        echo "<span class='error'>Catagory deleted unsuccessfull !</span>";
      }
    }
?>


<style>
#catl_option{
  background-color:#FDFDFD;
}
</style>
<article class="maincontent clear">
        <div class="catoption">
          <h2>Catagory List</h2>
          <table class="catagorylist">
              <tr>
                <th width="20%">No.</th>
                <th width="50%">Catagory Name</th>
                <th width="30%">Action</th>
              </tr>
              <?php
              $query_cat="SELECT*FROM db_catagory";  //database query
              $get_cat=$db->select($query_cat);
              if($get_cat){
                while($result_cat=$get_cat->fetch_assoc()){
              
              ?>
              <tr>
                <td ><?php echo $result_cat['id'];?></td>
                <td ><?php echo $result_cat['cat_name'];?></td>
                    <td>
                    <a href="catedit.php?catid=<?php echo $result_cat['id']; ?>">Edit</a>
                     || <a onclick="return confirm('Are you sure to Delete!')" 
                     href="?deletecat=<?php echo $result_cat['id']; ?>">Delete</a> 
                     </td>
              </tr>
                <?php } ?>
                <?php }else{ ?>
                        <strong>Catagory list empty.</strong>
                  <?php } ?>
          </table>
        </div>


    </div>

</article>

<?php include("inc/copyright.php"); ?>