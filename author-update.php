<?php
include "connection.php";

if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
    $query = "SELECT * FROM authors WHERE author_id=$author_id";
    $result = mysqli_query($con, $query);
    $author = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $author_name = $_POST['author_name'];
    $author_email = $_POST['author_email'];
    $author_number = $_POST['author_number'];
    $author_city = $_POST['author_city'];

    // Check if a new image was uploaded
    if ($_FILES['author_img']['name']) {
        $target_dir = "New folder1/";
        $target_file = $target_dir . basename($_FILES["author_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["author_img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }


        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["author_img"]["tmp_name"], $target_file)) {
                $author_img = $target_file; // Set the new image path
                // Update the author's record with the new image path
                $query = "UPDATE authors SET author_img='$author_img' WHERE author_id=$author_id";
                mysqli_query($con, $query);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Update the author's record with the other fields
    $query = "UPDATE authors SET author_name='$author_name', author_email='$author_email', author_number='$author_number', author_city='$author_city' WHERE author_id=$author_id";
    mysqli_query($con, $query);

    header('Location: author-view.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Author</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container img {
            display: block;
            margin-bottom: 15px;
            width: 100px;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Update Author</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="author_name">Name:</label>
            <input type="text" name="author_name" value="<?php echo $author['author_name']; ?>" required><br>

            <label for="author_email">Email:</label>
            <input type="email" name="author_email" value="<?php echo $author['author_email']; ?>" required><br>

            <label for="author_number">Number:</label>
            <input type="text" name="author_number" value="<?php echo $author['author_number']; ?>" required><br>

            <label for="author_city">City:</label>
            <input type="text" name="author_city" value="<?php echo $author['author_city']; ?>" required><br>

            <label for="author_img">Image:</label>
            <input type="file" name="author_img"><br>
            <?php if ($author['author_img']): ?>
                <img src="<?php echo $author['author_img']; ?>" alt="Author Image"><br>
            <?php endif; ?>

            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
