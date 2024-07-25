<?php
session_start();
date_default_timezone_set('Asia/Colombo');

// Include the file that establishes the database connection
include 'Database.php';

// Define your SQL query
$sql = "SELECT * FROM tblbooking";

// Execute the SQL query
$result = mysqli_query($con, $sql);

if (!$result) {
    // Query failed, handle the error
    echo "Error executing SQL query: " . mysqli_error($con);
} else {
    // Proceed with fetching data from the result set
    if(mysqli_num_rows($result) > 0) {
        // Fetch and display data
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Management</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

td img {
    max-width: 100px;
}

.actions {
    text-align: center;
}

.actions button {
    padding: 5px 10px;
    cursor: pointer;
}

body {
  font-family: "Lato", sans-serif;
}

.sidepanel  {
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
  background-color:#444;
}

    </style>
</head>
<body>
<?php
 
 $sql = "SELECT * FROM tblbooking";
 $result= mysqli_query($con, $sql);
 if(mysqli_num_rows($result) > 0) {
?>
    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="dashboard.php">Manage Movie</a>
        <a href="details.php">Movie Details</a>
        <a href="BookingHistory.php">Booking Details</a>
        <a href="comments.php">Comments</a>
        <a href="Logout.php">Logout</a>
      </div>
      
      <button class="openbtn" onclick="openNav()">☰ Admin panel</button>  
    <h1>Booking History</h1>
    <table id="movieTable">
        <thead>
        <tr>
     <th>User id</th>   
     <th>Booking id</th>
     <th>Movie</th>
     <th>Date</th>  
    </tr>
        </thead>
        <?php
       while($row = mysqli_fetch_assoc($result)){
          ?>
        <tr>
            <td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['booking_id'];?></td>
            <td><?php echo $row['movie_name'];?></td>
            <td><?php echo $row['booking_date'];?></td>
          </tr>
          <?php
       }
    ?>
    </table>
    <?php
  }


?>
    <script>
        function openNav() {
          document.getElementById("mySidepanel").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidepanel").style.width = "0";
        }
        </script>
    <script src="script.js"></script>
</body>
</html>