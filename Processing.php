<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Processing Page</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
  }
  .ticket {
  color: bisque;
  background-color: black;
  border-radius: 10px;
  padding: 10px;
  padding-left: 10px;
  width: 1200px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body>
  <a href="Home.php">Logout</a> 
  <h2>Processing Page</h2>
  <p>Processing your booking...</p>

  <script>
    // Retrieve booked seats information from URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const bookedSeatsJson = urlParams.get('bookedSeats');
    const bookedSeats = JSON.parse(decodeURIComponent(bookedSeatsJson));

    // Example: Display booked seats
    document.write("<h3>Booked Seats:</h3>");
    document.write("<ul>");
    bookedSeats.forEach(seat => {
      document.write(`<li>${seat}</li>`);
    });
    document.write("</ul>");

    // Perform any further processing (e.g., payment)

    // Generate ticket (you can customize this based on your requirements)
    document.write("<h3>Ticket:</h3>");
    document.write(`<p>Booked Seats: ${bookedSeats.join(', ')}</p>`);

    // You can include further information here, such as payment details, movie details, etc.
  </script>
  <div class="ticket">
    <i class="fa fa-ticket" style="font-size:48px;color:red"></i>
    <h1>Movie Ticket</h1>
    <div class="info">
    
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
