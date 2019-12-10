<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Footer Update</title>
<style>
#foo_option{
  background-color:#FDFDFD;
}
</style>
<article class="maincontent clear">
<div class="content">
  <h2>Footer Update</h2>
<form action="" method="">
  <table>
    <tr>
      <td>Copyright text:</td>
      <td><input type="text" name="copyright" placeholder="Update Copyright text"></td>
    </tr><tr>
      <td>Footer right text:</td>
      <td><input type="text" name="footerright" placeholder="Update Footer right text"></td>
    </tr>
  </table>
  <input type="submit" name="update" value="Update" style="margin-left:113px;">
</form>
</div>
</article>

<?php include("inc/copyright.php"); ?>