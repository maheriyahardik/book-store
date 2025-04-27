<?php
include 'connection.php';

$b_id = isset($_GET['b_id']) ? intval($_GET['b_id']) : 0;
$amount = isset($_GET['amount']) ? floatval($_GET['amount']) : 0.0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="alert alert-success mt-5">
            <h4 class="alert-heading">Payment Successful!</h4>
            <p>Payment of <?php echo htmlspecialchars($amount); ?> for book ID <?php echo htmlspecialchars($b_id); ?> was successful.</p>
            <hr>
            <p class="mb-0"><a href="index.php" class="btn btn-primary">Go back to homepage</a></p>
        </div>
    </div>
</body>
</html>
