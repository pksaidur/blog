
<link rel="stylesheet" type="text/css" href="css/body.css">
<body>
<!--Side bar-->
    <div class=rightBody>
            <div class="catagory">
                 <h1>Catagory</h1>

            <!--Database query start-->
                <?PHP
                    $query_catagory="SELECT*FROM db_catagory";
                    $post_catagory=$db->select($query_catagory);
                    if($post_catagory){
                        while($result_catagory=$post_catagory->fetch_assoc()){
                ?>             
                    <li><a  href="posts.php?catagory=<?php echo $result_catagory['cat_name']; ?>">  <!--create catagory link-->
                        <?php echo $result_catagory['cat_name'];?>                          <!--call and print catagory name-->
                    </a></li>
                

                <?php } }else{ echo "No Catagory created";} ?><!--if condition end here-->
            </div>


            <div class="latestArticle">
            <!--Database query start-->
                 <h1>Latest Article</h1>
                <?PHP
                    $query="SELECT*FROM tbl_post LIMIT 5";
                    $post=$db->select($query);
                    if($post){
                        while($result=$post->fetch_assoc()){
                ?>
                <!--1-->
                <a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title']; ?>
                <img src="<?php echo $result['image']; ?>" altr="Children Image"></a>
                <p><?php echo $fm->textShort($result["body"],100); ?>
                <a href="post.php?id=<?php echo $result['id'];?>">Read more</a>
                </p>
            
            <?php } ?><!--while loop end here-->
            <?php }else{         ?>
       <script> location.href = "404.php"; </script>
    <?php } ?><!--if condition end here-->
            </div>

  </div>
  </body>
