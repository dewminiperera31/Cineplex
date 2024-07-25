<?php
session_start();
date_default_timezone_set('Asia/Colombo');

if(!isset($_SESSION['username'])){
    header('Location: Login1.php');
    exit; // Ensure script execution stops after redirection
} 

// Include Database.php and establish connection
require 'Database.php';
$con = getConnection();

// Fetch movie names from database
$sql = "SELECT movieName FROM tblmovie";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>CINEPLEX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Global styles */
    body {
        font-family: Arial, sans-serif;
    }

    .container1 {
        background-color: white;
        color: rgb(15, 12, 12);
        text-align: center;
        height: 100px;
        padding: 15px;

    }

    a:hover {
        color: blue;
        font-size: 18px;
    }

    a:active {
        color: yellow;
    }

    #object1 {
        float: left;
        width: 100px;
        height: 50px;
    }

    /* Header styles */
    header {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
    }

    header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 28px;
    }

    nav ul {
        list-style: none;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
    }

    /* Footer styles */
    footer {
        background-color: #333;
        color: #fff;
        padding: 30px;
        text-align: center;
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 10px;

    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    </style>

</head>

<body>
    <form>
        <div class="container1">
            <img id="object1" src="Pictures/logo.png">


            <h1><b>CINEPLEX</b></h1>
        </div>

        <header>
            <div class="container">

                <nav>
                    <ul>
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="Movies.php">Movies</a></li>
                        <li><a href="Theaters.php">Theater</a></li>
                        <li><a href="SpecialEvents&Promotions.php">Special Event & Promotions</a></li>
                        <li><a href="Login1.php">Login</a></li>
                        <?php if ($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'staff'): ?>
                        <li><a href="dashboard.php">Admin Panel</a></li>
                        <?php endif; ?>
                        <li><?php echo "Welcome: ". strtoupper($_SESSION['username']);?><a href="Logout.php">-
                                Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> <!-- Ensure proper form submission -->
    <h3><b>Now Screening Movies</b></h3>
    <select name="cmbTitle"> <!-- Correct the name attribute -->
        <?php
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['movieName'] . "'>" . $row['movieName'] . "</option>";
            }
        }
        ?>
    </select>
    <br><br>
    <input type="submit" name="btnSubmit" value="Submit">
</form>

  
    <br><br>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Pictures/wonka.jpg" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="Pictures/kathurumithuru.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Pictures/mig.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <form action="/action_page.php">
        <label for="Screeningtime">Screening (date and time):</label>
        <input type="datetime-local" id="birthdaytime" name="birthdaytime">
        <input type="submit">
    </form><br><br>
    <div class="buttons">
        <a href="#" class="btn btn-primary">Book Now</a>
        <a href="#" class="btn btn-primary">Play Trailer</a>
    </div>
    </div>
    </div>
    </div>


    </div>
    </div>

    <div class="f1">
        <table align="center" bgcolor="white" width="1263px" height="100px">

            <tr>
                <td align="center"> <a href="Home.php">Home</a> &nbsp; &nbsp;</td>
                <td align="center"><a href="Movies.php">Movies</a>&nbsp; &nbsp;</td>
            </tr>
            <tr>
                <td align="center"> <a href="TicketBooking.php">Ticket Booking</a> &nbsp; &nbsp;</td>
                <td align="center"><a href="SpecialEvents&Promotions.php">Special Events & Promotions</a>&nbsp;
                    &nbsp;</td>
            </tr>
            <tr>
                <td align="center"> <a href="Login1.php">User Account</a> &nbsp; &nbsp;</td>
                <?php if ($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'staff'): ?>
                <td align="center"><a href="dashboard.php">Admin Panel</a>&nbsp; &nbsp;</td>
                <?php endif; ?>

            </tr>


    </div>
    </table>
    </form>
    <footer class="footer">
        <div class="col_1_of_4 span_1_of_4">
            <div class="textcontact">
                <p>Theatre Assistance<br>
                    Online Movie Theatre Booking System - CINEPLEX<br>
                    Ph: 011 2786969<br>
                </p>
            </div>
        </div>
        <div class="col_1_of_4 span_1_of_4">
            <div class="call_info">
                <p class="txt_3">Call us toll free:</p>
                <p class="txt_4">011 2439669</p>
            </div>
        </div>
        <div class="col_1_of_4 span_1_of_4">
            <div class=social>
                <a href="#"><img src="Pictures/fb.png" alt="" /></a>
                <a href="#"><img src="Pictures/tw.png" alt="" /></a>
                <a href="#"><img src="Pictures/pinterest.png" alt="" /></a>
            </div>
        </div>
        <div class="clear"></div>
        &copy;
        <script>
        let d = new Date();
        document.write(d.getFullYear())
        </script><b> CINEPLEX All Right Reserved. Developed by Avishka Dewmini</b>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>