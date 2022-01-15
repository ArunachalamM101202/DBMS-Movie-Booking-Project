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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>
        <?php echo $moviename;?>
    </title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3a7f46eb0.js" crossorigin="anonymous"></script>
    <link href="../img/logo.jpg" rel="icon">
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
                <li class="ritem" id="session">Welcome
                    <?php echo $_SESSION["Name"];?>
                </li>
                <li class="ritem"><a href="../profile.php" class="popup"><i class="fas fa-user-circle profileicon"></i></a>
                </li>
                <li class="ritem"><a href="../login/logout.php" class="popup"><i
                            class="fas fa-sign-out-alt profileicon"></i></a></li>
            </ul>
        </div>
    </nav>
    <main class='movie-details'>
        <div class="info-flex">
            <div class="movie-info-flex photo-info">
                <?php 
                $words=explode(' ',$moviename);
                        $ans="";
                        foreach($words as $i)
                        $ans=$ans.$i;
                    echo "<img src='../img/movie/$ans.jpeg' alt='Image' class='movie-book-img'>";
                ?>
            </div>
            <div class="movie-info-flex all-movie-details">
                <h3 class='movie-title-info'>
                    <?php echo $moviename;?>
                </h3>
                <div class="movie-tag-flex">
                    <div class="movie-tag">2D</div>
                    <div class="movie-tag">
                        <?php echo $language;?>
                    </div>
                    <div class="movie-tag">
                        <?php echo $duration;?>
                    </div>
                </div>
                <div class="movie-subtitle">Genre :
                    <?php echo $genre;?>
                </div>
                <div class="movie-subtitle">IMDB :
                    <?php echo $IMDB;?>
                </div>
                <div class="movie-subtitle">Release Date :
                    <?php echo $releasedate;?>
                </div>
            </div>
            <div class="movie-info-flex">
                    <button class="book-now" onclick="change()">Book Now</button>
            </div>
        </div>
        <div class="synopsis">
            <h3 class="synopsis-title">Synopsis</h3>
            <div class="synop-text">
                <?php echo $synopsis;?>
            </div>
        </div>
        <div class="synopsis">
            <h3 class="synopsis-title">Cast</h3>
            <div class="synop-text">
                <?php echo $cast;?>
            </div>
        </div>
        <div class="synopsis">
            <h3 class="synopsis-title">Director</h3>
            <div class="synop-text">
                <?php echo $director;?>
            </div>
        </div>
        <div class="synopsis">
            <h3 class="synopsis-title">Trailer</h3>
            <?php
            echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$trailer' title='YouTube video player'
                frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
                allowfullscreen></iframe>";?>
        </div>
        <div class="synopsis">
            <h3 class="synopsis-title">Comments & Ratings</h3>
            <form method="post">
                <div class="comment-text">Enter your Rating : </div>
                <input type="range" value="1" min="1" max="10" oninput="this.nextElementSibling.value = this.value" name="rating" required>
                <output>1</output><br>
                <div class="comment-text">Enter your Comment(less than 500 words) : </div>
                <textarea placeholder="Write your comment here.." rows="7" cols="70" name="comment" required></textarea><br>
                <input type="submit" value="Post Comment" class="comment-button"><br>
            </form>
                <br><h3 class="synopsis-title">Top Reviews & Ratings</h3>
                <?php
                     $q = <<<EOF
                    SELECT * FROM "Comments";
                    EOF;
                    $resultt=pg_query($con,$q);
                    $new=0;
                    while($row=pg_fetch_row($resultt))
                    {
                        if($row[1]==$moviename)
                        {
                        $new++;
                        echo "<div class='the-comment'>";
                        echo "<div class='username'><img src='../img/profile_demo.png' class='comment-profile-img'>$row[5] commented</div>";
                        echo "<div class='show-rating'>Rating : ".$row[4]."</div>";
                        echo "<div class='the-comment-text'>".$row[3]."</div>";
                        echo "</div>";
                        }
                    }
                    if($new==0)
                    {
                    echo "<div class='no-one'>No one has posted their reviews yet !!</div>";
                    }
                ?>
        </div>
    </main>
    <?php
    if(isset($_POST["comment"]) && isset($_POST["rating"]))
    {
        $b=$_POST["comment"];
        $a=$_POST["rating"];
        $ccc=$_SESSION["Cust_id"];
        $efgh=$_SESSION["Name"];
        $q1 = <<<EOF
    SELECT * FROM "Comments";
    EOF;
    $check = pg_query($con,$q);
    $flag=1+pg_num_rows($check);
        $ins = <<<EOF
        INSERT INTO "Comments" values($flag,'$moviename','$ccc','$b','$a','$efgh');
        EOF;
    $ret=pg_query($con,$ins);
    echo "<script>alert('Comment has been posted successfully')</script>";
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
                    <a href="https://instagram.com" class="socilink" id="ins"><i
                            class="socicon fab fa-instagram"></i></a>
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
    function change()
    {
        window.location.pathname = 'DBMS_project/DBMS_2020115013/book_movie/select1.php';
    }
</script>
