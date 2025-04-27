<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>
<?php
include 'connection.php';

if (isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
    $q = "SELECT * FROM books WHERE b_id = $b_id";
    $rs = mysqli_query($con, $q);
    $book = mysqli_fetch_array($rs);
}

if (isset($_POST['update'])) {
    $b_id = $_POST['b_id'];
    $sem = $_POST['sem'];
    $subject = $_POST['subject'];
    $b_price = $_POST['b_price'];
    $b_description = $_POST['b_description'];

    if ($_FILES['b_image']['name']) {
        $b_image = "Newfolder/" . basename($_FILES['b_image']['name']);
        move_uploaded_file($_FILES['b_image']['tmp_name'], $b_image);
        $qUpdate = "UPDATE books SET sem='$sem', subject='$subject', b_price='$b_price', b_description='$b_description', b_image='$b_image' WHERE b_id=$b_id";
    } else {
        $qUpdate = "UPDATE books SET sem='$sem', subject='$subject', b_price='$b_price', b_description='$b_description' WHERE b_id=$b_id";
    }

    $rsUpdate = mysqli_query($con, $qUpdate);
    header('Location: book-view.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<head>
    <style>
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Book</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="b_id" value="<?php echo $book['b_id']; ?>">
            <div class="mb-3">
                <label for="sem" class="form-label">Semester</label>
                <input type="text" class="form-control" id="sem" name="sem" value="<?php echo $book['sem']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $book['subject']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="b_price" class="form-label">Book Price</label>
                <input type="text" class="form-control" id="b_price" name="b_price" value="<?php echo $book['b_price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="b_description" class="form-label">Book Description</label>
                <textarea class="form-control" id="b_description" name="b_description" rows="3" required><?php echo $book['b_description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="b_image" class="form-label">Book Image</label>
                <input type="file" class="form-control" id="b_image" name="b_image">
                <img src="<?php echo $book['b_image']; ?>" style="width: 100px; margin-top: 10px;">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
