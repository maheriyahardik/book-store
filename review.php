<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
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
                  <a href="book.php" class="nav-item nav-link">book</a>


                <!-- <a href="courses.php" class="nav-item nav-link">Orders</a> -->

                <a href="about.php" class="nav-item nav-link">About</a>
                  <a href="contact.php" class="nav-item nav-link ">contact</a>
                <a href="review.php" class="nav-item nav-link active">review</a>
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
                    <h1 class="display-3 text-white animated slideInDown">Review</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Review</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Review Form</h6>
                <h1 class="mb-5">Submit Your Review</h1>
            </div>
            <div class="container">
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form id="reviewForm" action="review-view-body.php" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="u_id" id="u_id" placeholder="Enter your user id" required>
                                    <label for="u_id">User ID</label>
                                    <div id="u_id_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                    <label for="name">Your Name</label>
                                    <div id="name_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                    <label for="email">Your Email</label>
                                    <div id="email_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" placeholder="Rate (1-5)" required>
                                    <label for="rating">Rate</label>
                                    <div id="rating_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="feedback" id="feedback" rows="5" placeholder="Write your review here..." required></textarea>
                                    <label for="feedback">Feedback</label>
                                    <div id="feedback_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'foot.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Custom JavaScript for Validation -->
    <script>
        document.getElementById('reviewForm').addEventListener('submit', function(event) {
            let valid = true;

            // Clear previous errors
            document.getElementById('u_id_error').textContent = '';
            document.getElementById('name_error').textContent = '';
            document.getElementById('email_error').textContent = '';
            document.getElementById('rating_error').textContent = '';
            document.getElementById('feedback_error').textContent = '';

            // User ID validation
            const uId = document.getElementById('u_id').value;
            if (uId.trim() === '' || isNaN(uId)) {
                document.getElementById('u_id_error').textContent = 'User ID is required and must be a number.';
                valid = false;
            }

            // Name validation
            const name = document.getElementById('name').value;
            if (name.trim() === '') {
                document.getElementById('name_error').textContent = 'Name is required.';
                valid = false;
            }

            // Email validation
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('email_error').textContent = 'Please enter a valid email address.';
                valid = false;
            }

            // Rating validation
            const rating = parseInt(document.getElementById('rating').value, 10);
            if (isNaN(rating) || rating < 1 || rating > 5) {
                document.getElementById('rating_error').textContent = 'Rating must be a number between 1 and 5.';
                valid = false;
            }

            // Feedback validation
            const feedback = document.getElementById('feedback').value;
            if (feedback.trim() === '') {
                document.getElementById('feedback_error').textContent = 'Feedback is required.';
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>
