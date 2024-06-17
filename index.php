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
    <h1>Tähtien sote elokuvat</h1>
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
$result = $db->query("SELECT * FROM movies");

// Display data in an HTML table
if ($result->num_rows > 0) {
    echo '<table class="table table-bordered">';
    echo 
    '<tr><th>Title</th>
    <th>Opening_crawl</th>
    <th>Director</th>
    <th>Release_date</th>
    <th>Charaters</th>
    </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['Title'] . '</td>';
        echo '<td>' . $row['Opening_crawl'] . '</td>';
        echo '<td>' . $row['Director'] . '</td>';
        echo '<td>' . $row['Release_date'] . '</td>';
        echo '<td>' .'<a href="http://localhost/starwars/characters.php/">link</a>'.  $row ['Characters']. '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data available.';
}

// Close database connection
$db->close();
?>