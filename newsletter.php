<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ruralwell";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Email = $_POST["Email"];

    // Prepare and execute database insertion for newsletter subscription
    $sql = "INSERT INTO `newsletter`(`Email`) VALUES ('$Email')";

    if ($conn->query($sql) === TRUE) {
        echo "Newsletter subscription successful!";
    } else {
        // Error handling: Output SQL query and error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Debugging: Output message if form submission method is not POST
    echo "Form submission method is not POST.";
}

// Close connection
$conn->close();
?>
<script>alert('Email for Newsletter has been recorded!!')</script>
