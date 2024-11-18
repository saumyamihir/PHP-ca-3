<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Tour Platform</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Welcome to the Virtual Tour Platform</h1>
    <div class="tours">
        <?php
        // Fetching tours from the database
        $result = $conn->query("SELECT * FROM tours");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='tour'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";

            // Make sure the image path is correct
            $imagePath = "images/" . $row['image_path']; // Assuming image_path is just the image name, not the full path

            // Check if the image exists before trying to display it
            if (file_exists($imagePath)) {
                echo "<img src='" . $imagePath . "' alt='" . $row['title'] . "' style='width:300px;'>";
            } else {
                echo "<p>Image not available.</p>";
            }

            echo "<a href='tour.php?id=" . $row['id'] . "'>View Tour</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
