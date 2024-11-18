<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <p>Please enter your Login and your Password..</p>
        <form action="dashboard.php" method="POST">
            <div class="input-group">
                <label for="email"><i class="fa fa-user"></i></label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <label for="password"><i class="fa fa-lock"></i></label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="login-button">Login</button>
           
            <p>Not a member yet? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to verify the user
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");

    if ($result->num_rows > 0) {
        echo "<script>alert('Login successful!');</script>";
        // Redirect to a dashboard page
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }
}
?>
