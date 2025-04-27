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
<head>
  <style>
    /* General body styling */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 100%;
      margin: 0 auto;
      padding: 20px;
      box-sizing: border-box;
    }

    .text-center {
      text-align: center;
    }

    /* Spinner styling */
    #spinner {
      background-color: rgba(255, 255, 255, 0.9);
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1000;
    }

    /* Navbar styling */
    .navbar {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      height: 50px;
    }

    .nav-link {
      color: #555;
      font-weight: 500;
    }

    .nav-link:hover, .nav-link.active {
      color: #007bff;
    }

    /* Header styling */
    .breadcrumb a {
      color: white;
      text-decoration: none;
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    /* Form and table styling */
    .container-xxl {
      margin-top: 20px;
    }

    .section-tittle {
      margin-bottom: 30px;
      text-align: center;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
      border-collapse: collapse;
    }

    .table th, .table td {
      padding: 1rem;
      vertical-align: top;
      border: 1px solid #dee2e6;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .table .table {
      background-color: #f8f9fa;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }

    /* Back to top button */
    .back-to-top {
      position: fixed;
      right: 15px;
      bottom: 15px;
      width: 40px;
      height: 40px;
      background-color: #007bff;
      color: white;
      text-align: center;
      line-height: 40px;
      border-radius: 50%;
      display: none;
      z-index: 999;
    }

    .back-to-top:hover {
      background-color: #0056b3;
      color: white;
    }

    /* Form styling */
    .form-container {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container h1 {
      margin-bottom: 20px;
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
        <h2 class="m-0 p-100 text-primary">
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
                     <a class="nav-item nav-link" >add</a>
                <div class="dropdown-content">
                  <center>
                <a href="authoradd.php" class="nav-item nav-link">add Author</a>
                <a href="bookadd.php" class="nav-item nav-link">add Book</a>
              </center>
              </div>
            </div>
            <div class="dropdown">
                 <a class="nav-item nav-link" >view</a>
            <div class="dropdown-content">
              <div class="dropdown-content">
                <center>
                <a href="author-view.php" class="nav-item nav-link">author view</a>
                <a href="book-view.php" class="nav-item nav-link ">book view</a>
                <a href="user-view.php" class="nav-item nav-link ">user view</a>
                <a href="order-view.php" class="nav-item nav-link ">order view</a>
                <a href="review-view.php" class="nav-item nav-link active">review view</a>
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
                  <h1 class="display-3 text-white animated slideInDown">review view</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a class="text-white" href="admin-home.php">Home</a></li>
                          <li class="breadcrumb-item text-white active" aria-current="page">review view</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <!-- Header End -->

  <!-- Contact Start -->
  <div class="container-xxl py-5 wow fadeInUp form-container" data-wow-delay="0.1s">
      <div class="form-box">
          <div class="text-center">
              <h1 class="mb-5">Review View Form</h1>
          </div>
          <div class="container">
              <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-xl-12 col-lg-12">
                      <div class="section-tittle mb-55">
                      <table class="table">
                          <thead>
                                  <tr>
                                      <th>Review ID</th>
                                      <th>User ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Feedback</th>
                                      <th>Rate</th>
                                      <th>delete record</th>
                                  </tr>
                          </thead>
                          <tbody>
                                  <?php
                                  if(isset($_GET["review_id"]))
                                  {
                                    $qDelete = "delete from reviews where review_id=" . $_GET["review_id"];
                                    $rsDelete = mysqli_query($con, $qDelete);
                                  }
                                  include "connection.php";
                                  $q="select * from reviews";
                                  $rs=mysqli_query($con,$q);
                                  while($row=mysqli_fetch_array($rs)){
                                  ?>
                                  <tr>
                                          <td><?php echo $row['review_id'] ?></td>
                                          <td><?php echo $row['u_id'] ?></td>
                                          <td><?php echo $row['r_name'] ?></td>
                                          <td><?php echo $row['r_email'] ?></td>
                                          <td><?php echo $row['feedback'] ?></td>
                                          <td><?php echo $row['rate'] ?></td>
                                          <td><a href="review-view.php?review_id=<?php echo $row['review_id'];?>"class="btn btn-danger"
                                            onclick="confirm('do you want delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                          </tbody>
                      </table>
                      </div>
                  </div>
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
