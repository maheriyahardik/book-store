<?php
include 'connection.php';

// Validate and sanitize input parameters
$b_id = isset($_GET['b_id']) ? intval($_GET['b_id']) : 0;

// Check if b_id is valid
if ($b_id > 0) {
    // Prepare the SQL statement
    $query = "SELECT books.*, authors.author_name AS author_name, authors.author_email AS author_email, authors.author_number AS author_number, authors.author_city AS author_city, authors.author_img AS author_img FROM books INNER JOIN authors ON books.b_id = authors.author_id WHERE books.b_id = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, 'i', $b_id);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any results are returned
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        $row = null; // Set $row to null if no results are found
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    $row = null; // Set $row to null if b_id is invalid
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Detail</title>
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
            <h1>Payment Detail</h1>
            <?php if ($row): ?>
                <h2>Book Information</h2>
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
            <?php else: ?>
                <p>No book found with ID <?php echo htmlspecialchars($b_id); ?></p>
            <?php endif; ?>

            <h2>Credit Card Payment</h2>
            <form action="process_payment.php" method="post" id="paymentForm">
                <input type="hidden" name="b_id" value="<?php echo $b_id; ?>">
                
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Credit Card Number</label>
                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" required pattern="\d{16}" title="16-digit credit card number">
                </div>
                <div class="mb-3">
                    <label for="cardName" class="form-label">Cardholder Name</label>
                    <input type="text" class="form-control" id="cardName" name="cardName" required>
                </div>
                <div class="mb-3">
                    <label for="expiryDate" class="form-label">Expiry Date (MM/YY)</label>
                    <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required pattern="(0[1-9]|1[0-2])\/\d{2}" title="Format: MM/YY">
                </div>
                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" required pattern="\d{3}" title="3-digit CVV">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $row ? htmlspecialchars($row['b_price']) : ''; ?>" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </form>
        </div>
    </div>

    <script>
    document.getElementById('paymentForm').addEventListener('submit', function (e) {
        const cardNumber = document.getElementById('cardNumber').value.trim();
        const cardName = document.getElementById('cardName').value.trim();
        const expiryDate = document.getElementById('expiryDate').value.trim();
        const cvv = document.getElementById('cvv').value.trim();

        const cardNumberRegex = /^\d{16}$/;
        const expiryDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
        const cvvRegex = /^\d{3}$/;

        let errorMessage = "";

        if (!cardNumberRegex.test(cardNumber)) {
            errorMessage += "Invalid card number. It should be 16 digits.\n";
        }
        if (cardName === "") {
            errorMessage += "Cardholder name is required.\n";
        }
        if (!expiryDateRegex.test(expiryDate)) {
            errorMessage += "Invalid expiry date. Format should be MM/YY.\n";
        }
        if (!cvvRegex.test(cvv)) {
            errorMessage += "Invalid CVV. It should be 3 digits.\n";
        }

        if (errorMessage !== "") {
            alert(errorMessage);
            e.preventDefault(); // prevent form submission
        }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
