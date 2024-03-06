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
    $Service = $_POST["Service"];
    $Age = $_POST["Age"];  
    $Doctors = $_POST["Doctors"];
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Date = $_POST["Date"];
    $Time = $_POST["Time"];

    // Debugging: Output form data for verification
    echo "Service: " . $Service . "<br>";
    echo "Age: " . $Age . "<br>";
    echo "Doctors: " . $Doctors . "<br>";
    echo "Name: " . $Name . "<br>";
    echo "Email: " . $Email . "<br>";
    echo "Date: " . $Date . "<br>";
    echo "Time: " . $Time . "<br>";

    // Prepare and execute database insertion
    $sql = "INSERT INTO `booking`(`Service`, `Age`, `Doctors`, `Name`, `Email`, `Date`, `Time`) VALUES ('$Service', '$Age', '$Doctors', '$Name', '$Email', '$Date', '$Time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
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
<script>alert('Appointment booked!!')</script>
