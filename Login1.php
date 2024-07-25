<?php
include 'Database.php';
$con = getConnection();
session_start();

$errorMsg = "";

if(isset($_POST['btnSubmit'])){
    $user = $_POST['txtUser'];
    $pass = $_POST['txtPassword'];

    // Query the 'user' table
    $sql_user = "SELECT username FROM tbluser WHERE username='$user' AND password=SHA1('$pass')";
    $result_user = mysqli_query($con, $sql_user);

    // Query the 'register' table
    $sql_register = "SELECT username FROM tblregister WHERE username='$user' AND password=SHA1('$pass')";
    $result_register = mysqli_query($con, $sql_register);

   
    $_SESSION['username'] = $user;
    if(mysqli_num_rows($result_user) == 1 || mysqli_num_rows($result_register) == 1){
        // Redirect to Home.php if user found in 'tbluser' or 'tblregister'
        header('Location: Home.php');
        exit;
    } else {
        $errorMsg = "Invalid Login Info..";
    }
   
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <style>
    body {
        background-color: grey;
        text-align: center;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 95%;
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
        padding: 14px 20px;
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
        background-color: white;
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



<body>



    <form class="modal-content animate" method="post" action="Login1.php">

        <img class="rounded mx-auto d-block" src="Pictures/logo.png" style="width: 404px; height: 100px; ">
        <h1 style="color: black; text-align: center; background: #0f6f89; height: 40px;"><b>CINEPLEX-Login</b></h1>
        <br>
        <div class="container2">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="txtUser" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="txtPassword" required>

            <tr>
                <td colspan="2">
                    <p style=color:red;>
                        <?php echo $errorMsg;?></p>
                </td>

            </tr>

            <button input type="submit" value="Submit" name="btnSubmit">Login</button>
            <p>or</p>
            <button type="submit" value="Register" name="btnRegister"><a href="registerform.php">Signup</a></button>

        </div>


    </form>

</body>

</html>