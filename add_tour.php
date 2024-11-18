<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Check if the "images" folder exists, if not, create it
    $targetDir = "images/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create folder with appropriate permissions
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_name = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $new_name = rand() . $img_name;

        // Move uploaded file to the images directory
        $targetPath = $targetDir . $new_name;
        if (move_uploaded_file($tmp, $targetPath)) {
            // Insert into database
            $conn->query("INSERT INTO tours (title, description, image_path) VALUES ('$title', '$description', '$new_name')");

            echo "Tour added successfully!";
        } else {
            echo "Failed to upload the image.";
        }
    } else {
        echo "No image uploaded or there was an error with the upload.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Tour</title>
    <link rel="stylesheet" href="assets/add_tour.css">
</head>
<body>
    <h1>Add a New Tour</h1>
    <form action="add_tour.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Tour Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" id="image" name="image" accept="image/*" required>
        <button type="submit" name="submit">Add Tour</button>
    </form>
</body>
</html>
