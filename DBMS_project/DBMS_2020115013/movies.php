<!-- 0 - Movie ID -->
<!-- 1 - Movie Name -->
<!-- 2 - Cast -->
<!-- 3 - Director -->
<!-- 5 - Duration -->
<!-- 6 - IMDB -->
<!-- 7 - Synopsis -->
<!-- 8 - Genre -->
<!-- 9 - Release Date -->
<!-- 10 - Language -->
<!-- 11 - Trailer Link -->
<!-- <input type='checkbox' value='$row[0]' name='movie' id='$row[0]'> -->
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
    <title>Movies</title>
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
        <div class="movie-list">
            
            <!-- <img src="img/movie/83.jpeg" -->
            <h3 class="movie-list-title">Now Showing</h3>
            <div class="toflexphoto"><div class="photo-disp">
                <?php
                    $tt = 0;
                    $q= <<<EOF
                    Select * from "Movie";
                    EOF;
                    $result=pg_query($con,$q);
                    echo "<form method='post' id='movie_disp_list'>";
                    while($row=pg_fetch_row($result))
                    {
                        if($tt % 3 == 0)
                        echo "</div><div class='photo-disp submit'>";
                        $words=explode(' ',$row[1]);
                        $ans="";
                        foreach($words as $i)
                        $ans=$ans.$i;
                        $s = "img/movie/$ans.jpeg";
                        if($row[0]==1)
                        echo "<input type='radio' id='$row[0]' value='$row[0]' name='answer'>";
                        else
                        echo "<input type='radio' id='$row[0]' value='$row[0]' name='answer' >";
                        echo "<label for='submithere'><label for=$row[0]>";
                        echo "<img src=$s alt='image' class='movie-img-disp' onclick='execute()'></label></label>";
                        echo "<div class='movie-text'>$row[1]</div>";
                        $tt=$tt+1;
                    }
                    echo "<input type='submit' id='submithere' hidden>";
                    echo "</form>";
                if($tt%3!=0)
                echo "</div>";
                ?>
            </div>
            
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
<script>
function execute()
{
    document.getElementById("movie_disp_list").submit();
}
</script>

<?php
if(isset($_POST["answer"]))
{
    $i = $_POST["answer"];
    session_start();
    $_SESSION["Movie_ID"]=$i;
    echo "<script>window.location.pathname = 'DBMS_project/DBMS_2020115013/book_movie/movie_info.php';</script>";
}
?>