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
 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      background-color: rgb(19, 18, 16);
    }

    .container1 {
            background-color: white;
            color: rgb(15, 12, 12);
            text-align: center;
            height: 100px;
            padding: 15px;

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

    #object1 {
      float: left;
      width: 110px;
      height: 80px;
    }

    button {
      float: right;
      padding: 2%;
      background-color: red;
      color: black;

    }

    .cont {
      background-color: gray;
      color: rgb(58, 55, 55);


    }

    .midtop {
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


  

    .object2 {
      width: 50%;
      height: 100px;
      text-align: center;
    }

    footer {
            background-color: #333;
            color: #fff;
            padding: 30px;
            text-align: center;
        }

   

    .h1{
      text-align: center;
    }
  </style>
</head>

<body>
  <form>
    <div class="container1">
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
                        <li><a href="Login1.php">Login</a></li>
                        <?php if ($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'staff'): ?>
                        <li><a href="dashboard.php">Admin Panel</a></li>
                         <?php endif; ?>
                        <li><?php echo "Welcome: ". strtoupper($_SESSION['username']);?><a href="Logout.php">- Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

  
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40px%"
        data-bs-smooth-scroll="true" class="scrollspy-example card text-bg-body-tertiary p-3 rounded-2 " tabindex="0">
        <a class="navbar-brand">
          <h4 id="scrollspyHeading1">Carousel Banner</h4>
        </a>

        <div class="text-bg-light p-3">Offers & Promotions
          From time to time CINEPLEX Films & Theaters offers its patrons various offers with third party tie ups. These
          offers are sometimes linked to a particular movie and or a Theater.

          Listed below are some of the current promotions and offers that are being offered to CINEPLEX Films & Theaters
          patrons.</div>
        <a class="navbar-brand">
          <h4 id="scrollspyHeading2">Promotional Offers</h4>
        </a>
        <img src="Pictures/kathurumithuru.jpg" class="d-block w-100" alt="kathurumithuru" style="height:500px">

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

