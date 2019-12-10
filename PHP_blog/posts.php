<?php include("inc/header.php"); ?>
<?php include("inc/rightside.php"); ?> <!--...//Right side..-->

<?php 
    if(isset($_GET["catagory"]) || $_GET["catagory"]!=NULL) {        //catch catagory id
        
        $cat_name=$_GET['catagory'];
    }else{

        ?>
       <script> location.href = "index.php"; </script>
    <?php } ?>



<?PHP
    $query="SELECT*FROM tbl_post WHERE cat='$cat_name'";
    $post=$db->select($query);

    if($post){
        while($result=$post->fetch_assoc()){
?>

    <div id="leftbody">
            <div class="blog">`
                <h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result["title"]; ?></a></h2>
              
                <h4><?php echo $fm->formateDate($result["date"])." by ".$result["author"]; ?></h4>
              
                <img src="<?php echo $result["image"]; ?>" altr="Children Image">
              
                <p><?php echo $fm->textShort($result["body"]); ?>
                <a href="post.php?id=<?php echo $result['id'];?>">Read more</a>
                </p>
            </div>
    </div>


    <?php } ?><!--while loop end here-->
    <?php }else{  ?><!--if condition end here-->
         <h2 style="color:red;margin-left:20%">Sorry, No post available in this catagory.</h2>
        <?php } ?>
<?php include("inc/footer.php");?>