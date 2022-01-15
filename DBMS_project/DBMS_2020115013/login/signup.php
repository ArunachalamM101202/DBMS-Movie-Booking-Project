<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="../img/logo.jpg" rel="icon">
</head>
<body class="isign">
    <div class="wholesignup">
        <h2 class="signuptitle">Sign Up</h2>
        <form method="post" class="formsignup">
            <input type="text" class="inpbox" placeholder="Your Name" name="namee" required><br>
            <input type="text" class="inpbox" placeholder="Your Age" name="age" required><br>
            <input type="text" class="inpbox" placeholder="Your Phone No" name="phno" required><br>
            <input type="text" class="inpbox" placeholder="Your Email id" name="emailid" required><br>
            <input type="password" class="inpbox" placeholder="Your Password" name="pwd" required><br>
            <input type="password" class="inpbox" placeholder="Confirm Password" name="cpwd" required><br>
            <input type="submit" value="Sign Up" class="signbut">
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
if(isset($_POST["emailid"]) && isset($_POST["namee"]) && isset($_POST["pwd"]) && isset($_POST["phno"]) && isset($_POST["cpwd"]) && isset($_POST["age"]))
{
    $a=$_POST["namee"];
    $b=$_POST["age"];
    $c=$_POST["phno"];
    $d=$_POST["emailid"];
    $e=$_POST["pwd"];
    $q = <<<EOF
    SELECT * FROM "Customer";
    EOF;
    $q1 = <<<EOF
    SELECT * FROM "Customer";
    EOF;
    $check = pg_query($con,$q);
    $flag=0;
    while($row=pg_fetch_row($check))
    {
        if($row[2]==$d)
        {
            $flag=1;
            break;
        }
    }
    $ret = pg_query($con,$q1);
    $count=0;
    $count = pg_num_rows($ret);
    $count=$count+1;
    if($flag==0)
    {
        $ins = <<<EOF
        INSERT INTO "Customer" values('$count','$a','$d','$e','$b','$c');
        EOF;
    $ret=pg_query($con,$ins);
    echo "<script>alert('Account has been created')</script>";
    echo "<script>window.location.replace('login.php');</script>";
    }
    else
    {
        echo "<script>alert('Account already exists')</script>";
        echo "<script>window.location.replace('signup.php')</script>";
    }
    
}
