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
    <title>Dreamworld Cinemas</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="img/logo.jpg" rel="icon">
    <script>
        counter = 1;
function slider(i){
    counter =counter+i;
    
    if(counter==1)
    {
        document.getElementById("photo1").style.display = "block";
        document.getElementById("photo2").style.display = "none";
        document.getElementById("photo3").style.display = "none";
    }
    else if(counter==2)
    {
        document.getElementById("photo1").style.display = "none";
        document.getElementById("photo2").style.display = "block";
        document.getElementById("photo3").style.display = "none";
    }
    else if(counter==3)
    {
        document.getElementById("photo1").style.display = "none";
        document.getElementById("photo2").style.display = "none";
        document.getElementById("photo3").style.display = "block";
    }
    else if(counter>3)
    {
        counter=0;
    }
    else{
        counter=4;
    }
}
setInterval(function(){ slider(1); }, 4500);
    </script>
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
    <main class="index-page">
        <div class="image-slider">
            <div class="lefticon"><i class="fas fa-chevron-left" onclick="slider(-1)"></i></div>
            <div class="righticon"><i class="fas fa-chevron-right" onclick="slider(1)"></i></div>
            <div class="photo" id="photo1">
                <img src="img/slider/pic2.jpg" alt="image" width="1060" height="450">
                <h3 class="text1">"DreamWorld Cinemas is one of the best theatres in India that provides customer-focused cinema experience." - <i>Firstpost</i></h3>
            </div>
            <div class="photo" id="photo2">
                <img src="img/slider/pic1.jpg" alt="image" width="1060" height="450">
                <h3 class="text1">"DreamWorld Cinemas draws you into something as close to reality as you have ever experienced" - <i>The Hindu</i></h3>
            </div>
            <div class="photo" id="photo3">
                <img src="img/slider/pic3.jpg" alt="image" width="1060" height="450">
                <h3 class="text1">Go Deeper Into The World's Most Innovative Movie-Going Experience</h3>
            </div>
        </div>
        <div class="covid-safe">
            <h3 class="covid-title">We are 100% Vaccinated</h3>
            <img src="https://www.pvrcinemas.com/pvrstatic/pvr-care/images/banner2.jpg" class="index-img1">
        </div>
        <div class="watch-later">
            <div class="watch-flex">
                <h3 class="watch-later-title">Watch the Latest Movies at our Theatres for the <br> Best Experience</h3>
                <button class="watch-now-button" onclick="window.location.href = 'movies.php'" >Watch Now</button>
            </div>
            <div class="watch-flex">
                <img src="img/watch.jpg" alt="Image" class="watch-image">
            </div>
        </div>
        <div class="newspaper-reviews">
            <h2 class="newspaper-title">Popular Reviews</h2>
            <div class="toflexnews">
                <div class="newspaper-review">
                    <div class="star-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="newspaper-content">
                        "Being a GOLD Member of DreamWorld Cinemas is almost equivalent of living like a King in a Palace" - <i>The Hindu</i>
                    </div>
                </div>
                <div class="newspaper-review">
                    <div class="star-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="newspaper-content">
                        "Experience the best IMAX&trade; Experience in the country only at DreamWorld Cinemas" - <i>The Times of India</i>
                    </div>
                </div>
                </div>
                <div class="toflexnews">
                <div class="newspaper-review">
                    <div class="star-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="newspaper-content">
                        "There are very few theatres today that maintain the same standard all the time and DreamWorld Cinemas is definitely one among them" - <i>The Indian Express</i>
                    </div>
                </div>
                <div class="newspaper-review">
                    <div class="star-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="newspaper-content">
                        "The only theatre in the country that provides the Best Cinema Viewing Experience along with delicious Gorumet Food" - <i>Filmfare</i>
                    </div>
                </div>
                </div>
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
                    width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" class="map-adjust"></iframe>
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