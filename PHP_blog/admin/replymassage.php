<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<title>Admin panel || Reply</title>
<style>
#massage{
  background-color:black;  
}
</style>

<?php                  //For insert Post//For insert Post//For insert Post
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $to=$fm->validation($_POST['to']);
    $from=$fm->validation($db->link,$_POST['from']);
    $subject=$fm->validation($db->link,$_POST['subject']);
    $massage=$fm->validation($db->link,$_POST['editor']);
     
    $sent_email=mail($to,$subject,$massage,$from);

      if ($sent_email) {
        echo "<span class='success'>Massage sent Successfully.</span>";
      }else {
        echo "<span class='error'>Massage sent fail !</span>";
      }
    }
?>

<?php          //For view massage//For view massage//For view massage
    if(isset($_GET['reply'])){
      $view_id=$_GET['reply'];     
      $query_view="SELECT*FROM db_contract  WHERE id='$view_id'";
      $view_post=$db->select($query_view);
      if($view_post){
        while($view_result=$view_post->fetch_assoc()){
?>

<article class="maincontent clear">
    <div class="content">
      <h2>Massage reply</h2>
      <form action="" method="POST">
          <table>
          <tr>
            <td>To</td>
            <td><input type="email" readonly name="to" value="<?php echo $view_result['email']; ?>"></td>
          </tr><tr>
            <td>From</td>
            <td><input type="email" name="from" placeholder="Enter your email" required=1></td>
          </tr>
          <tr>
            <td>Subject:</td>
            <td><input type="text" name="subject" placeholder="Enter subject" required=1></td>
          </tr>
          <tr>
            <td>Massage:</td>
            <td><textarea name="editor" required=1></textarea></td>
          </tr><tr>
           <td><script>CKEDITOR.replace( 'editor' );</script></td>
        </tr>
          </table>
          <input type="submit" name="submit" value="Reply" style="margin-left:96px;">
          <a style="padding:8px;background-color:green;margin-left:50%;text-decoration:none" href="massage.php">Back Home</a>
      </form>
    </div>

</article>
        <?php } } }?>

<?php include("inc/copyright.php"); ?>