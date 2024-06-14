<?php
session_start();
require "connection.php";

if (!isset($_SESSION["admin"])) {
    // $data = $_SESSION["admin"];
    $id = $_GET["id"];
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
        <link href="admincss/app.min.css" rel="stylesheet">

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
                            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><i class="bi bi-laptop-fill"></i>Product</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="addProduct.php" class="dropdown-item ">Add Product</a>
                                <a href="manageProduct.php" class="dropdown-item ">Manage Product</a>
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
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="bi bi-stack"></i>Blog</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="addBlock.php" class="dropdown-item active">Create Blog</a>
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
                                    $count2 = Database::search("SELECT * FROM `product`");
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
                                    $count3 = Database::search("SELECT * FROM `invoice`");
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

                    <div class="row">
                        <div class="col-12">
                            <!-- Left sidebar -->
                            <div class="email-leftbar card">
                                <?php
                                $msg_count_rs = Database::search("SELECT COUNT(`id`) AS `msg_count` FROM `contact` WHERE `status`='Unread'");
                                $msg_count_n = $msg_count_rs->num_rows;
                                $mcount;
                                if ($msg_count_n == 0) {
                                    $mcount = '0';
                                } else {
                                    $msg_count_data = $msg_count_rs->fetch_assoc();
                                    $mcount = $msg_count_data["msg_count"];
                                }
                                ?>
                                <button type="button" class="btn btn-danger btn-block waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#composemodal">
                                    Compose
                                </button>
                                <div class="mail-list mt-4">
                                    <a href="#" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">(<?php echo $mcount; ?>)</span></a>
                                    <a href="#"><i class="mdi mdi-star-outline me-2"></i>Starred</a>
                                    <a href="#"><i class="mdi mdi-diamond-stone me-2"></i>Important</a>
                                    <a href="#"><i class="mdi mdi-file-outline me-2"></i>Draft</a>
                                    <a href="#"><i class="mdi mdi-email-check-outline me-2"></i>Sent Mail</a>
                                    <a href="#"><i class="mdi mdi-trash-can-outline me-2"></i>Trash</a>
                                </div>

                            </div>
                            <!-- End Left sidebar -->

                            <!-- Right Sidebar -->
                            <div class="email-rightbar mb-3">

                                <div class="card">
                                    <div class="btn-toolbar p-3" role="toolbar">
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>

                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                More <i class="mdi mdi-dots-vertical ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Mark as Unread</a>
                                                <a class="dropdown-item" href="#">Mark as Important</a>
                                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                                <a class="dropdown-item" href="#">Add Star</a>
                                                <a class="dropdown-item" href="#">Mute</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <?php
                                        $message_rs = Database::search("SELECT * FROM `contact` WHERE `id`='" . $id . "'");
                                        $message_data = $message_rs->fetch_assoc();
                                        ?>
                                        <div class="d-flex mb-4">
                                            <img class="me-3 rounded-circle avatar-sm" src="img/user.png" alt="Generic placeholder image">
                                            <div class="flex-1">
                                                <h5 class="font-size-14 my-1"><?php echo $message_data["name"]; ?></h5>
                                                <small class="text-muted"><?php echo $message_data["email"]; ?></small>
                                            </div>
                                        </div>

                                        <h4 class="font-size-16">Content</h4>

                                        <p><?php echo $message_data["msg"]; ?></p>

                                        <hr />

                                        <a href="javascript: void(0);" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
                                    </div>

                                </div>
                            </div>
                            <!-- card -->

                        </div>
                        <!-- end Col-9 -->

                    </div>
                </div>

                <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="To" value="<?php echo $message_data["email"]; ?> " disabled>
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="mb-3">
                                        <form method="post">
                                            <textarea id="elm1" name="area"></textarea>
                                        </form>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send <i class="fab fa-bs-telegram-plane ms-1"></i></button>
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
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/metismenu/metisMenu.min.js"></script>
        <script src="lib/simplebar/simplebar.min.js"></script>
        <script src="lib/node-waves/waves.min.js"></script>
        <script src="lib/tinymce/tinymce.min.js"></script>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Template Javascript -->
        <script src="adminjs/main.js"></script>
        <script src="adminjs/form-editor.init.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "auth-login.php";
    </script>
<?php
}
?>