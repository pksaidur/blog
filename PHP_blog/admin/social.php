<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Update Social</title>
<style>
#soc_option{
  background-color:#FDFDFD;
}
</style>

<article class="maincontent clear">
<div class="content">
  <h2>Update Social</h2>  <!--Body header-->
  <?php
  $query="SELECT*FROM db_social";
  $social=$db->select( $query);
  if( $social){
    while($social_result=$social->fetch_assoc()){
  ?>
<table>
    <tr>
      <td><?php echo $social_result['name'].":"; ?></td>
            <td><?php echo $social_result['link'].' '; ?><a href="socialupdate.php?social_id=<?php echo $social_result['id'];?>"> Edit</a></td>
             </tr>
  </table><br/>
    <?php } }else{echo "LINK not found";} ?>
<?php include("inc/copyright.php"); ?>