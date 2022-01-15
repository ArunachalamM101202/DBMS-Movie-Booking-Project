<!-- Inserting a movie record -->
<!-- insert into "Movie" values(2,'Spider-Man: No Way Home','Tom Holland,Benedict Cumberbatch,Zendaya',
'Jon Watts','2h 28m','9.0','With Spider-Mans identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.'
,'Action,Adventure,Fantasy','16th December 2021',
'English','https://youtu.be/rt-2cxAiPJk'); -->
<?php
$host = "localhost"; 
$user = "postgres"; 
$pass = "toor"; 
$db = "dreamworldcinemas2"; 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
session_start();
if(!isset($_SESSION["Name"]))
header("location:login/login.php");
$x=$_SESSION["Movie_ID"];
$showid=$_SESSION["showid"];
$q = <<<EOF
    Select * from "Movie";
    EOF;
    $result=pg_query($con,$q);
    while($row=pg_fetch_row($result))
    {
        if($row[0]==$x)
        {
            $moviename=$row[1]; // movie name
            $cast=$row[2]; //cast
            $director=$row[3];
            $duration=$row[4];
            $IMDB=$row[5];
            $synopsis=$row[6];
            $genre=$row[7];
            $releasedate=$row[8];
            $language=$row[9];
            $trailer=$row[10];
            $trailer=substr($trailer,17);
            break;
        }
    }
    $time=$_SESSION["time-selected"];
    $date=$_SESSION["date-selected"];
    $noseats=$_SESSION["no-seats"];
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
    <title>Seat Selection</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="../img/logo.jpg" rel="icon">
    <script>
        function dosome(a)
        {
            if(a<9)
            {
                a="0"+a;
            document.getElementById(a).style.color = "green";
            }
            else
            document.getElementById(a).style.color="green";
        }
    </script>
</head>
<body>
    <a name="top"></a>
    <nav class="navbar">
        <div class="toflex">
            <ul class="flexlist">
                <li class="item"><a href="../index.php" class="listlink">Home</a></li>
                <li class="item"><a href="../movies.php" class="listlink">Movies</a></li>
                <li class="item" id="adjust"><a href="../aboutus.php" class="listlink">About Us</a></li>
            </ul>
        </div>
        <div class="toflex">
            <img src="../img/logo.jpg" alt="image" height="80" width="150" class="navlogo">
        </div>
        <div class="toflex">
            <ul class="flexlist">
                <li class="ritem" id="session">Welcome <?php echo $_SESSION["Name"];?></li>
                <li class="ritem"><a href="../profile.php" class="popup"><i class="fas fa-user-circle profileicon"></i></a></li>
                <li class="ritem"><a href="../login/logout.php" class="popup"><i class="fas fa-sign-out-alt profileicon"></i></a></li>
            </ul>
        </div>
    </nav>
    <main class="seat-selection">
        <h3 class="seat-select-title">Select your preferred seat(s)</h3>
        <div class="seat-details-flex">
            <div class="seat-detail">
                Movie Name : <?php echo $moviename;?>
            </div>
            <div class="seat-detail">
                Date : <?php echo $date;?>
            </div>
            <div class="seat-detail">
                Time : <?php echo $time;?>
            </div>
            <div class="seat-detail">
                Cost of one Ticket : &#8377;200
            </div>
        </div>
        <div class="seat-key">
            <div class="seat-key-detail"><i class='fas fa-couch' id="av"></i> - Available</div>
            <div class="seat-key-detail"><i class='fas fa-couch' id="se"></i> - Selected</div>
            <div class="seat-key-detail"><i class='fas fa-couch' id="bo"></i> - Booked</div>
        </div>
        <div class="seat-icons">
            <form method="post">
                <table class="draw-box">
                    <tr class="adjust"><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td></tr>
            <?php
                $q = <<<EOF
                Select * from "Show";
                EOF;
                $result=pg_query($con,$q);
                while($row=pg_fetch_row($result))
                {
                    if($row[0]==$showid)
                    {
                        $allseats=$row[4];
                        break;
                    }
                }  
                $var="A";
                for($i=0;$i<10;$i++)
                {
                     echo "<tr>";
                    $tempi="{$i}";
                    echo "<td class='need-space'>$var</td>";
                    $var++;
                    for($j=0;$j<10;$j++)
                    {
                        echo "<td>";
                        $tempj="{$j}";
                        $k=$tempi.$tempj;
                        $m=$k.'a';
                        
                        if(strpos($allseats,$k)!==false)
                        {
                            echo "<label for='$m' onclick='dosome(".$tempi.$tempj.")'>";
                            echo "<i class='fas fa-couch the-seat' id='$k'></i>";
                        echo "</label>";
                            echo "<input type='checkbox' value='$k' name='seats[]' id='$m' hidden>";
                        }
                        else{
                            echo "<i class='fas fa-couch the-seat' id='$m' onclick='change($m)'></i>";
                            echo "<input type='checkbox' value='$k' name='seats[]' id='$k' hidden>";
                            echo "
                            <script>document.getElementById('$k').disabled = true;</script>";
                            echo "
                            <script>document.getElementById('$m').style.color = 'red';</script>";
                        }
                        echo "</td>";
                    }
                    echo "</tr><br>";
                }
            ?>
            </table>
            <input type="submit" value="Book Tickets" class="book-ticket-button">
            </form>
        </div>
    </main>
    <?php
if(isset($_POST["seats"]))
{
    $tempp=$allseats;$answer="";
    $c=0;
    foreach($_POST["seats"] as $i)
    {
        $c++;
        $tempp=str_replace($i,'',$tempp);
    }
    if($c>$_SESSION["no-seats"])
    {
        echo "<script>alert('You have selected more no of seats');</script>";
    }
    else if($c<$_SESSION["no-seats"])
    {
        echo "<script>alert('You have selected less no of seats');</script>";
    }
    else
    {
    foreach($_POST["seats"] as $i)
    {
        if($i[0]=="0")
        $answer=$answer."A";
        else if($i[0]=="1")
        $answer=$answer."B";
        else if($i[0]=="2")
        $answer=$answer."C";
        else if($i[0]=="3")
        $answer=$answer."D";
        else if($i[0]=="4")
        $answer=$answer."E";
        else if($i[0]=="5")
        $answer=$answer."F";
        else if($i[0]=="6")
        $answer=$answer."G";
        else if($i[0]=="7")
        $answer=$answer."H";
        else if($i[0]=="8")
        $answer=$answer."I";
        else if($i[0]=="9")
        $answer=$answer."J";
        $answer=$answer.$i[1].", ";
    }
    $_SESSION["seats-selected"]=$answer;
    $_SESSION["show-id"]=$showid;
    $q= <<<EOF
        Update "Show" set "Seats"='$tempp' where "Show_ID"=$showid;
        EOF;
        $result=pg_query($con,$q);
        echo "<script>window.location.pathname = 'DBMS_project/DBMS_2020115013/book_movie/select3.php';</script>";
    }
}
?>
    <!-- Footer -->
    <footer>
        <div class="gobacktop">
            <div class="toptext"><a href="#top" class="toptext">Go Back to Top</a></div>
        </div> 
        <div class="footflex">
            <div class="foot">
                <div class="brand">
                <img src="../img/logo.jpg" alt="image" height="120" width="220" class="footlogo">
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

