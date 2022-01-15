<?php
$host = "localhost"; 
$user = "postgres"; 
$pass = "toor"; 
$db = "dreamworldcinemas2"; 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
session_start();
if(!isset($_SESSION["Name"]))
header("location:login/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Login Page">
    <meta name="keywords" content="DreamWorld Cinemas,Movies">
    <meta name="author" content="Arunachalam M">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $_SESSION["Name"];?>'s Profile</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="img/logo.jpg" rel="icon">
</head>
<body>
    <a name="top"></a>
    <nav class="navbar">
        <div class="toflex">
            <ul class="flexlist">
                <li class="item"><a href="index.php" class="listlink">Home</a></li>
                <li class="item"><a href="movies.php" class="listlink">Movies</a></li>
                <li class="item" id="adjust"><a href="aboutus.php" class="listlink">About Us</a></li>
            </ul>
        </div>
        <div class="toflex">
            <img src="img/logo.jpg" alt="image" height="80" width="150" class="navlogo">
        </div>
        <div class="toflex">
            <ul class="flexlist">
                <li class="ritem" id="session">Welcome <?php echo $_SESSION["Name"];?></li>
                <li class="ritem"><a href="profile.php" class="popup"><i class="fas fa-user-circle profileicon"></i></a></li>
                <li class="ritem"><a href="login/logout.php" class="popup"><i class="fas fa-sign-out-alt profileicon"></i></a></li>
            </ul>
        </div>
    </nav>
    <!-- Main Page -->
    <main>
        <h2 class="profile-page-title"><?php echo $_SESSION["Name"];?>'s Profile</h2>
        <div class="dbmsdata">
            <h2 class="prosubtitle">Personal Details</h3>
            <div class="prodetails">
                <div class="detail">Name : <?php echo $_SESSION["Name"]; ?></div>
                <div class="detail">Customer ID : <?php echo $_SESSION["Cust_id"]; ?></div>
                <div class="detail">Email id : <?php echo $_SESSION["Email_id"]; ?></div>
                <div class="detail">Age : <?php echo $_SESSION["Age"]; ?></div>
                <div class="detail">Phone number : <?php echo $_SESSION["Phone_no"]; ?></div>
                <button onclick="window.location = 'changepwd.php'" class="cpwd">Change Password
                </button>
            </div>
        </div>
        <div class="dbmsdata">
            <h2 class="prosubtitle">Your Previous Bookings</h2><br>
            <div class="profile-movie-flex">
            <?php
            $qwerty=$_SESSION["Cust_id"];
            $q = <<<EOF
                Select * from "Booking" where "Cust_ID"=$qwerty limit 4;
                EOF;
                $counter=0;
                $result=pg_query($con,$q);
                while($row=pg_fetch_row($result))
                {
                    if(($counter+1)%3==0)
                    echo "</div><div class='profile-ticket'>";
                    
                    
                        $words=explode(' ',$row[8]);
                        $ans="";
                        foreach($words as $i)
                        $ans=$ans.$i;
                    echo "<img src='img/movie/$ans.jpeg' alt='Image' class='profile-book-img'>";
                            echo "<div class='profile-line'>";
                            echo "<div class='line-detail'>Booking ID : $row[0]";
                            echo "</div>";
                            echo "<div class='line-detail'>Movie Name : $row[8]";
                            echo "</div>";
                            echo "<div class='line-detail'>Seats : $row[5]";
                            echo "</div>";
                            echo "<div class='line-detail'>Booked on : $row[4]";
                            echo "</div>";
                            echo "<div class='line-detail'>Show Date : $row[6]";
                            echo "</div>";
                            echo "<div class='line-detail'>Show Time : $row[7]";
                            echo "</div>";
                            echo "<div class='line-detail'>Amount Paid : $row[3]";
                            echo "</div>";
                        $counter++;
                        echo "</div>";
                    
                }
                if($counter==0)
                echo "<div class='no-message'>You have not made in any bookings yet</div>";
            ?>
            </div>
        </div>
        <div class="dbmsdata">
            <h2 class="prosubtitle">Your Recent Comments</h2><br>
            <?php
                     $q = <<<EOF
                    SELECT * FROM "Comments";
                    EOF;
                    $resultt=pg_query($con,$q);
                    $new=0;
                    while($row=pg_fetch_row($resultt))
                    {
                        if($row[2]==$_SESSION["Cust_id"])
                        {
                        $new++;
                        echo "<div class='the-comment'>";
                        echo "<div class='username'><img src='img/profile_demo.png' class='comment-profile-img'>$row[5] commented on <b>$row[1]</b></div>";
                        echo "<div class='show-rating'>Rating : ".$row[4]."</div>";
                        echo "<div class='the-comment-text'>".$row[3]."</div>";
                        echo "</div>";
                        }
                    }
                    if($new==0)
                    {
                    echo "<div class='no-one'>You have not yet commented yet !!</div>";
                    }
                ?>
        </div>
    </main>
    <!-- Footer -->
    <footer>
        <div class="gobacktop">
            <div class="toptext"><a href="#top" class="toptext">Go Back to Top</a></div>
        </div> 
        <div class="footflex">
            <div class="foot">
                <div class="brand">
                <img src="img/logo.jpg" alt="image" height="120" width="220" class="footlogo">
                <div class="tag">WORLD'S MOST INNOVATIVE THEATRE EXPERIENCE</div>
                </div>
            </div>
            <div class="foot">
                <h3 class="footitle">Location</h3><br>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124401.12283056269!2d80.18221953464935!3d13.00156055190747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266b9cbcf7931%3A0xb5cd43774dbd8256!2sDreamworldcinemas!5e0!3m2!1sen!2sin!4v1636814399243!5m2!1sen!2sin"
                    width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="social">
                <h3 class="footitle">Our Social Media </h3><br>
                <div class="footicon">
                <a href="https://instagram.com" class="socilink" id="ins"><i class="socicon fab fa-instagram"></i></a>
                <a href="https://facebook.com" class="socilink" id="fb"><i class="socicon fab fa-facebook"></i></a>
                <a href="https://twitter.com" class="socilink"><i class="socicon fab fa-twitter"></i></a>
                <a href="https://youtube.com" class="socilink" id="you"><i class="socicon fab fa-youtube"></i></a>
                </div>
                <div class="contact">
                    <h3 class="footitle">Contact Us</h3><br>
                    <i class="fas fa-phone-alt"></i> +91 9876543210<br><br>
                    <i class="far fa-envelope"></i> dwcinemasop@gmail.com
                </div>
            </div>
        </div>
    </footer>
    <!-- copyright line -->
    <div class="copy">
        <div class="copytext">COPYRIGHT &copy; 2022 DREAMWORLD CINEMAS&trade; LTD. ALL RIGHTS RESERVED </div>
    </div>
</body>
</html>
