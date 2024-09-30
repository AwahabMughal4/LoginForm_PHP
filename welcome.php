<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
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
    function insertTokenIntoDatabase($conn, $token) {
        $sql = "INSERT INTO tokens (token_number) VALUES ($token)";
        if (mysqli_query($conn, $sql)) {
            // Token inserted successfully
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Check which button is clicked and increment the token
    if (isset($_POST['button1'])) {
        $_SESSION['token']++;
        insertTokenIntoDatabase($conn, $_SESSION['token']);
    }
    if (isset($_POST['button2'])) {
        $_SESSION['token']++;
        insertTokenIntoDatabase($conn, $_SESSION['token']);
    }
    if (isset($_POST['button3'])) {
        $_SESSION['token']++;
        insertTokenIntoDatabase($conn, $_SESSION['token']);
    }
    if (isset($_POST['button4'])) {
        $_SESSION['token']++;
        insertTokenIntoDatabase($conn, $_SESSION['token']);
    }

    // Display the current token number
    $token = $_SESSION['token'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      include "navbar.php";
    ?>
    
    <br><br><br>
    
    <div id="form" style="text-align: center;">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <h2>Current Token Number: <?php echo $token; ?></h2>
    </div>
    
    <div style="display: flex; justify-content: center; margin-top: 20px;">
      <form method="POST">
        <button type="submit" name="button1" class="btn btn-primary">DIRBS(IMEI)</button>
        <button type="submit" name="button2" class="btn btn-secondary mx-2">SIM BLOCKAGE</button>
        <button type="submit" name="button3" class="btn btn-success mx-2">MOBILE STOLEN</button>
        <button type="submit" name="button4" class="btn btn-danger">COMPLAINT STATUS</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
