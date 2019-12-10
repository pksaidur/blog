<?php include("inc/header.php"); ?>

<?php $db=new database(); 
      $fm=new Format();
?>
    <!--Slide start-->
    <!-- Imge slider -->
<div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
                <img src="image/desktop_pic (6).jpg" width="100%" height="50%">
            <div class="text">Caption One</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
                <img src="image/desktop_pic (4).jpg" width="100%" height="50%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
                <img src="image/desktop_pic (50).jpg" width="100%" height="50%">
            <div class="text">Caption Three</div>
        </div>

</div>
<br>

    <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
    </div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
    <!--Slide End-->


   
<?php include("inc/rightside.php"); ?> <!--...//Right side..-->
    <style>
        #activehome{
            background-color:green;
    }
</style>
<link rel="stylesheet" type="text/css" href="css/body.css">
<link rel="stylesheet" type="text/css" href=" css/slide_img.css">
<body>

<!--Pagination-->
<?php 
    $per_page=3;
    if(isset($_GET['page'])) {
        $page=$_GET['page'];
    }else{  
        $page=1;
    }
    $start_form=($page-1)*$per_page;
?>

<!--Database query start-->
<?PHP
    $query="SELECT*FROM tbl_post LIMIT $start_form,$per_page";
    $post=$db->select($query);
    if($post){
        while($result=$post->fetch_assoc()){
?>

<!--Body Start-->
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

<!--Pagination start--><!--Pagination start--><!--Pagination start--><!--Pagination start-->
<?php
    $query="SELECT*FROM tbl_post";
    $result=$db->select($query);
    $total_rows=mysqli_num_rows($result);
    $total_pages=ceil($total_rows/$per_page);

    echo "<span class='pagination'><a href='index.php?page=1'>First page ..</a>";

    for($i=1;$i<=$total_pages;$i++){
        echo "<a href='index.php?page=$i'>$i</a>";
    }


    echo "<a href='index.php?page=$total_pages'>.. Last page</a></span>";
?>
<!--Pagination end--><!--Pagination end--><!--Pagination end--><!--Pagination end--><!--Pagination end-->

<?php }else{ header("Location:404.php");} ?><!--if condition end here-->

</body>
<!--Body end-->
<?php include("inc/footer.php");?>