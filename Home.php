<?php
session_start();
date_default_timezone_set('Asia/Colombo');

if(!isset($_SESSION['username'])){
    header('Location: Login1.php');
} 

?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<br>

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
                        <li><?php echo "Welcome: ". strtoupper($_SESSION['username']);?>
                        <a href="Logout.php">- Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height: 600px;">
                <div class="carousel-item active">
                <a href="https://www.youtube.com/watch?v=ajw425Kuvtw"><img src="Pictures/b.jpg" class="d-block w-100" alt="Bob Marley-One Love"></a>
                </div>
                <div class="carousel-item">
                <a href="https://www.youtube.com/watch?v=973Ct2AC3EA&t=13s"><img src="Pictures/fighter.jpg" class="d-block w-100" alt="Fighter"></a>
                </div>
                <div class="carousel-item">
                <a href="https://www.youtube.com/watch?v=DvTZJ0q5Y6I"><img src="Pictures/love.jpg" class="d-block w-100" alt="Love 1970"></a>
                </div>

            </div>
        </div>

        <div style="background-color: black;">
            <h3 style="color: white;"><b>Now Screening Movies</b></h3>
            <div class="row">
                <div class="column" style="height: 300px;">
                    <div class="card col-6 offset-3" style="width: 15rem;">
                        <img class="card-img-top" src="Pictures/BOBMarleyonelove.jpg" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Bob Marley-One Love</h5>

                            <a href="TicketDetails.php" class="btn btn-primary">Buy Ticket</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card col-6 offset-3" style="width: 15rem;">
                        <img class="card-img-top" src="Pictures/f.jpg" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Fighter</h5>

                            <a href="TicketDetails.php" class="btn btn-primary">Buy Ticket</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card col-6 offset-3" style="width: 15rem; ">
                        <img class="card-img-top" src="Pictures/lo.jpg" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">1970 Love Story</h5>

                            <a href="TicketDetails.php" class="btn btn-primary">Buy Ticket</a>
                        </div>
                    </div>
                </div>
            </div>
            <h3 style="color: white;"><b>Upcoming Movies</b></h3>
            <div class="row">
                <div class="column" style="height: 300px;">
                    <div class="card col-6 offset-3" style="width: 15rem;">
                        <img class="card-img-top" src="Pictures/l.jpg" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Land of Bad</h5>

                            <a href="TicketDetails.php" class="btn btn-primary">Buy Ticket</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card col-6 offset-3" style="width: 15rem;">
                        <img class="card-img-top" src="Pictures/teribaatonmeriaisauljhajiya.jpg" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Teri Bathon Meri</h5>

                            <a href="TicketDetails.php" class="btn btn-primary">Buy Ticket</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card col-6 offset-3" style="width: 15rem; ">
                        <img class="card-img-top" src="Pictures/kungfupanda4.jpg" alt="Card image cap">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="card-title">Kung Fu Panda 4</h5>

                            <a href="TicketDetails.php" class="btn btn-primary">Buy Ticket</a>
                        </div>
                    </div>
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

        <div>

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
            <div class="col_1_of_4 span_1_of_4">
                <div>
                    <a href="feedback.php">feedback</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        &copy;
        <script> let d = new Date();
            document.write(d.getFullYear())</script><b> CINEPLEX All Right Reserved. Developed by Avishka Dewmini</b>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>

