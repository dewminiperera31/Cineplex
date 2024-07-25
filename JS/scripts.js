let movies = [];

function addMovie() {
    const name = document.getElementById("name").value;
    const details = document.getElementById("details").value;
    const time = document.getElementById("time").value;
    const price = document.getElementById("price").value;
    const picture = document.getElementById("picture").files[0];
    const trailer = document.getElementById("trailer").files[0];

    // Validate inputs
    if (!name || !details || !time || !price || !picture || !trailer) {
        alert("Please fill in all fields");
        return;
    }

    const movie = {
        name: name,
        details: details,
        time: time,
        price: price,
        picture: picture,
        trailer: trailer
    };

    movies.push(movie);
    displayMovies();
    resetForm();
}

function displayMovies() {
    const moviesList = document.getElementById("movies");
    moviesList.innerHTML = "";

    movies.forEach((movie, index) => {
        const li = document.createElement("li");
        li.innerHTML = `<b>${movie.name}</b> - ${movie.details}, Time: ${movie.time}, Price: ${movie.price}`;
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", () => deleteMovie(index));
        li.appendChild(deleteButton);
        moviesList.appendChild(li);
    });
}

function deleteMovie(index) {
    movies.splice(index, 1);
    displayMovies();
}

function resetForm() {
    document.getElementById("name").value = "";
    document.getElementById("details").value = "";
    document.getElementById("time").value = "";
    document.getElementById("price").value = "";
    document.getElementById("picture").value = "";
    document.getElementById("trailer").value = "";
}


// Sample data for demonstration
var movie = [
    { name: "Movie 1", details: "Details 1", time: "2:00 PM", price: "$10", picture: "movie1.jpg", trailer: "trailer1.mp4" },
    { name: "Movie 2", details: "Details 2", time: "4:00 PM", price: "$12", picture: "movie2.jpg", trailer: "trailer2.mp4" },
    // Add more movie data as needed
];

function displayMovies() {
    var tableBody = document.querySelector('#movieTable tbody');
    tableBody.innerHTML = '';

    movies.forEach(function(movie, index) {
        var row = '<tr>' +
                    '<td>' + movie.name + '</td>' +
                    '<td>' + movie.details + '</td>' +
                    '<td>' + movie.time + '</td>' +
                    '<td>' + movie.price + '</td>' +
                    '<td><img src="' + movie.picture + '" alt="Movie Picture"></td>' +
                    '<td><a href="' + movie.trailer + '">Watch Trailer</a></td>' +
                    '<td class="actions"><button onclick="editMovie(' + index + ')">Edit</button>' +
                    '<button onclick="deleteMovie(' + index + ')">Delete</button></td>' +
                  '</tr>';
        tableBody.innerHTML += row;
    });
}

function editMovie(index) {
    // Your edit functionality goes here
    console.log('Editing movie at index', index);
}

function deleteMovie(index) {
    // Your delete functionality goes here
    console.log('Deleting movie at index', index);
    movies.splice(index, 1); // Remove the movie from the array
    displayMovies(); // Refresh the table
}

// Display initial movies
displayMovies();


document.addEventListener('DOMContentLoaded', function() {
    var movieForm = document.getElementById('movieForm');
    movieForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Get form values
        var movieName = document.getElementById('movieName').value;
        var details = document.getElementById('details').value;
        var screeningTime = document.getElementById('screeningTime').value;
        var price = document.getElementById('price').value;
        var picture = document.getElementById('picture').files[0];
        var trailer = document.getElementById('trailer').files[0];

        // Process the form data here (you can use AJAX to send data to a server)

        // For demonstration, let's just log the data
        console.log("Movie Name:", movieName);
        console.log("Details:", details);
        console.log("Screening Time:", screeningTime);
        console.log("Price:", price);
        console.log("Picture:", picture ? picture.name : "Not provided");
        console.log("Trailer:", trailer ? trailer.name : "Not provided");

        // Clear form fields
        movieForm.reset();
    });
});
