<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>
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
      <center>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="admin-home.php" class="nav-item nav-link ">Home</a>
                <div class="dropdown">
                     <a class="nav-item nav-link " >Add</a>
                <div class="dropdown-content">
                  <center>
                <a href="authoradd.php" class="nav-item nav-link active">Add Author</a>
                <a href="bookadd.php" class="nav-item nav-link">Add Book</a>
              </center>
              </div>
            </div>
            <div class="dropdown">
                 <a class="nav-item nav-link " >View</a>
            <div class="dropdown-content">
              <div class="dropdown-content">
                <center>

                <a href="author-view.php" class="nav-item nav-link">Author View</a>
                <a href="book-view.php" class="nav-item nav-link ">Book View</a>
                  <a href="user-view.php" class="nav-item nav-link ">User View</a>
                  <a href="order-view.php" class="nav-item nav-link ">Order View</a>
                  <a href="review-view.php" class="nav-item nav-link">Review View</a>
                </center>
                </div>
              </div>
  </center>
          <?php
if(isset($_SESSION['admin'])){
?>
 <a href="logout.php" class="nav-item nav-link">LOGOUT</a>
<?php } else { ?>

<a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>

<?php } ?>
  </nav>
  <!-- Navbar End -->


  <!-- Header Start -->
  <div class="container-fluid bg-primary py-5 mb-5 page-header">
      <div class="container py-5">
          <div class="row justify-content-center">
              <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Add Author</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a class="text-white" href="admin-home.php">Home</a></li>
                          <li class="breadcrumb-item text-white active" aria-current="page">Add Author</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <!-- Header End -->


  <!-- Contact Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
          <div class="text-center">
              <h1 class="mb-5">Author Add Form</h1>
          </div>
          <div class="container">
              <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form id="authorAddForm" action="author-view-body.php" method="post" enctype="multipart/form-data">
                      <div class="row g-3">
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="text" class="form-control" name="a_name" id="a_name" placeholder="Author Name" required>
                                  <label for="a_name">Author Name</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="email" class="form-control" name="a_email" id="a_email" placeholder="Author Email" required>
                                  <label for="a_email">Author Email</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="text" class="form-control" name="phno" id="phno" placeholder="Author Phone Number" pattern="[0-9]{10}" title="Enter a valid 10-digit phone number" required>
                                  <label for="phno">Author Phone Number</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="text" class="form-control" name="a_city" id="a_city" placeholder="Author City" required>
                                  <label for="a_city">Author City</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <label for="a_image1">Author Image</label>
                              <input type="file" class="form-control" id="a_image" name="a_image" accept="image/*" required>
                          </div>
                          <div class="col-12">
                              <button class="btn btn-primary w-100 py-3" type="submit">Add</button>
                          </div>
                      </div>
                  </form>
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

  <script>
    document.getElementById('authorAddForm').addEventListener('submit', function(event) {
      var isValid = true;
      var a_name = document.getElementById('a_name').value;
      var a_email = document.getElementById('a_email').value;
      var phno = document.getElementById('phno').value;
      var a_city = document.getElementById('a_city').value;
      var a_image = document.getElementById('a_image').value;

      if (a_name === '') {
        isValid = false;
        alert('Please enter the author name.');
      }

      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailPattern.test(a_email)) {
        isValid = false;
        alert('Please enter a valid email address.');
      }

      var phonePattern = /^[0-9]{10}$/;
      if (!phonePattern.test(phno)) {
        isValid = false;
        alert('Please enter a valid 10-digit phone number.');
      }

      if (a_city === '') {
        isValid = false;
        alert('Please enter the author city.');
      }

      if (a_image === '') {
        isValid = false;
        alert('Please upload an image.');
      }

      if (!isValid) {
        event.preventDefault();
      }
    });
  </script>
</body>
</html>
