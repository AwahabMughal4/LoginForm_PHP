<?php
// PHP: token generation and form handling
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

// Include database connection
include("connection.php");

// Initialize the token number if it doesn't exist in the session
if (!isset($_SESSION['token'])) {
  $_SESSION['token'] = 0;
}

// Function to insert token into the database
function insertTokenIntoDatabase($conn, $token)
{
  $sql = "INSERT INTO tokens (token_number) VALUES ($token)";
  if (mysqli_query($conn, $sql)) {
    // Token inserted successfully
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Check which button is clicked and increment the token
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['button1']) || isset($_POST['button2']) || isset($_POST['button3']) || isset($_POST['button4'])) {
    $_SESSION['token']++;
    insertTokenIntoDatabase($conn, $_SESSION['token']);
  }
}

// Display the current token number
$token = $_SESSION['token'];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Token Generation</title>
  
  <!-- Include External CSS -->
  <link href="welcome.css" rel="stylesheet">
  
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <?php include "navbar.php"; ?>

  <!-- Main Content (Form) -->
  <?php include "form.php"; ?>

  <!-- Include External JavaScript -->
  <script src="welcome.js"></script>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
