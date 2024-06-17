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
        $gender = $db->real_escape_string($starship['gender']);
        $hair_color = $db->real_escape_string($starship['hair_color']);
        $height = $db->real_escape_string($starship['height']);
        $mass = $db->real_escape_string($starship['mass']);
        $name = $db->real_escape_string($starship['name']);
        $skin_color = $db->real_escape_string($starship['skin_color']);

        $sql = "INSERT INTO starships (gender,hair_color,height, mass, name,skin_color ) VALUES ('$gender', '$name', '$height','$mass', '$name', '$skin_color' )";
        $db->query($sql);
    }

    echo 'Data fetched and stored successfully.';
}

// Close cURL resource and database connection
curl_close($ch);
$db->close();
?>