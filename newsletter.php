
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
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'Email' field is set in the POST array
    if(isset($_POST["Email"])) {
        // Retrieve form data
        $Email = $_POST["Email"];

        // Debugging: Output form data for verification
        echo "Email: " . $Email . "<br>";

        // Prepare and execute database insertion
        $sql = "INSERT INTO `newsletter` (`Email`) VALUES ('$Email')";

        if ($conn->query($sql) === TRUE) {
            echo "Newsletter sent!";
        } else {
            // Error handling: Output SQL query and error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Output error message if 'Email' field is not set
        echo "Email field is not set in the form.";
    }
} else {
    // Debugging: Output message if form submission method is not POST
    echo "Newsletter submitted.";
}


// Close connection
$conn->close();
?> 