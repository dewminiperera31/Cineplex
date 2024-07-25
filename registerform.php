<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title>Register Form</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    body {
      background-color: grey;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    /* Add a background color when the inputs get focus */
    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
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
      opacity: 0.9;
    }

    button:hover {
      opacity: 1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {

      background-color: #f44336;

    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn,
    .signupbtn {
      float: left;
      width: 50%;
    }

    /* Add padding to container elements */
    .container1 {
      padding: 16px;
      height: inherit;
    }

    .container2 {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: #474e5d;
      padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #3d7596;
      margin: 5% auto 15% auto;
      /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%;
      /* Could be more or less, depending on screen size */
    }

    /* Style the horizontal ruler */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 35px;
      top: 15px;
      font-size: 40px;
      font-weight: bold;
      color: #1b1616;
    }

    .close:hover,
    .close:focus {
      color: #eeebeb;
      cursor: pointer;
    }



    /* Clear floats */
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {

      .cancelbtn,
      .signupbtn {
        width: 100%;
      }


    }
  </style>

</head>
<?php #include() , require(); include_once(), require_once()
  include('Database.php');
?>

<body>
<?php
session_start();


$msg = "";
$user = "";
$password = "";
$email = "";


$con = getConnection();

if (isset($_POST['btnSignup'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // Hash the password
    $hashed_password = sha1($password); // You should use a more secure hashing algorithm like password_hash()
    // Check if passwords match
    if ($_POST['password'] != $_POST['cpass']) {
        $msg = "Passwords do not match";
    } else {
        // Insert user into the database
        $sql = "INSERT INTO tblregister (username, password, cpass, email) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        
if ($stmt) {
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssss", $user, $hashed_password, $hashed_password, $email);
    
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $msg = "User Record Inserted";
        // Redirect user to login page after successful registration
        header('Location: Login1.php');
        exit;
    } else {
        $msg = mysqli_error($con);
    }
} else {
    $msg = mysqli_error($con);
}

       }
    }
  

?>

  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <div class="imgcontainer">

    </div>
    <img  class="rounded mx-auto d-block"  src="Pictures/logo.png" style="width: 404px; height: 100px;">
    <h3 style="color: black; text-align: center;  float: inline-end;"><b>CINEPLEX-Register Form</b></h3>
    <div class="container1">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required  value=<?php echo $user ;?>>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required value=<?php echo $password ;?>>

      <label for="cpass"><b>Re-Enter Password</b></label>
      <input type="password" placeholder="Re-Enter Password" name="cpass" required value=<?php echo $password ;?>>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required value=<?php echo $email ;?>>

      
      <button type="submit" name="btnSignup">Signup</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>

      <tr>
                <td colspan="2">
                    <lable style="color:red;"><?php echo $msg; ?></lable>
                </td>
            </tr>
    </div>

    <div class="container2" style="background-color:#f1f1f1">
      <button type="button" ><a href ="Login1.php">Cancel</button>

    </div>
  </form>
  
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>