<?php
// cURL initialization
$ch = curl_init($api_url);

// cURL settings
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Parse JSON response
    $data = json_decode($response, true);

    // Database connection
    $db = new mysqli('localhost', 'root', '', 'star_wars');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Insert data into the 'starships' table
    foreach ($data['results'] as $starship) {
        $title = $db->real_escape_string($starship['Title']);
        $opening_crawl = $db->real_escape_string($starship['Opening_crawl']);
        $director = $db->real_escape_string($starship['Director']);
        $release_date = $db->real_escape_string($starship['Release_date']);
        $Characters = $db->real_escape_string($starship['Characters']);


        $sql = "INSERT INTO starships (title, Opening_crawl, Director, Release_date, Characters) VALUES ('$title', '$opening_crawl', '$director','$release_date', '$Characters' )";
        $db->query($sql);
    }

    echo 'Data fetched and stored successfully.';
}

// Close cURL resource and database connection
curl_close($ch);
$db->close();
?>