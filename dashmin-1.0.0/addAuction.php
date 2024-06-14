<?php
require "connection.php";
// session_start();
// $product = $_SESSION["u"];
// if (isset($product)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CTG Add Product</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admincss/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admincss/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle " src="img/logo.png" alt="" style="width: 180px; height: 180px;">
                    </div>

                </div>
                <div class="navbar-nav w-75">
                    <a href="adminpanel.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-1"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="bi bi-laptop-fill"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addProduct.php" class="dropdown-item ">Add Product</a>
                            <a href="manageProduct.php" class="dropdown-item">Manage Product</a>
                            <a href="manageOffers.php" class="dropdown-item ">Manage Offers</a>
                            <a href="manageAuction.php" class="dropdown-item">Manage BID Product</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-1"></i>Customer</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="manageCustomer.php" class="dropdown-item">Manage Customer</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-stack"></i>Blog</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addBlock.php" class="dropdown-item">Create Blog</a>
                            <a href="manageBlog.php" class="dropdown-item">Manage Blog</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="fa fa-mail-bulk me-1"></i>Chat</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="composemail.php" class="dropdown-item active">Email</a>
                            <a href="#" class="dropdown-item">Tidio</a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="adminpanel.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">Calander</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <div class="col-sm-12 col-md-6 col-xl-4">
                                <div class="h-100 bg-light rounded p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="mb-0">Calender</h6>
                                    </div>
                                    <div id="calender"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item" onclick="signout();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Users</p>
                                <?php
                                $count1 = Database::search("SELECT * FROM `user`");
                                $c1 = $count1->num_rows;
                                ?>
                                <h6 class="mb-0"><?php echo $c1; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Product</p>
                                <?php
                                $count2 = Database::search("SELECT * FROM `auction`");
                                $c2 = $count2->num_rows;
                                ?>
                                <h6 class="mb-0"><?php echo $c2; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orders</p>
                                <?php
                                $count3 = Database::search("SELECT * FROM `auction_invoice`");
                                $c3 = $count3->num_rows;
                                ?>
                                <h6 class="mb-0"><?php echo $c3; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Chat Customers</p>
                                <?php
                                $count4 = Database::search("SELECT * FROM `contact`");
                                $c4 = $count4->num_rows;
                                ?>
                                <h6 class="mb-0"><?php echo $c4; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4 row">
                            <h6 class="mb-4">Basic Form</h6>

                            <div class="mb-3 col-6">
                                <label class="form-label">Item Title</label>
                                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title">
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Qty</label>
                                <input type="number" class="form-control" id="qty" placeholder="Qty">
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Price">
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Expire Date</label>
                                <input type="date" value="yyyy/mm/dd" class=" form-control" id="exdate">
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Select Category</label>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" id="category">
                                    <option value="0">Select Category</option>
                                    <?php

                                    $rs1 = Database::search("SELECT * FROM `category`");
                                    $n1 = $rs1->num_rows;

                                    for ($i = 1; $i <= $n1; $i++) {
                                        $cat = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $cat["id"] ?>"><?php echo $cat["cname"] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Select Model</label>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" id="model">
                                    <option value="0">Select Model</option>
                                    <?php

                                    $rs1 = Database::search("SELECT * FROM `model`");
                                    $n1 = $rs1->num_rows;

                                    for ($i = 1; $i <= $n1; $i++) {
                                        $cat = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $cat["id"] ?>"><?php echo $cat["mname"] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Select Color</label>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" id="color">
                                    <option value="0">Select Color</option>
                                    <?php

                                    $rs1 = Database::search("SELECT * FROM `color`");
                                    $n1 = $rs1->num_rows;

                                    for ($i = 1; $i <= $n1; $i++) {
                                        $cat = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $cat["id"] ?>"><?php echo $cat["name"] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <textarea class="form-control" name="" id="des" cols="15" rows="5"></textarea>


                            </div>
                            <!-- product img -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Add Product Image</label>
                                        <p class="text-danger">* Please add 438 x 438 pixel images </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-6 col-md-2">
                                                <img class="col-12 col-lg-12 ms-2 img-thumbnail" id="prev" src="img/addproductimg.svg" />
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-10">
                                                                    <input class="d-none" type="file" accept="img/*" id="imguploader" />
                                                                    <label class="btn btn-primary col-4 col-lg-8" for="imguploader" onclick="changeImage();">Upload</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-2">
                                                <img class="col-12 col-lg-12 ms-2 img-thumbnail" id="prev2" src="img/addproductimg.svg" />
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-10 mt-2">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input class="d-none" type="file" accept="img/*" id="imguploader2" />
                                                                    <label class="btn btn-primary col-12 col-lg-8" for="imguploader2" onclick="changeImage2();">Upload</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-2">
                                                <img class="col-12 col-lg-12 ms-2 img-thumbnail" id="prev3" src="img/addproductimg.svg" />
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-10">
                                                                    <input class="d-none" type="file" accept="img/*" id="imguploader3" />
                                                                    <label class="btn btn-primary col-4 col-lg-8" for="imguploader3" onclick="changeImage3();">Upload</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <img class="col-12 col-lg-12 ms-2 img-thumbnail" id="prev4" src="img/addproductimg.svg" />
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-10">
                                                                    <input class="d-none" type="file" accept="img/*" id="imguploader4" />
                                                                    <label class="btn btn-primary col-4 col-lg-8" for="imguploader4" onclick="changeImage4();">Upload</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <img class="col-12 col-lg-12 ms-2 img-thumbnail" id="prev5" src="img/addproductimg.svg" />
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-12 mt-2">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-10">
                                                                    <input class="d-none" type="file" accept="img/*" id="imguploader5" />
                                                                    <label class="btn btn-primary col-4 col-lg-8" for="imguploader5" onclick="changeImage5();">Upload</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- product img -->
                            <button class="btn btn-primary" onclick="addAuction();">Add Item</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Ceylon Trusty Gems</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://ligeons.com">ligeons software solution</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Template Javascript -->
    <script src="adminjs/main.js"></script>
    <script src="product.js"></script>
</body>

</html>
<?php
// } else {
?>
<script>
    // window.location = "login.php";
</script>
<?php
// }
?>