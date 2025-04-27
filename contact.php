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
                <a href="index.php" class="nav-item nav-link ">Home</a>
                  <a href="book.php" class="nav-item nav-link">book</a>


                <!-- <a href="courses.php" class="nav-item nav-link">Orders</a> -->

                <a href="about.php" class="nav-item nav-link">About</a>
                  <a href="contact.php" class="nav-item nav-link active">contact</a>
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
                    <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>

                            <li class="breadcrumb-item text-white active"  herf="contact.php">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-0">shri shukh sai,shankheswar park 2,behind gokul hotel, 80 feet road,surendrangar</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0">9428475530</p>
                            <p class="mb-0">9825389178</p>
                            <p class="mb-0">7046390769</p>
                            <p class="mb-0">8320590204</p> 
                            <p class="mb-0">9016880649</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">smit@gmail.com</p>
                            <p class="mb-0">keyur@gmail.com</p>
                            <p class="mb-0">shivam@gmail.com</p>
                            <p class="mb-0">parth@gmail.com</p>
                            <p class="mb-0">hardik@gmail.com</p>   
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
    <iframe class="position-relative rounded w-100 h-100"
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14986.33154698299!2d71.6362463!3d22.7352849!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39594119e8d19ba1%3A0xe49404f64a732f39!2sGokul%20Park%20Restaurant!5e0!3m2!1sen!2sin!4v1699999999999!5m2!1sen!2sin"
        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
</div>


            </div>
        </div>
    </div>
    <!-- Contact End -->


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
</body>

</html>
