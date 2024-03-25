<?php
// Start session
session_start();
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

if (isset($_POST['add'])) {
    if (isset($_SESSION['card'])) {
        $item_array_id = array_column($_SESSION['card'], "item_id");
        print_r($item_array_id);
        if (in_array($_POST['item_id'], $item_array_id)) {
            echo "<script> alert('Item already picked to be donated.')</script>";
            echo "<script>window.location ='index.php'</script>";
        } else {
            // Handle adding item to session
           $count = count($_SESSION['card']);
           $item_array = array(
            'item_id' => $_POST['item_id']
        );
        $_SESSION['card']['$count'] = $item_array;
       // print_r($_SESSION['card']);
        }
    } else {
        $item_id = "unique_id"; // Define a unique identifier for the item
        $item_array = array(
            'item_id' => $_POST['item_id']
        );
        // Create new session variable
        $_SESSION['card'][0] = $item_array;
        print_r($_SESSION['card']);
    }
}
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
    <?php
    require_once("header.php")
    ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
            // Check if $results is not empty
            if ($results && $results->num_rows > 0) {
                // Fetch data from the result set and display using components function
                while ($row = $results->fetch_assoc()) {
                    components($row['itemname'], $row['itemnumber'], $row['itemimage'],$row['id']);
                }
            } else {
                echo "No data found";
            }
            ?>
        </div>
    </div>
</body>
</html>