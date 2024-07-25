<?php
session_start();

if(!isset($_SESSION['username'])){
    header('Location: BookingHistory.php'); 
}

include 'Database.php';
$con = getConnection();

$msg="";
$uid="";
$bid=""; 
$m=""; 
$d="";


if(isset($_POST['btnAdd'])){
  $uid = $_POST['txtid'];
  $bid = $_POST['txtbookid'];
  $m = $_POST['txtMovie'];
  $d=$_POST['txtDate'];
  $sql = "INSERT INTO tblbooking VALUES ('$uid','$bid','$m','$d')";
  if(mysqli_query($con,$sql)){
    $msg="User Record Inserted";
  }else{
    $msg=mysqli_error($con);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Seat Booking</title>
<style>
  body {
    background: #000;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  .container {
    max-width: 800px;
    margin: 50px auto;
    text-align: center;
  }
  .row {
    margin-bottom: 10px;
  }
  .seat {
    width: 60px;
    height: 30px;
    margin: 3px;
    background-color: #ccc;
    display: inline-block;
    cursor: pointer;
  }
  .seat.selected {
    background-color: #ffcc00;
  }

  input[type="date"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }

  form {
        width: 50%;
        margin: 0 auto;
        text-align: right;
        padding:20px;
        background:#F7DC6F;
        padding-top: 30px;
    }
  
</style>
</head>
<body>
<div class="container">
  <h2 style="color: white;">Movie Theater Seat Booking</h2>
  <p style="color:red">Select available seats:</p>
  <div id="seat-map">
    <!-- Seats will be dynamically generated here -->
  </div>

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

<table>
    <tr>
        <td>
            <lable>User id :</lable>
        </td>
        <td><input type="text" name="txtid" value=<?php echo $uid ;?>></td>
    </tr>
    <tr>
        <td>
            <lable>Booking id :</lable>
        </td>
        <td><input type="text" name="txtbookid" value=<?php echo $bid ;?>></td>
    </tr>
    <tr>
        <td>
            <lable>Movie :</lable>
        </td>
        <td><input type="text" name="txtMovie" value=<?php echo $m ;?>></td>
    </tr>
    <tr>
        <td>
            <lable>Booking Date :</lable>
        </td>
        <td><input type="date" name="txtDate" value=<?php echo $d ;?>></td>
    </tr>
    <tr>
        <td colspan="2">
            <lable style="color:red;"><?php echo $msg; ?></lable>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <button type="submit" class="btn btn-info" name="btnSubmit" onclick="bookSeats()"><a href="Processing.php">Book Selected Seats</a></button>
        <button type="submit" class="btn btn-info" name="btnView">View</button>
        <button type="submit" class="btn btn-info" name="btnAdd">Add</button>  
        </td>
    </tr>
    
</table>
</form>

<br>

<?php
 if(isset($_POST['btnView'])){
      $sql = "SELECT * FROM tblbooking";
      $result= mysqli_query($con, $sql);
      if(mysqli_num_rows($result)>0){

?>

<table>
    <tr>
     <th>User id</th>   
     <th>Booking id</th>
     <th>Movie</th>
     <th>Date</th>  
    </tr>
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
}

?>
  
  
  </div>

<script>
  function createSeats(numRows, seatsPerRow) {
    const seatMap = document.getElementById('seat-map');
    const alphabet = 'ABCDEFG';
    for (let i = 0; i < numRows; i++) {
      const row = document.createElement('div');
      row.className = 'row';
      for (let j = 0; j < seatsPerRow; j++) {
        const seat = document.createElement('div');
        seat.className = 'seat';
        seat.dataset.row = alphabet.charAt(i);
        seat.dataset.seat = j + 1;
        seat.textContent = `${alphabet.charAt(i)}-${j + 1}`;
        seat.addEventListener('click', toggleSeat);
        row.appendChild(seat);
      }
      seatMap.appendChild(row);
    }
  }

  function toggleSeat() {
    this.classList.toggle('selected');
  }

  function bookSeats() {
    const selectedSeats = document.querySelectorAll('.seat.selected');
    if (selectedSeats.length === 0) {
      alert('Please select at least one seat.');
    } else {
      const seatNumbers = Array.from(selectedSeats).map(seat => seat.textContent);
      alert(`You have booked seats: ${seatNumbers.join(', ')}`);
      // Here you can implement further logic, like sending the selected seats to a server for booking.
    }
  }

  // Create 7 rows (A-G) with 10 seats each
  createSeats(7, 12);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


