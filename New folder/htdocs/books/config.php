<?php
$conn = new mysqli("localhost", "root", "", "book_shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
