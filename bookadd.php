<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>
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
        <h2 class="m-0 p-100 text-primary"><i class="fa"></i>
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
                     <a class="nav-item nav-link " >add</a>
                <div class="dropdown-content">
                  <center>
                <a href="authoradd.php" class="nav-item nav-link">Add Author</a>
                <a href="bookadd.php" class="nav-item nav-link active">Add Book</a>
              </center>
              </div>
            </div>
            <div class="dropdown">
                 <a class="nav-item nav-link " >view</a>
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
                  <h1 class="display-3 text-white animated slideInDown">Book Add</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a class="text-white" href="admin-home.php">Home</a></li>
                          <li class="breadcrumb-item text-white active" aria-current="page">Book Add</li>
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
              <h1 class="mb-5">!Book Add Form!</h1>
          </div>
          <div class="container">
              <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form action="book-view-body.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                      <div class="row g-3">
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="text" class="form-control" name="sem" id="sem" placeholder="Semester" required>
                                  <label for="sem">Semester</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                  <label for="subject">Subject</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-floating">
                                  <input type="number" class="form-control" name="b_price" id="b_price" placeholder="Book Price" required>
                                  <label for="b_price">Book Price</label>
                              </div>
                          </div>
                          <div class="col-12">
                              <label for="b_image">Book Image</label>
                              <input type="file" id="b_image" name="b_image" accept="image/*" required>
                          </div>
                          <div class="col-12">
                              <label for="b_description">Book Description</label>
                              <textarea id="b_description" name="b_description" rows="4" class="form-control" required></textarea>
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

  <!-- Form Validation Script -->
  <script>
      function validateForm() {
          let sem = document.getElementById("sem").value.trim();
          let subject = document.getElementById("subject").value.trim();
          let b_price = document.getElementById("b_price").value.trim();
          let b_image = document.getElementById("b_image").files.length;
          let b_description = document.getElementById("b_description").value.trim();

          if (!sem) {
              alert("Semester is required.");
              return false;
          }
          if (!subject) {
              alert("Subject is required.");
              return false;
          }
          if (!b_price || isNaN(b_price) || b_price <= 0) {
              alert("Please enter a valid book price.");
              return false;
          }
          if (b_image === 0) {
              alert("Book image is required.");
              return false;
          }
          if (!b_description) {
              alert("Book description is required.");
              return false;
          }
          return true;
      }
  </script>
</body>
</html>
