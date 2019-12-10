<?php include("inc/navigation.php"); ?>
<?php include("inc/sidebar.php"); ?>
<title>Admin panel || Header Update</title>
<style>
#hea_option{
  background-color:#FDFDFD;
}
</style>
<article class="maincontent clear">
<div class="content">
  <h2>Update Header</h2>  <!--Body header-->
  <?php
  $query="SELECT*FROM header";
  $header=$db->select( $query);
  if( $header){
    while($header_result=$header->fetch_assoc()){
  ?>
<table>
    <tr>
      <td><?php echo $header_result['name'].":"; ?></td>
            <td><?php echo $header_result['title'].' '; ?><a href="headupdate.php?head_id=<?php echo $header_result['id'];?>"> Edit</a></td>
             </tr>
  </table><br/>
    <?php } }else{echo "LINK not found";} ?>

<?php include("inc/copyright.php"); ?>
