<?php
session_start();
date_default_timezone_set('Asia/Colombo');

if(!isset($_SESSION['username'])){
    header('Location: Login1.php');
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>CINEPLEX</title>
    <link href="CSS/Home.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <style>
            body{
    background-color: rgb(19, 18, 16);
}

.container2{
    color: black;
    background-color: white;
    text-align: center;
    height: 100px;
    padding: 15px;
    
}

#object1 {
            float: left;
            width: 100px;
            height: 50px;
        }

button{
  float: right;
  padding: 2%;
  background-color: red;
  color: black;
  
}

.cont{
    background-color: black;
    padding: 10px;
    
}

.midtop{
    background-color: black; 
    display: flex;
    
 }

 a:hover {
            color: blue;
            font-size: 18px;
        }

        a:active {
            color: yellow;
        }
    
    .anta-regular {
        font-family: "Anta", sans-serif;
        font-weight: 400;
        font-style: normal;
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

        .first-section{
            background-color: #333;
        }

        .second-section{
            background-color: #333;
        }  
    
  

.object2{
    width: 50%;
    height: 100px;
    text-align: center;
}

footer{
    text-align: center;
    padding: 50px;
    background-color: white;
    color: black;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  
  /* Set a style for all buttons */
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }
  
  button:hover {
    opacity: 0.8;
  }
  
  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }
  
  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }
  
  img.avatar {
    width: 40%;
    border-radius: 50%;
  }
  
  .container1 {
    padding: 0px;
  }
  
  span.psw {
    float: right;
    padding-top: 16px;
  }
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }
  
  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }
  
  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }
  
  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }
  
  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }
    
  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }
  
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
  }

  footer {
            background-color: #333;
            color: #fff;
            padding: 30px;
            text-align: center;
        }
  


            * {
              box-sizing: border-box;
            }
            
            .column {
              float: left;
              width: 50%;
              padding: 5px;
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
        <div class="container2">
            <img id="object1" src="Pictures/logo.png">
            
            <h1>CINEPLEX</h1>
        </div>

        <header>
            <div class="container">

                <nav>
                    <ul>
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="Movies.php">Movies</a></li>
                        <li><a href="Theaters.php">Theater</a></li>
                        <li><a href="SpecialEvents&Promotions.php">Special Event & Promotions</a></li>
                        <li><a href="SeatingandParking.php">Seating and Parking</a></li>
                        <li><a href="Login1.php">Login</a></li>
                        <?php if ($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'staff'): ?>
                        <li><a href="dashboard.php">Admin Panel</a></li>
                         <?php endif; ?>
                        <li><?php echo "Welcome: ". strtoupper($_SESSION['username']);?><a href="Logout.php">- Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <body>
    <div class="container">
        <h1 style="text-align:center; color:white;">Seating and Parking</h1>
        <div class="row">
            <div class="column">
                <!-- Display dynamic content using PHP -->
                <?php
                // Fetch data from database or other source
                $seatingCapacity = 2000;
                ?>
                <img src="Pictures/theater.jpeg" alt="Theater" width="500px" height="640px">
                
            </div>
            <div class="column">
                <div class="card" style="bgcolor:white;">
                    <ul>
                        <li><img src="Pictures/parking.png"><h4>Car Parking</h4></li>
                        <li>Car parking available for customers.</li>
                        <li><img src="Pictures/seating.png"><h4>Seating Capacity</h4></li>
                        
                        <!-- Display dynamic seating capacity -->
                        <li>Enjoy with <?php echo $seatingCapacity; ?> Seating Capacity with new Movies arrivals</li>
                        <div class="sis" style="bgcolor:grey">
                        <li><h4>About Us</h4></li>
                        <div>Address:Kandy</div>
                        <div>Contact Us:011223454</div>
                        </div>
                      </ul>
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
        <script> let d = new Date();
            document.write(d.getFullYear())</script><b> CINEPLEX All Right Reserved. Developed by Avishka Dewmini</b>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>

