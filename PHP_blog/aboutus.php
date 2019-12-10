<?php include("inc/header.php"); ?>
<?php include("inc/rightside.php"); ?>
<style>
  #activeaboutus{
    background-color:green;
}
#about{
  width: 75%;
  background-color: rgb(94, 37, 4);
  height: 100%;
  float: left;
  text-align:justify;
  color: rgb(211, 192, 181);
}
#p1{
  padding: 20px;
}
#p{
  margin-left: 20px;
}
</style>

<body>
 <!--Database query start-->
 <?PHP
    $query="SELECT*FROM db_nav";
    $post=$db->select($query);
    if($post){
        while($result=$post->fetch_assoc()){
?>
   <div id="about">
      <h2 id="p"><u>About Us</u></h2>
         <p id="p1">
         <?php echo $result["aboutus"]; ?>
      </p>
   </div>
   <?php } ?><!--while loop end here-->
   <?php }else{ header("Location:404.php");} ?><!--if condition end here-->
</body>
<?php include("inc/footer.php");?>