<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Database connection settings
  $serverName = "localhost";
  $username = "root";
  $password = ""; // Leave this empty if you haven't set a password for MySQL in XAMPP
  $dbname = "contactdata"; // Replace with your database name

  // Create connection
  $conn = new mysqli($serverName, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert form data into the database table
  $sql = "INSERT INTO mycontact (name, email, phone, subject, message) 
          VALUES ('$name', '$email', '$phone', '$subject', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "Thank you for your submission!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
