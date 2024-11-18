<?php
$conn = new mysqli('localhost', 'root', '', 'virtual_tour');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>