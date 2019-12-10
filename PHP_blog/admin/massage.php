<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || inbox</title>
<style>
#massage{
  background-color:green;
  color:red;
}
</style>



<?php          //For view massage//For view massage//For view massage
    if(isset($_GET['view'])){
      $view_id=$_GET['view'];     
      $query_view="SELECT*FROM db_contract  WHERE id='$view_id'";
      $view_post=$db->select($query_view);
      if($view_post){
        while($view_result=$view_post->fetch_assoc()){
?>
          <div class="content">
          <h2>Massage View</h2>
          <article class="maincontent clear">
   
        <form action="massage.php?" method="POST">
          <table>
          <tr>
            <td>Name:</td>
            <td><input type="text" readonly name="name" value="<?php echo $view_result['fname'].' '.$view_result['lname']; ?>"></td>
          </tr><tr>
            <td>Mobile:</td>
            <td><input type="tel" readonly name="mobile" value="<?php echo $view_result['mobile']; ?>"></td>
          </tr><tr>
            <td>Email:</td>
            <td><input type="email" readonly name="email" value="<?php echo $view_result['email']; ?>"></td>
          </tr>
          <tr>
            <td>Massage:</td>
            <td><textarea name="massage" readonly><?php echo $view_result['massage']; ?></textarea></td>
          </tr>
          </table>
          <input type="submit" value="Back" style="margin-left:96px;">
      </form>
    </div>
<?php
        }
        echo "<span class='success'>Massage View successfully !</span>";
      }else{
        echo "<span class='error'>Massage View unsuccessfull !</span>";
      }
    }
?>


<?php          //For seen massage//For seene massage//For seen massage
    if(isset($_GET['seen'])){
      $seen=$_GET['seen'];     
      $query_seen="UPDATE db_contract  
      SET
      status='1'
      WHERE id = '$seen'";
      $seen_post=$db->update($query_seen);
      if($seen_post){
        echo "<span class='success'>Massage moved to seen successfully !</span>";
      }else{
        echo "<span class='error'>Massage move to seen unsuccessfull !</span>";
      }
    }
?>


<?php          //For delete massage//For delete massage//For delete massage
    if(isset($_GET['deletepost'])){
      $postid=$_GET['deletepost'];
      $query="DELETE FROM db_contract WHERE id = '$postid'";
      $delete_post=$db->delete($query);
      if($delete_post){
        echo "<span class='success'>Massage deleted successfully !</span>";
      }else{
        echo "<span class='error'>Massage deleted unsuccessfull !</span>";
      }
    }
?>
                             <!--For unseen massage side-->
<article class="maincontent clear">
    <div class="content">
      <h2>Massage List</h2>
        <div class="catoption">
          <table class="catagorylist">
              <tr>
                <th width="2%">No.</th>
                <th width="15%">Name</th>
                <th width="10%">Mobile</th>
                <th width="10%">Email</th>
                <th width="40%">Massage</th>
                <th width="10%">Time</th>
                <th width="13%">Action</th>
              </tr>

          <?php
            $query_post="SELECT*FROM db_contract WHERE status=0 ORDER BY time DESC";  //database query for post list
            $get_post=$db->select($query_post);
            if($get_post){
              $i=1;
              while($result_post=$get_post->fetch_assoc()){
          ?>


              <tr>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $result_post['fname'].' '.$result_post['lname'];?></td>
                <td ><?php echo $result_post['mobile'];?></td>
                <td ><?php echo $result_post['email'];?></td>
                <td ><?php echo $fm->textShort($result_post['massage'],100);?></td>
                <td ><?php echo $fm->formateDate($result_post["time"]); ?></td>
                
                <td><a href="?view=<?php echo $result_post['id']; ?>">View</a> || 
                    <a href="replymassage.php?reply=<?php echo $result_post['id']; ?>">Reply</a> ||
                    <a onclick="return confirm('Massage move to seen!')" 
                    href="?seen=<?php echo $result_post['id']; ?>">Seen</a> 
                  </td>
              </tr>
              <?php $i++;} ?>
                <?php }else{ ?>
                        <strong>Massage list empty.</strong>
                  <?php } ?>
          </table>
        </div>
    </div>
</article>
                              <!--For seen massage side-->
<article class="maincontent clear">
    <div class="content">
      <h2>Seen Massage List</h2>
        <div class="catoption">
          <table class="catagorylist">
              <tr>
                <th width="2%">No.</th>
                <th width="15%">Name</th>
                <th width="10%">Mobile</th>
                <th width="10%">Email</th>
                <th width="40%">Massage</th>
                <th width="10%">Time</th>
                <th width="13%">Action</th>

              </tr>
              <?php
              $query_post="SELECT*FROM db_contract WHERE status=1 ORDER BY time DESC";  //database query for post list
              $get_post=$db->select($query_post);
              if($get_post){
                $i=1;
                while($result_post=$get_post->fetch_assoc()){
              ?>

              <tr>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $result_post['fname'].' '.$result_post['lname'];?></td>
                <td ><?php echo $result_post['mobile'];?></td>
                <td ><?php echo $result_post['email'];?></td>
                <td ><?php echo $fm->textShort($result_post['massage'],100);?></td>
                <td ><?php echo $fm->formateDate($result_post["time"]); ?></td>
                
                <td> 
                    <a href="?view=<?php echo $result_post['id']; ?>">View</a>||
                    <a onclick="return confirm('Are you sure to Delete!')" 
                    href="?deletepost=<?php echo $result_post['id']; ?>">Delete</a> </td>
              </tr>
              <?php $i++;} ?>
                <?php }else{ ?>
                        <strong>Seen massage list empty.</strong>
                  <?php } ?>
          </table>
        </div>
    </div>
</article>


<?php include("inc/copyright.php"); ?>