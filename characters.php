<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid p-5 bg-primary text-white">
    <h1>Tähtien sote elokuvat </h1>
</div>
</body>
</html>
<?php
// index.php

// Database connection
$db = new mysqli('localhost', 'root', '', 'star_wars');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch data from the 'starships' table
$result = $db->query("SELECT * FROM characters");

// Display data in an HTML table
if ($result->num_rows > 0) {
    echo '<table class="table table-bordered">';
    echo 
    '
    <th>gender</th>
    <th>height</th>
    <th>mass</th>
    <th>name</th>
    <th>skin_color</th>

    </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['height'] . '</td>';
        echo '<td>' . $row['mass'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['skin_color'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data available.';
}

// Close database connection
$db->close();
?>