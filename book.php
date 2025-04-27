<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'; ?>
  <style>
    /* Your existing CSS styles here */
    .book-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .book-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 300px;
        text-align: center;
        padding: 20px;
        transition: transform 0.3s ease-in-out;
        height: auto;; /* Adjusted height for uniform size */
    }
    .book-card img.book-image {
        max-width: 100%;
        height: 200px; /* Fixed height for book images */
        border-radius: 5px;
        object-fit: cover;
    }
    img.author-image {
        width: 100px; /* Fixed size for author images */
        height: 100px; /* Fixed size for author images */
        border-radius: 50%;
        position: relative;
        margin: 16px;
        bottom : 5px;
        object-fit: fill;
    }
    .book-card h3 {
        font-size: 20px;
        margin: 10px 0;
    }
    .book-card p {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }
    .book-card .btn {
      position: relative;
      margin: 6px;
      bottom : 0 px;
    }
    .book-card:hover {
        transform: translateY(-10px);
    }
  </style>
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <h2 class="m-0 p-100   text-primary"><i class="fa"></i>
            <img src="img/kc1.jpg" class="hello" alt="#"/>
          </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                  <a href="book.php" class="nav-item nav-link active">book</a>


                <!-- <a href="courses.php" class="nav-item nav-link">Orders</a> -->

                <a href="about.php" class="nav-item nav-link">About</a>
                  <a href="contact.php" class="nav-item nav-link ">contact</a>
                <a href="review.php" class="nav-item nav-link">review</a>
                <a href="register.php" class="nav-item nav-link">register</a>

                <?php
      if(isset($_SESSION['user'])){
    ?>
       <a href="logout.php" class="nav-item nav-link">LOGOUT</a>
    <?php } else { ?>

      <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>

    <?php } ?>


                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> -->

            </div>
  </div>
    </nav>

    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Book</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Book</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Book List Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mb-4">
                <h6 class="section-title bg-white text-center text-primary px-3">Book List</h6>
                <h1 class="mb-5">Available Books</h1>
            </div>
            <div class="book-list">
                <?php
                include "connection.php";

                // Updated SQL query to join books with authors
                $q = "SELECT b.b_id, b.sem, b.subject, b.b_price, b.b_image, b.b_description,
                             a.author_name, a.author_email, a.author_number, a.author_city, a.author_img
                      FROM books b
                      JOIN authors a ON b.b_id = a.author_id";

                $rs = mysqli_query($con, $q);

                // Check if query was successful
                if ($rs === false) {
                    echo "<div>Error: " . mysqli_error($con) . "</div>";
                } else {
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                    <div class="book-card">
                        <img src="<?php echo htmlspecialchars($row['b_image']); ?>" class="book-image" alt="Book Image"/>
                        <h3><?php echo htmlspecialchars($row['subject']); ?></h3>
                        <p><strong>Semester:</strong> <?php echo htmlspecialchars($row['sem']); ?></p>
                        <p><strong>Price:</strong> <?php echo htmlspecialchars($row['b_price']); ?></p>
                        <p><?php echo htmlspecialchars($row['b_description']); ?></p>
                        <h4>Author: <?php echo htmlspecialchars($row['author_name']); ?></h4>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($row['author_email']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['author_number']); ?></p>
                        <p><strong>City:</strong> <?php echo htmlspecialchars($row['author_city']); ?></p>
                        <img src="<?php echo htmlspecialchars($row['author_img']); ?>" class="author-image" alt="Author Image"/>
                        <?php if(isset($_SESSION['user'])): ?>
                            <a href="payment.php?b_id=<?php echo htmlspecialchars($row['b_id']); ?>" class="btn btn-danger">Order</a>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-primary">Login to Order</a>
                        <?php endif; ?>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Book List End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title
                bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <!-- Testimonial items here -->
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <?php include 'foot.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script>
        function showOrderItem(bookId) {
            window.location.href = 'order_summary.php?b_id=' + bookId;
        }
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
