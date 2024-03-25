<?php
require_once('./php/components.php');

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call getData function from components.php
$results = getData($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row text-center py-5">
            <?php
            // Check if $results is not empty
            if ($results && $results->num_rows > 0) {
                // Fetch data from the result set and display using components function
                while ($row = $results->fetch_assoc()) {
                    components($row['itemname'], $row['itemnumber'], $row['itemimage']);
                }
            } else {
                echo "No data found";
            }
            ?>
        </div>
    </div>
</body>
</html>