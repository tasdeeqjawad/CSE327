<!DOCTYPE html>
<html>
<head>
    <title>Carpooling Destination</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
    <?php
    $rider = $_GET['rider'];
    
    if ($rider == 1) {
        echo "<div class='rider-box'>";
        echo "<h2>Rider 1 - Selected</h2>";
        echo "<div class='rider-info'>";
        echo "<p><strong>Name:</strong> John Doe</p>";
        echo "<p><strong>Car Number:</strong
