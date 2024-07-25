<?php
session_start();

if(!isset($_SESSION['username'])){
    header('Location: dashboard.php'); 
}

include 'Database.php';
$con = getConnection();

$msg="";
$id="";
$title=""; 
$detail=""; 
$screen="";
$price=""; 
$path="";

if(isset($_POST['btnAdd'])){
    $location = "movies/";
    $maxSize = 500000; 
    $checked = true;
    $fileExt = array('jpg','jpeg' ,'png');
    
    $name = basename($_FILES['poster']['name']);
    $temp_name = $_FILES['poster']['tmp_name'];
    $size = $_FILES['poster']['size'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));


    if(file_exists($location.$name)){
        $msg ="File already Exists";
        $checked = false;
    }

    if($size>$maxSize){
        $msg ="File is too large";
        $checked = false;
    }

    if(!in_array($ext,$fileExt)){
        $msg ="Invalid file type";
        $checked = false;
    }
    
    if($checked){
        $id = $_POST['movieid'];
        $title = $_POST['movieName'];
        $detail = $_POST['details'];
        $screen = $_POST['screeningTime'];
        $price = $_POST['price'];
        $path = $location.$name;

        $sql = "INSERT INTO tblmovie (movieid, movieName , details, screeningTime,
         price, poster) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
          mysqli_stmt_bind_param($stmt, "isssss", $id, $title, $detail,
           $screen, $price, $path);

            if (mysqli_stmt_execute($stmt)) {
                move_uploaded_file($temp_name, $location.$name);
                $msg = "Movie Record Inserted";
            } else {
                $msg = mysqli_error($con);
            }
            mysqli_stmt_close($stmt);
        } else {
            $msg = mysqli_error($con);
        }
    }
}

if(isset($_POST['btnFind'])){
    $id = $_POST['movieid'];
    $sql = "SELECT * FROM tblmovie WHERE movieid='$id'"; // Assuming movieid is the correct column
  
    $result = mysqli_query($con, $sql);
  
    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_row($result);
            $title = $row[1];
            $detail=$row[2]; 
            $screen=$row[3]; 
            $price=$row[4]; 
    
        } else {
            $msg = "Movie Record not Found!";
        }
    } else {
        // Error handling
        $msg = "Error executing query: " . mysqli_error($con);
    }
  }
  
  if(isset($_POST['btnUpdate'])){
    $id = $_POST['movieid'];
    $title = $_POST['movieName']; 
      $sql = "UPDATE tblmovie SET movieName=('".$title."') WHERE movieid = '$id'";
      if(mysqli_query($con,$sql)){
          $msg="Movie Record Updated";
        }else{
          $msg=mysqli_error($con);
        }
  }
  
  if(isset($_POST['btnDelete'])){
      $id = $_POST['movieid'];
      $sql = "DELETE FROM tblmovie WHERE movieid='$id'";
      if(mysqli_query($con,$sql)){
          $msg="Movie Record Deleted";
        }else{
          $msg=mysqli_error($con);
        }
  }
  
  if(isset($_POST['btnClear'])){
    $msg="";
    $id="";
    $title=""; 
    $detail=""; 
    $screen=""; 
    $price=""; 
    $path=""; 
  
     
  }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movie Details</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Madimi+One&display=swap" rel="stylesheet">


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

    
    input[type="datetime-local"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
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

    #movieTable{
        background-color: white;
    }
    </style>
</head>


<body>

<div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="dashboard.php">Manage Movie</a>
        <a href="details.php">Movie Details</a>
        <a href="BookingHistory.php">Booking Details</a>
        <a href="comments.php">Comments</a>
        <a href="Logout.php">Logout</a>
      </div>
      
      <button class="openbtn" onclick="openNav()">☰ Admin panel</button> 


    
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <h1><b>CINEPLEX - Manage Movie</b></h1>
        <table>
            <tr>
                <td>
                    <lable>Movie id :</lable>
                </td>
                <td><input type="text" id="movieid" name="movieid" value=<?php echo $id;?> ><br>
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Movie Name :</lable>
                </td>
                <td><input type="text" id="txtTitle" name="movieName" value=<?php echo $title;?>><br></td>
            </tr>
            <tr>
                <td>
                    <lable>Movie Details :</lable>
                </td>
                <td><textarea id="details" name="details" value=<?php echo $detail;?> ></textarea><br></td>
            </tr>
            <tr>
                <td>
                    <lable>Movie Screen Time :</lable>
                </td>
                <td><input type="datetime-local" id="screeningTime" name="screeningTime" value=<?php echo $screen;?>  ><br></td>
            </tr>
            <tr>
                <td>
                    <lable>Price :</lable>
                </td>
                <td>  <input type="text" id="price" name="price" value=<?php echo $price;?> ><br></td>
            </tr>
            <tr>
                <td>
                    <lable>Picture:</lable>
                </td>
                <td><input type="file" id="picture" name="poster" accept="image/*" ><br></td>
                
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
                <button type="submit" name="btnAdd" value="Add" class="btn btn-danger">Add</button>
                <button type="submit" name="btnFind" value="Find" class="btn btn-warning">Find</button>
                <button type="submit" name="btnUpdate" value="Update" class="btn btn-success">Update</button>
                <button type="submit" name="btnDelete" value="Delete" class="btn btn-danger">Delete</button>
                <button type="submit" name="btnClear" value="Clear" class="btn btn-warning">Clear</button>
                <button type="submit" name="btnViewAll" value="ViewAll" class="btn btn-success">ViewAll</button>
                </div>
                </td>
            </tr>
            
        </table>
</form>
<script>
        function openNav() {
          document.getElementById("mySidepanel").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidepanel").style.width = "0";
        }
        </script>
    <script src="script.js"></script>

<br>

<?php
      if(isset($_POST['btnViewAll'])){
      $sql = "SELECT * FROM tblmovie";
      $result= mysqli_query($con, $sql);
      if(mysqli_num_rows($result)>0){

?>

<table table id="movieTable">
    <tr>
                <th>Movie Id</th>
                <th>Movie Name</th>
                <th>Details</th>
                <th>Screening Time</th>
                <th>Price</th>
                <th>Picture</th>
                
    </tr>
    <?php
       while($row = mysqli_fetch_assoc($result)){
          ?>
           <tr>
            <td><?php echo $row['movieid']; ?></td>
            <td><?php echo $row['movieName']; ?></td>
            <td><?php echo $row['details']; ?></td>
            <td><?php echo $row['screeningTime']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <!-- Check if the 'poster' key exists in the $row array before accessing it -->
            <td><img src="<?php echo $row['poster']; ?>" 
            style="width: 150px; height: 150px; margin: 10px;"></td>

        </tr>
          <?php
       }
    ?>

 </table>

 <?php
  }
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>