<?php
session_start();

if(!isset($_SESSION['username'])){
    header('Location: feedback.php'); 
}

include 'Database.php';
$con = getConnection();

$msg="";
$name="";
$em=""; 
$ex=""; 
$im="";


if(isset($_POST['btnAdd'])){
    $name = $_POST['name'];
    $em = $_POST['email'];
    $ex = $_POST['experience'];
    $im = $_POST['improvement'];
    
    $sql = "INSERT INTO tblfeedback VALUES ('$name', '$em', '$ex', '$im')";
    if(mysqli_query($con,$sql)){
      $msg="User Record Inserted";
    }else{
      $msg=mysqli_error($con);
    }
  }

  
  if(isset($_POST['btnClear'])){
    $msg="";
    $name="";
    $em=""; 
    $ex=""; 
    $im="";
   
  
     
  }

  if(isset($_POST['btnSubmit'])){
    $sql = "SELECT * FROM tblfeedback";
    $result= mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){

    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex Services Feedback Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-image:url('Pictures/of-popcorn.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    h1 {
        text-align: center;
    }

    form {
        width: 50%;
        margin: 0 auto;
        text-align: left;
        padding:20px;
        background:#F7DC6F;
        padding-top: 30px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

    button {
        padding: 10px 20px;
        background-color: blue;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    body {
        font-family: "Lato", sans-serif;
    }

    .sidepanel {
        width: 0;
        position: fixed;
        z-index: 1;
        height: 250px;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidepanel a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidepanel a:hover {
        color: #f1f1f1;
    }

    .sidepanel .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

    #Table{
        background-color: white;
        text-align:center;
        width: 50%;
        margin: 0 auto;
        text-align: left;
        padding:20px;
    }

    

    
    </style>
</head>

<body>
    <div class="container">
       
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <h1>Cineplex Services Feedback Form</h1>
        <table>
            <tr>
                <td>
                    <lable>Your Name: </lable>
                </td>
                <td><input type="text" id="name" name="name" value=<?php echo $name;?> ><br>
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Your Email: </lable>
                </td>
                <td><input type="text" id="email" name="email" value=<?php echo $em;?>><br></td>
            </tr>
            <tr>
                <td>
                    <lable>What improvements would you like to see in our services? </lable>
                </td>
                <td><input type="textarea"  id="improvement" name="improvement" style="width:250px" value=<?php echo $im;?>><br></td>
            </tr>
            <tr>
                <td>
                    <lable>How was your overall experience with our web-based application? </lable>
                    
                </td>
                <td>
                <select id="experience" name="experience" value=<?php echo $ex;?>>
                    <option value="">Select one</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                </select>
                </td>
                
            </tr>
           
            <tr>
            
            <tr>
                <td colspan="2">
                    <lable style="color:red;"><?php echo $msg; ?></lable>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="submit" name="btnAdd" >Add Feedback</button>
                <button type="submit" name="btnClear">Clear Feedback</button>
                <button type="submit" name="btnView">View Feedback</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="Home.php">Back</a>
                
                </div>
                </td>
            </tr>
            
        </table>
</form>
     
    </div>

    <br>

<?php
      if(isset($_POST['btnView'])){
      $sql = "SELECT * FROM tblfeedback";
      $result= mysqli_query($con, $sql);
      if(mysqli_num_rows($result)>0){

?>

<table table id="Table">
    <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Experience</th>
                <th>Improvement</th>
                
    </tr>
    <?php
       while($row = mysqli_fetch_assoc($result)){
          ?>
           <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['experience'];?></td>
            <td><?php echo $row['improvement'];?></td>
            

        </tr>
          <?php
       }
    ?>

 </table>

 <?php
  }
}

?>
</body>

</html>