<?php include("inc/header.php"); ?>
<?php include("inc/rightside.php"); ?>
<html>
<style>
    #activecontract{
    background-color:green;
}
</style>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    $fname=mysqli_real_escape_string($db->link,$fm->validation($_POST['firstname']));
    $lastname=mysqli_real_escape_string($db->link,$fm->validation($_POST['lastname']));
    $phone=mysqli_real_escape_string($db->link,$fm->validation($_POST['phone']));
    $email=mysqli_real_escape_string($db->link,$fm->validation($_POST['email']));
    $massage=mysqli_real_escape_string($db->link,$fm->validation($_POST['massage']));

if($fname==''||$lastname==''||$phone==''||$email==''||$massage==''){
    $error='Empty not accepted';
}else{
    $query="INSERT INTO 
    db_contract(fname,lname,mobile,email,massage)
    VALUES('$fname','$lastname','$phone','$email','$massage')
    ORDER BY id ASC";
    $contract_query=$db->insert($query);
?>  
     <?php 
     if($contract_query){
        ?>  
       <script>alert('Massage sent Successfully')</script>
     <?php
    }else{ ?>
     <script> alert('Fail! Try again')</script>
<?php } } } ?>


<body>


<div class='frombody'>
        <form action="" method="POST">

<?php if (isset($error)){
 echo "<span style='color:red;margin-left:29%'>$error</span><br>";
} ?>
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your first name.." required='1'>
    
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required='1'>

        <label for="phone">Mobile number</label>
        <input type="tel" id="phone" name="phone" placeholder="Your mobile number.." required='1'>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email.." required='1'>

        <label for="massage">Massage</label>
        <textarea id="lname" name="massage" placeholder="Your Massage.." required='1'></textarea>

        <input  type="submit" value="Submit">
        </form>
    </div>
</body>
</html>



<?php include("inc/footer.php");?>