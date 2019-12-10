<?php include("inc/header.php"); ?>
<?php include("inc/rightside.php"); ?>  <!--Right side/sidebar--><!--Right side/sidebar--><!--Right side/sidebar-->
<?php 
    if(isset($_GET["id"]) || $_GET["id"]!=NULL || empty($_GET["id"])==false){
        $id=$_GET['id'];
    }else{
                ?>
         <script> location.href = "index.php"; </script>
             <?php } ?>


</style> <!--For show Active navigation-->
<link rel="stylesheet" type="text/css" href="css/body.css">
<link rel="stylesheet" type="text/css" href=" css/slide_img.css">
<body>

<!--Database query start--><!--Database query start--><!--Database query start-->
<?PHP
    $query="SELECT*FROM tbl_post WHERE id='$id'";
    $post=$db->select($query);
    if($post){
        while($result=$post->fetch_assoc()){
?>

<!--Body Start--><!--Body Start--><!--Body Start--><!--Body Start-->
        <div id="leftbody">
                <div class="blog">`
                    <h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result["title"]; ?></a></h2>
                
                    <h4><?php echo $fm->formateDate($result["date"])." by ".$result["author"]; ?></h4>
                
                    <img src="<?php echo $result["image"]; ?>" altr="Children Image">
                
                    <p><?php echo $result["body"]; ?><br/>
                    <a style="float:right;padding:10px" href="index.php?page=<?php echo ceil($result['id']/3);?>">Back page</a> <!--ceil($result['id']/3) for page number-->
                    </p>
                </div>
        </div>
        
       

<!--start condition for related post -->
<div class="relatedpost">
    <h2>Related Articles</h2>

    <?php 
        $cat_id =$result['cat'];
        $query_related ="SELECT*FROM tbl_post WHERE cat='$cat_id' LIMIT 6";
        $post_related =$db->select($query_related);
            if($post_related){
                while($related_result =$post_related->fetch_assoc()){
    ?>
    

                <a href="post.php?id=<?php echo $related_result['id'];?>">
                    <img src="<?php echo $related_result['image']; ?>" alt="post image">
                </a>

            <?php } ?>

            <?php }else{ echo "No Related post";} ?>       <!--end related post condition-->
</div> 

         <?php } ?><!--while loop end here-->
    <?php }else{         ?>
       <script> location.href = "404.php"; </script>
    <?php } ?>           <!--if condition end here-->

</body>
<!--Body end--><!--Body end--><!--Body end--><!--Body end--><!--Body end-->
<?php include("inc/footer.php");?>