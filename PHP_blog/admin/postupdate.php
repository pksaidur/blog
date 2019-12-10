
<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<title>Admin panel || Update Post</title>
<style>
#add_option{
  background-color:#FDFDFD;  
}
</style>
<?php          //catch update id from postlist //catch update id from postlist
  if(isset($_GET['update']) || $_GET['update']!=NULL){
    $post_id=$_GET['update'];
    }else{
      header('Location:catagorylist.php');
    }
?>

<?php                  //For insert Post//For insert Post//For insert Post
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $selectcatagory=mysqli_real_escape_string($db->link,$_POST['selectcatagory']);
    $authorName=mysqli_real_escape_string($db->link,$_POST['authorName']);
    $editor=mysqli_real_escape_string($db->link,$_POST['editor']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);

    //for image upload//for image upload//for image upload//for image upload//for image upload
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];   //The original name of the file on the client machine.
    $file_size = $_FILES['image']['size'];   //The size, in bytes, of the uploaded file. 
    $file_temp = $_FILES['image']['tmp_name']; //The temporary filename of the file in which the uploaded file was stored on the server. 

    $div = explode('.', $file_name);  //explode — Split a string by a string
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "image/".$unique_image;
    $uploaded_image_move = "../image/".$unique_image;

    if($title=="" || $selectcatagory=="" || $authorName=="" || $editor=="" || $tags==""){

        echo "<span class='error'>Field must not be empty or !</span>";
        }

    if(!empty($file_name)){
      if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB!</span>";

        }elseif (in_array($file_ext, $permited) === false) {
          echo "<span class='error'>You can upload only:-"
          .implode(', ', $permited)."</span>";

        } else{ move_uploaded_file($file_temp, $uploaded_image_move); //for image upload//for image upload//for image upload

          $query="UPDATE tbl_post
          SET
          cat='$selectcatagory',
          title='$title',
          body='$editor',
          image='$uploaded_image',
          author='$authorName',
          tags ='$tags'
          WHERE id=$post_id";

          $post_update=$db->update($query);
      
          if ($post_update) {
            echo "<span class='success'>Post Updated Successfully.</span>";
          }else {
            echo "<span class='error'>Post Not Updated !</span>";
          }
        }
    }else{ $query="UPDATE tbl_post
      SET
      cat='$selectcatagory',
      title='$title',
      body='$editor',
      author='$authorName',
      tags ='$tags'
      WHERE id=$post_id";

      $post_update=$db->update($query);
  
      if ($post_update) {
        echo "<span class='success'>Post Updated Successfully.</span>";
      }else {
        echo "<span class='error'>Post Not Updated !</span>";
      }
    }
}
?>


<article class="maincontent clear">
    <div class="content">
      <h2>Update Post</h2>


      <?php                //for edit post
      $post_query="SELECT*FROM tbl_post WHERE id = $post_id"; 
      $edit_post=$db->select($post_query);
      if($edit_post){
      while($result_post=$edit_post->fetch_assoc()){ 
      ?>


      <form action="" method="POST" enctype="multipart/form-data">
          <table>
          <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $result_post['title'];?>"></td>
          </tr><tr>
            <td>Author Name:</td>
            <td><input type="text" readonly name="authorName" value="<?php echo Session::get("username"); ?>">
            
          </td>
          </tr>
          <tr>
            <td>Description:</td>
            <td><textarea name="editor" ><?php echo $result_post['body'];?></textarea></td>
          </tr>
            <td><script>CKEDITOR.replace( 'editor' );</script></td>
          <tr>
            <td>Catagoty</td>
            <td>
            <select name="selectcatagory" value="<?php echo $result_post['cat'];?>">

<?php
  $query_cat="SELECT*FROM db_catagory";  //database query for catagory list
  $get_cat=$db->select($query_cat);
  if($get_cat){
  while($result_cat=$get_cat->fetch_assoc()){            
?>
             <option
             <?php                                                    //select option
              if($result_post['cat']==$result_cat['cat_name']){?>
              selected='selected'
             <?php }?> value="<?php echo $result_cat['cat_name'] ?>">

             <?php echo $result_cat['cat_name'];?> </option>

<?php } }else{ echo 'No catagory inserted';} ?>

              </select>
            </td>
          </tr><tr>
            <td>Tags</td>
            <td><input type="text" name="tags" value="<?php echo $result_post['tags'];?>"></td>
          </tr>
          <tr>
            <td>Upload Image</td>
           
            <td> <img src="<?php echo '../'.$result_post['image'];?>" height="50px" width="50px"/><br>
            <input type="file" name="image" ></td>
          </tr>
          </table>
          <input type="submit" value="Submit" style="margin-left:96px;">
      </form>
      <?php } }else{ echo '404';} ?>
    </div>

</article>
<?php include("inc/copyright.php"); ?>