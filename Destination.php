<!DOCTYPE html>
<html>
<head>
    <title>Carpooling Destination</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <?php
    $destination = $_GET['destination'];
    echo "<h1>You have selected: $destination</h1>";

    if ($destination == "Uttara") {
        echo "<div class='rider-box'>";
        echo "<h2>Rider Availability</h2>";
        echo "<div class='rider-info'>";
        echo "<p><strong>Name:</strong> Zaqa Zeeshan</p>";
        echo "<p><strong>Car Number:</strong> G-203</p>";
        echo "<p><strong>Car Model:</strong> Toyota</p>";
        echo "<p><strong>Phone Number:</strong> 01748555421</p>";
        echo "<button class='request-button'>Send Request</button>";
        echo "<a class='call-button' href='tel:01748555421'>Call Rider</a>";
        echo "</div>";
        echo "</div>";
    }
    // Add similar code for other destinations here

    ?>
</body>
</html>
