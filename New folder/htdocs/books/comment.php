<?php
include 'config.php';
$book_id = $_POST['book_id'];
$comment = $conn->real_escape_string($_POST['comment']);
$conn->query("INSERT INTO comments (book_id, comment) VALUES ($book_id, '$comment')");
header("Location: index.php");
?>
