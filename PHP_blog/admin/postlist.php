<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>

<?php  
$user=Session::get("userRole");

?>

<title>Admin panel || Article List</title>
<style>
#art_option{
  background-color:#FDFDFD;
}
</style>

<?php          //For delete post//For delete post//For delete post
    if(isset($_GET['deletepost'])){
      $postid=$_GET['deletepost'];
      $query="DELETE FROM tbl_post WHERE id = '$postid'";
      $delete_post=$db->delete($query);
      if($delete_post){
        echo "<span class='success'>Post deleted successfully !</span>";
      }else{
        echo "<span class='error'>Post deleted unsuccessfull !</span>";
      }
    }
?>




<article class="maincontent clear">
    <div class="content">
      <h2>Post List</h2>
        <div class="catoption">
          <h2>Post List</h2>
          <table class="catagorylist">
              <tr>
                <th width="2%">No.</th>
                <th width="10%">Title</th>
                <th width="30%">Description</th>
                <th width="5%">Catagory</th>
                <th width="6%">tags</th>
                <th width="10%">Image</th>
                <th width="10%">Action</th>
              </tr>
              <?php    //database query for post list
              if($user=='1'){
                $query_post="SELECT*FROM tbl_post";
              }else{ $query_post="SELECT*FROM tbl_post WHERE role= '$user'";}
              
              $get_post=$db->select($query_post);
              if($get_post){
                $i=1;
                while($result_post=$get_post->fetch_assoc()){ 
              
              ?>


              <tr>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $fm->textShort($result_post['title'],20).'('.$result_post['role'].')';?></td>
                <td ><?php echo $fm->textShort($result_post['body'],50);?></td>
                <td ><?php echo $result_post['cat'];?></td>
                <td ><?php echo $result_post['tags'];?></td>
                <td ><img src="<?php echo '../'.$result_post['image']; ?>" height="90px" width="90px"></td>

                <?php

                if(Session::get('userId')==$result_post['userid'] || Session::get('userRole')=='1'){
                ?>
                <td><a href="postupdate.php?update=<?php echo $result_post['id']; ?>">Edit</a> || 
                    <a onclick="return confirm('Are you sure to Delete!')" 
                       href="?deletepost=<?php echo $result_post['id']; ?>">Delete</a> </td>

                <?php } ?>

              </tr>
              <?php $i++;} ?>
                <?php }else{ ?>
                        <strong>Post list empty.</strong>
                  <?php } ?>
          </table>
        </div>
    </div>
</article>

<?php include("inc/copyright.php"); ?>