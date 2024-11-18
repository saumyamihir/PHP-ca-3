<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
    <div class="signup-container">
        <h1>Signup</h1>
        <p>Create your account</p>
        <form action="" method="POST">
            <!-- Username Input -->
            <div class="input-group">
                <label for="username"></label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <!-- Email Input -->
            <div class="input-group">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <!-- Password Input -->
            <div class="input-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="signup" class="signup-button">Signup</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $check_email = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check_email->num_rows > 0) {
        echo "<script>alert('Email already registered!');</script>";
    } else {
        // Insert user into database
        $insert = $conn->query("INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')");
        if ($insert) {
            echo "<script>alert('Signup successful!');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Signup failed! Please try again.');</script>";
        }
    }
}
?>
