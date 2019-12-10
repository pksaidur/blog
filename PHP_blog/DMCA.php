<?php include("inc/header.php"); ?>
<?php include("inc/rightside.php"); ?>
<style>
    #activeDMCA{
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
#p{
  padding: 20px;
}
#h2{
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
      <h2 id="h2"><u>DMCA</u></h2>
         <p id="p">
         <?php echo $result["dmca"]; ?>      
      </p>
   </div>
</body>
<?php } ?><!--while loop end here-->
   <?php }else{ header("Location:404.php");} ?><!--if condition end here-->
<?php include("inc/footer.php");?>