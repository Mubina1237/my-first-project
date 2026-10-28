<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h1>Online Book Shop</h1>

    <?php
    $books = $conn->query("SELECT * FROM books");
    while ($book = $books->fetch_assoc()):
    ?>
    <div class="card my-3">
        <div class="card-body">
            <h4><?= $book['title'] ?></h4>
            <p><?= $book['description'] ?></p>
            <p><strong>Price:</strong> $<?= $book['price'] ?></p>

            <!-- Buy button -->
            <form action="buy.php" method="post" style="display:inline;">
                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                <button class="btn btn-success">Buy</button>
            </form>

            <!-- Like button -->
            <form action="like.php" method="post" style="display:inline;">
                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                <button class="btn btn-primary">Like (<?= $book['likes'] ?>)</button>
            </form>

            <!-- Comment form -->
            <form action="comment.php" method="post" class="mt-2">
                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                <textarea name="comment" class="form-control" placeholder="Add a comment..." required></textarea>
                <button class="btn btn-secondary mt-1">Comment</button>
            </form>

            <!-- Comments -->
            <ul class="list-group mt-2">
                <?php
                $book_id = $book['id'];
                $comments = $conn->query("SELECT * FROM comments WHERE book_id = $book_id ORDER BY created_at DESC");
                while ($comment = $comments->fetch_assoc()):
                ?>
                <li class="list-group-item"><?= $comment['comment'] ?> <small class="text-muted">(<?= $comment['created_at'] ?>)</small></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <?php endwhile; ?>
</body>
</html>
