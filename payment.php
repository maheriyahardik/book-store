<?php
include 'connection.php';

$b_id = isset($_GET['b_id']) ? intval($_GET['b_id']) : 0;

// Use prepared statements to prevent SQL injection
$query = $con->prepare("SELECT books.*, authors.author_name as author_name, authors.author_email as author_email, authors.author_number as author_number, authors.author_city as author_city, authors.author_img as author_img FROM books INNER JOIN authors ON books.b_id = authors.author_id WHERE books.b_id = ?");
$query->bind_param("i", $b_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Book not found.");
}

$query->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 20px;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Payment Options</h1>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($row['b_id']); ?></p>
            <p><strong>Subject:</strong> <?php echo htmlspecialchars($row['subject']); ?></p>
            <p><strong>Price:</strong> <?php echo htmlspecialchars($row['b_price']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($row['b_description']); ?></p>
            <p><strong>Image:</strong><br><img src="<?php echo htmlspecialchars($row['b_image']); ?>" style="width:100px;"></p>

            <h2>Author Information</h2>
            <p><strong>Name:</strong> <?php echo isset($row['author_name']) ? htmlspecialchars($row['author_name']) : 'N/A'; ?></p>
            <p><strong>Email:</strong> <?php echo isset($row['author_email']) ? htmlspecialchars($row['author_email']) : 'N/A'; ?></p>
            <p><strong>Number:</strong> <?php echo isset($row['author_number']) ? htmlspecialchars($row['author_number']) : 'N/A'; ?></p>
            <p><strong>City:</strong> <?php echo isset($row['author_city']) ? htmlspecialchars($row['author_city']) : 'N/A'; ?></p>
            <p><strong>Image:</strong><br><img src="<?php echo isset($row['author_img']) ? htmlspecialchars($row['author_img']) : 'placeholder.jpg'; ?>" style="width:100px" alt="Author Image"/></p>

            <h2>Proceed with Payment</h2>
            <a href="payment_detail.php?b_id=<?php echo $b_id; ?>&method=credit_card" class="btn btn-success">Pay with Credit Card</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
