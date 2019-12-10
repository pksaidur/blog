<?php include("inc/header.php"); ?>
<?php include("inc/rightside.php"); ?> <!--...//Right side..-->

<!--...//catch search..-->

<?php 
    if(isset($_POST["search"]) || $_POST["search"]!=NULL) {        //catch search info
        $search=$fm->validation($_POST['search']);        //validation is a function property format class
    }else{   
        header('Location:404.php');               
    }
?>


<!--Database query-->
<?PHP
    $query_search="SELECT*FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' LIMIT 4";
    $post_search=$db->select($query_search);

    if($post_search){
        while($result_search=$post_search->fetch_assoc()){
?>

    <div id="leftbody">
            <div class="blog">`
                <h2><a href="post.php?id=<?php echo $result_search['id'];?>"><?php echo $result_search["title"]; ?></a></h2>
              
                <h4><?php echo $fm->formateDate($result_search["date"])." by ".$result_search["author"]; ?></h4>
              
                <img src="<?php echo $result_search["image"]; ?>" altr="Children Image">
              
                <p><?php echo $fm->textShort($result_search["body"]); ?>
                <a href="post.php?id=<?php echo $result_search['id'];?>">Read more</a>
                </p>
            </div>
    </div>


    <?php } ?><!--while loop end here-->
    <?php }else{ ?><!--if condition end here-->
        <h1 style="color:red;width:30%;margin-left:25%;margin-top:8%">Your search result not found</h1>
    <?php } ?>
<?php include("inc/footer.php");?>