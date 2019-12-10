<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php  
$user=Session::get("userRole");
?>

<title>Admin panel || Add Post</title>
<style>
#add_option{
  background-color:#FDFDFD;  
}
</style>

<?php                  //For insert Post//For insert Post//For insert Post
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $selectcatagory=mysqli_real_escape_string($db->link,$_POST['selectcatagory']);
    $authorName=mysqli_real_escape_string($db->link,$_POST['authorName']);
    $editor=mysqli_real_escape_string($db->link,$_POST['editor']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
    $userid=Session::get("userId");

    //check for existing post
    $query="SELECT*FROM tbl_post WHERE body='$editor' AND title='$title'";
    $check_query=$db->select($query);

    //for image upload//for image upload//for image upload//for image upload//for image upload
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];   //The original name of the file on the client machine.
    $file_size = $_FILES['image']['size'];   //The size, in bytes, of the uploaded file. 
    $file_temp = $_FILES['image']['tmp_name']; //The temporary filename of the file in which the uploaded file was stored on the server. 

    $div = explode('.', $file_name);  //explode — Split a string by a string
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "image/".$unique_image;
    $uploaded_image_move= "../image/".$unique_image;

    if($title=="" || $selectcatagory=="" || $authorName=="" || $editor=="" || $tags=="" || $file_name==""){

        echo "<span class='error'>Field must not be empty !</span>";

      }elseif ($check_query==true) {
        echo "<span class='error'>similier post already exist!</span>";

      }elseif ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB!</span>";

      }elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-"
        .implode(', ', $permited)."</span>";

      } else{ move_uploaded_file($file_temp, $uploaded_image_move); //for image upload//for image upload//for image upload

      $query="INSERT INTO 
      tbl_post(cat,title,body,image,author,tags,role,userid) 
      VALUES('$selectcatagory','$title','$editor','$uploaded_image','$authorName','$tags','$user','$userid')";

      $post_insert=$db->insert($query);
   
      if ($post_insert) {
        echo "<span class='success'>Post Inserted Successfully.</span>";
      }else {
        echo "<span class='error'>Post Not Inserted !</span>";
      }
    }
  }
?>


<article class="maincontent clear">
    <div class="content">
      <h2>Add Post</h2>
      <form action="" method="POST" enctype="multipart/form-data">
          <table>
          <tr>
            <td>Title:</td>
            <td><input type="text" name="title" placeholder="Enter your title"></td>
          </tr><tr>
            <td>Author Name:</td>
            <td><input type="text" readonly name="authorName" value="<?php echo Session::get("username");?>"></td>
          </tr>
          <tr>
            <td>Description:</td>
            <td><textarea name="editor"></textarea></td>
          </tr>
           <td><script>CKEDITOR.replace( 'editor' );</script></td>
          <tr>
            <td>Catagoty</td>
            <td>
            <select name="selectcatagory">

<?php
$query_cat="SELECT*FROM db_catagory";  //database query for catagory list
$get_cat=$db->select($query_cat);
if($get_cat){
while($result_cat=$get_cat->fetch_assoc()){
              
?>
              <option><?php echo $result_cat['cat_name'];?></option>
<?php } ?>
<?php }else{ ?>
<strong>Catagory list empty.</strong>
<?php } ?>
              </select>
            </td>
          </tr><tr>
            <td>Tags</td>
            <td><input type="text" name="tags" placeholder="Enter tags seperates by comma"></td>
          </tr>
          <tr>
            <td>Upload Image</td>
            <td><input type="file" name="image"></td>
          </tr>
          </table>
          <input type="submit" name="submit" value="Add post" style="margin-left:96px;">
      </form>
    </div>

</article>

<?php include("inc/copyright.php"); ?>