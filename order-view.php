<?php
include "connection.php";

// Fetch all order details from the database
$stmt = $con->prepare("SELECT * FROM credit_cards");
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Handle delete action
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $con->prepare("DELETE FROM credit_cards WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header("Location: order-view.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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
                     <a class="nav-item nav-link" >Add</a>
                <div class="dropdown-content">
                  <center>
                <a href="authoradd.php" class="nav-item nav-link">Add Author</a>
                <a href="bookadd.php" class="nav-item nav-link">Add Book</a>
              </center>
              </div>
            </div>
            <div class="dropdown">
                 <a class="nav-item nav-link" >View</a>
            <div class="dropdown-content">
              <div class="dropdown-content">
                <center>
                <a href="author-view.php" class="nav-item nav-link">Author View</a>
                <a href="book-view.php" class="nav-item nav-link">Book View</a>
                <a href="user-view.php" class="nav-item nav-link">User View</a>
                <a href="order-view.php" class="nav-item nav-link active">Order View</a>
                <a href="review-view.php" class="nav-item nav-link">Review View</a>
                </center>
                </div>
              </div>
  </center>
          <?php
if(isset($_SESSION['admin'])){
?>
 <a href="logout.php" class="nav-item nav-link">Logout</a>
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
                  <h1 class="display-3 text-white animated slideInDown">Order View</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a class="text-white" href="admin-home.php">Home</a></li>
                          <li class="breadcrumb-item text-white active" aria-current="page">Order View</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <!-- Header End -->

  <!-- Order View Start -->
  <div class="container-xxl py-5 wow fadeInUp form-container" data-wow-delay="0.1s">
      <div class="form-box">
          <div class="text-center">
              <h1 class="mb-5">Order View</h1>
          </div>
          <div class="container">
              <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-xl-12 col-lg-12">
                      <div class="section-tittle mb-55">
                      <table class="table">
                          <thead>
                                  <tr>
                                      <th>Book ID</th>
                                      <th>Card Number</th>
                                      <th>Card Name</th>
                                      <th>Expiry Date</th>
                                      <th>Total Amount</th>
                                      <th>CVV</th>
                                      <th>Created At</th>
                                      <th>Actions</th>
                                  </tr>
                          </thead>
                          <tbody>
                                  <?php foreach ($orders as $order): ?>
                                  <tr>
                                          <td><?php echo htmlspecialchars($order['b_id']); ?></td>
                                          <td><?php echo htmlspecialchars($order['card_number']); ?></td>
                                          <td><?php echo htmlspecialchars($order['card_name']); ?></td>
                                          <td><?php echo htmlspecialchars($order['expiry_date']); ?></td>
                                          <td><?php echo htmlspecialchars($order['amount']); ?></td>
                                          <td><?php echo htmlspecialchars($order['cvv']); ?></td>
                                          <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                                          <td>
                                            <a href="order-view.php?delete_id=<?php echo $order['id'];?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this order?')">Delete</a>
                                          </td>
                                  </tr>
                                  <?php endforeach; ?>
                          </tbody>
                      </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Order View End -->

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
