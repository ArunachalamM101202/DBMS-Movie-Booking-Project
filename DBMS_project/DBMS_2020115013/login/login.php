<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="../img/logo.jpg" rel="icon">
</head>

<body class="logsignback">
        <div class="toflexlogin">
            <div class="imglogin">
                <img src="../img/login.png" alt="image" class="loginimg" height="450" width="500">
            </div>
            <header class="wholeloginbox">
                <div class="logintext">
                    <h2 class="logintitle">Login</h2>
                    <form method="post">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Enter email id" class="logintextbox" name="email"><br>
                        <i class="fas fa-key"></i><input type="password" placeholder="Enter password"
                            class="logintextbox" name="password"><br>
                        <div class="forgot"><a href="../delete_rec.php" class="forgotlink">Delete Account?</a></div>
                        <input type="submit" value="Login" class="loginbutton">
                    </form>
                </div>
                <div class="signup">
                    <span class="signtext"><a href="signup.php" class="signlink">New to DreamWorld Cinemas?</a></span>
                </div>
            </header>
        </div>
</body>
</html>
<?php
$host = "localhost"; 
$user = "postgres"; 
$pass = "toor"; 
$db = "dreamworldcinemas2"; 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
if(isset($_POST["email"]) && isset($_POST["password"]))
{
    $a=$_POST["email"];
    $b=$_POST["password"];
    $q = <<<EOF
    Select * from "Customer";
    EOF;
    $result=pg_query($con,$q);
    $flag=0;
    while($row=pg_fetch_row($result))
    {
        if($row[2]==$a && $row[3]==$b)
        {
            $a=$row[0];//cust id
            $b=$row[1];//cust name
            $c=$row[2];//email
            $d=$row[4];//Age
            $e=$row[5];//Phoneno;
            $flag=1;
            break;
        }
    }
    if($flag==0)
    {
        echo "<script>alert('Wrong Email id/Password');</script>";
        header('login.php');
    }
    else
    {
        session_start();
        $_SESSION["Name"]=$b;
        $_SESSION["Cust_id"]=$a;
        $_SESSION["Email_id"]=$c;
        $_SESSION["Age"]=$d;
        $_SESSION["Phone_no"]=$e;
        echo "<script>window.location.pathname = 'DBMS_project/DBMS_2020115013/index.php';</script>";
    }
}
?>