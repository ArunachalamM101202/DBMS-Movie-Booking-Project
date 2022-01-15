<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="img/logo.jpg" rel="icon">
</head>
<body class="isign">
    <div class="wholesignup">
        <h2 class="signuptitle">Delete Account</h2>
        <form method="post" class="formsignup">
            <div class="before-delete">Are you sure that you want to delete your account, as it cannot be recovered later</div>
            <input type="text" class="inpbox" placeholder="Enter Email address" name="namee" required><br>
            <input type="password" class="inpbox" placeholder="Your Password" name="pwd" required><br>
            <div class="before-delete">Type "Iamwillingtodeletemyaccount" in the below checkbox</div>
            <input type="text" class="inpbox" placeholder="Confirmation Message" name="age" required><br>
            <input type="submit" value="Delete Account" class="signbut">
        </form>
    </div>
</body>
</html>

<?php
$host = "localhost"; 
$user = "postgres"; 
$pass = "toor"; 
$db = "dreamworldcinemas2"; 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
if(isset($_POST["namee"]) && isset($_POST["pwd"]) && isset($_POST["age"]))
{
    $a=$_POST["namee"];
    $b=$_POST["pwd"];
    $c=$_POST["age"];
    if($c=="Iamwillingtodeletemyaccount")
    {
        $q = <<<EOF
    Select * from "Customer";
    EOF;
    $result=pg_query($con,$q);
    $flag=0;
    while($row=pg_fetch_row($result))
    {
        if($row[2]==$a && $row[3]==$b)
        {
            $flag=1;
            $ans=$row[0];
            break;
        }
    }
    if($flag==0)
    {
        echo "<script>alert('Account does not exist');</script>";
    echo "<script>window.location.replace('login/login.php');</script>";    
    }
    else
    {
        $q = <<<EOF
    Delete from "Customer" where "Cust_ID"=$ans;
    EOF;
        $result=pg_query($con,$q);
    echo "<script>alert('Account has been deleted successfully !!');</script>";
    echo "<script>window.location.replace('login/login.php');</script>";
    }
}
    else
    echo "<script>alert('Confimation Message is incorrect');</script>";
}
?>