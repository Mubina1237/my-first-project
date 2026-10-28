<?php
include 'config.php';

if (isset($_POST['book_id'])) {
    $book_id = intval($_POST['book_id']);

    // Update likes in the books table
    $conn->query("UPDATE books SET likes = likes + 1 WHERE id = $book_id");

    // Redirect back to the main page
    header("Location: index.php");
    exit;
}
?>
