<?php
include 'db.php'; 

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id']; 
    echo "SELECT * FROM tours WHERE id = $id";
    $result = $conn->query("SELECT * FROM tours WHERE id = $id");

    // Check if the tour exists
    if ($result->num_rows > 0) {
        $tour = $result->fetch_assoc(); 
    } else {
        echo "Tour not found!";
        exit();
    }
} else {
    echo "No valid tour ID provided!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tour['title']); ?></title>
    <link rel="stylesheet" href="assets/tour.css">
</head>
<body>
    <div class="tour-container">
        <h1 class="tour-title"><?php echo htmlspecialchars($tour['title']); ?></h1>
        <div class="tour-details">
            <img src="images/<?php echo htmlspecialchars($tour['image_path']); ?>" alt="<?php echo htmlspecialchars($tour['title']); ?>" class="tour-image">
            <div class="tour-description">
                <p><?php echo nl2br(htmlspecialchars($tour['description'])); ?></p>
            </div>
        </div>
        <a href="index.php" class="back-btn">Back to Home</a>
    </div>
</body>
</html>
