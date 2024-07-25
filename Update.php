<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie Details</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
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
            background-color: #007bff;
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
    </style>
</head>

<body>

    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="dashboard.html">Add Movie</a>
        <a href="details.html">Movie Details</a>
        <a href="Update.html">Update Movie</a>
        <a href="#">Comments</a>
    </div>

    <button class="openbtn" onclick="openNav()">☰ Admin panel</button>
    <h1>Update Movie Details</h1>
    <form id="movieForm">
        <label for="movieName">Movie Name:</label>
        <input type="text" id="movieName" required><br>

        <label for="details">Details:</label>
        <textarea id="details" required></textarea><br>

        <label for="screeningTime">Screening Time:</label>
        <input type="text" id="screeningTime" required><br>

        <label for="price">Price:</label>
        <input type="text" id="price" required><br>

        <label for="picture">Picture:</label>
        <input type="file" id="picture" accept="image/*"><br>

        <form>
        <label for="trailer_url">Trailer URL:</label><br>
        <input type="text" id="trailer_url" name="trailer_url" required><br><br>
        <input type="submit" value="Add Trailer"><br><br>
        </form>

        <button type="submit">Update Movie</button>
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
</body>

</html>