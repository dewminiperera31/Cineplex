<?php
session_start();
date_default_timezone_set('Asia/Colombo');

// Include the file that establishes the database connection
include 'Database.php';

// Define your SQL query
$sql = "SELECT * FROM tblmovie";
  

// Execute the SQL query
$result = mysqli_query($con, $sql);

if (!$result) {
    // Query failed, handle the error
    echo "Error executing SQL query: " . mysqli_error($con);
} else {
    // Proceed with fetching data from the result set
    if (mysqli_num_rows($result) > 0) {

		

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Management</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    th,
    td {
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
    </style>
</head>

<body>

    <h1>Movie </h1>
    <table class="table table-striped">
        <thead class="table-light">
            <tr>

                <th>Movie Id</th>
                <th>Movie Name</th>
                <th>Details</th>
                <th>Screening Time</th>
                <th>Price</th>
                <th>Picture</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
       while($row = mysqli_fetch_assoc($result)){
          ?>
        <tr>
            <td><?php echo $row['movieid'];?></td>
            <td><?php echo $row['movieName'];?></td>
            <td><?php echo $row['details'];?></td>
            <td><?php echo $row['screeningTime'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><img src="<?php echo $row['poster'];?>" style="width:200px; height:150px; margin:10px;"></td>
            <td><button type="button" class="btn btn-info"><a
                        href="Booking.php?movie=<?php echo $row['movieName']; ?>">Book</a></button></td>
        </tr>
        <?php
       }
    ?>
    </table>

    <script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
    </script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
    } // End if(mysqli_num_rows($result) > 0)
} // End else for if (!$result)
?>