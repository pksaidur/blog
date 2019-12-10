<?php include("config/config.php"); ?>       <!--Database-->
<?php include("library/database.php"); ?>    <!--Database-->
<?php include("helpers/format.php"); ?>
<?php $db=new database(); 
      $fm=new Format();
?>                          <!--Database object create-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web_project</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet_header.css">
</head>
<body style="background-color: rgb(18, 61, 28);">

<!-- Header -->
<div class="header">
    <div class="leftSide">
       <a href="index.php"> <img src="icon/logo.png" name="mainlogo" alt="web logo">
       <?php
        $query="SELECT*FROM header WHERE id=1";
        $header=$db->select($query);
        if($header){
            while($result_header=$header->fetch_assoc()){
        ?>

        <h1><?php echo $result_header['title']; ?></h1>
            
        <?php } }else{echo 'error:header403';} ?>
        
        <?php
        $query="SELECT*FROM header WHERE id=2";
        $header=$db->select($query);
        if($header){
            while($result_header=$header->fetch_assoc()){
        ?>
        <h5><i>"<?php echo $result_header['title']; ?>"</i></h5></a>
            
        <?php } }else{echo 'error:header403';} ?>
        
        <ul>
                <li id="activehome"><a href="index.php?">Home</a></li>
                <li id="activeaboutus"><a href="aboutUs.php?">About Us</a></li>
                <li id="activeprivacy"><a href="privacy.php?">Privacy</a>
                <li id="activeDMCA"><a href="DMCA.php?">DMCA</a></li>
                <li id="activecontract"><a href="contract.php?">Contract</a></li>
            </ul>
    </div>
    <div class="rightSide">
        <div class="mediaIcon">

        <?php
        $query="SELECT*FROM db_social";
        $social_link=$db->select($query);
        if($social_link){
            while($result_link=$social_link->fetch_assoc()){
        ?>
            <a href="<?php echo $result_link['link']; ?>"> <img src="<?php echo $result_link['image']; ?>" alt="Facebook logo"></a>
            <?php } }else{echo 'error:icon404';} ?>
        </div>
        <div class="search">
        <form action="search.php" method="post">
            <input  type="text" name="search" placeholder="Search..."> 
            <input  type="submit" value="Search">
        </form>
        </div>
    </div>

</div>
</body>
</html>