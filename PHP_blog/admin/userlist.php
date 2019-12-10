<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>

<?php 
if(Session::get("userRole")=='3'){
   header('Location:index.php');
} ?>

<title>Admin panel || User list</title>
<style>
#user{
  background-color:green;
}
#userlist{
  background-color:green;
}
</style>

<nav class="mainmanu clear">
    <ul>
      <li id="adduser"><a href="user.php">Add user</a></li>
      <li id="userlist"><a href="userlist.php">User list</a></li>
    </ul>
</nav>


<?php          //For view user profile//For view user profile//For view user profile
    if(isset($_GET['view'])){
      $view_id=$_GET['view'];     
      $query_view="SELECT*FROM db_user  WHERE id='$view_id'";
      $view_post=$db->select($query_view);
      if($view_post){
        while($view_result=$view_post->fetch_assoc()){
?>
          <div class="content">
          <h2>User View</h2>
          <article class="maincontent clear">
   
        <form action="userlist.php?" method="POST">
          <table>
          <tr>
            <td>Name:</td>
            <td><input type="text" readonly name="name" value="<?php echo $view_result['name']; ?>"></td>
          </tr><tr>
            <td>Username:</td>
            <td><input type="text" readonly value="<?php echo $view_result['user_name']; ?>"></td>
          </tr><tr>
            <td>Email:</td>
            <td><input type="email" readonly name="email" value="<?php echo $view_result['email']; ?>"></td>
          </tr>
          <tr><td>User Type:</td>
          <td>
          <?php 
                if($view_result['role']=='1'){
                    echo 'Admin';
                }elseif($view_result['role']=='2'){
                    echo 'Author';
                }else{
                    echo 'Editor';
                }
                 ?>
            </td>
          </tr>
          <tr>
            <td>Details:</td>
            <td><textarea name="massage" readonly><?php echo $view_result['details']; ?></textarea></td>
          </tr>
          </table>
          <input type="submit" value="Back" style="margin-left:96px;">
      </form>
    </div>
<?php
        }
        echo "<span class='success'>User View successfully !</span>";
      }else{
        echo "<span class='error'>User View unsuccessfull !</span>";
      }
    }
?>


<?php          //For delete user//For delete user//For delete user
    if(isset($_GET['delete'])){
      $postid=$_GET['delete'];
      $query="DELETE FROM db_user WHERE id = '$postid'";
      $delete_post=$db->delete($query);
      if($delete_post){
        echo "<span class='success'>User deleted successfully !</span>";
      }else{
        echo "<span class='error'>User deleted unsuccessfull !</span>";
      }
    }
?>


<article class="maincontent clear">
<div class="content">
    <div class="content">
      <h2>User List</h2>
        <div class="catoption">
          <table class="catagorylist">
              <tr>
                <th width="2%">No.</th>
                <th width="15%">Name</th>
                <th width="10%">Username</th>
                <th width="20%">Email</th>
                <th width="10%">Type</th>
                <th width="25%">Details</th>
                <th width="15%">Action</th>
              </tr>

          <?php
            $query_post="SELECT*FROM db_user ORDER BY role ASC";  //database query for post list
            $get_post=$db->select($query_post);
            if($get_post){
              $i=1;
              while($result_post=$get_post->fetch_assoc()){
          ?>

              <tr>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $result_post['name'];?></td>
                <td ><?php echo $result_post['user_name'];?></td>
                <td ><?php echo $result_post['email'];?></td>
                <td ><?php 
                if($result_post['role']=='1'){
                    echo 'Admin';
                }elseif($result_post['role']=='2'){
                    echo 'Author';
                }else{
                    echo 'Editor';
                }
                 ?></td>
                <td ><?php echo $fm->textShort($result_post['details'],100);?></td>
                
                <td> 
               
                <a href="?view=<?php echo $result_post['id']; ?>">View</a>
                <?php 
                if(Session::get("userRole")=='1'){ ?>
                  ||  <a onclick="return confirm('Delete user!')" 
                    href="?delete=<?php echo $result_post['id']; ?>">Delete</a>
                  <?php } ?> 
                  </td>

              </tr>
              <?php $i++;} ?>
                <?php }else{ ?>
                        <strong>User list empty.</strong>
                  <?php } ?>
          </table>
        </div>
    </div>
</article>








<?php include("inc/copyright.php"); ?>