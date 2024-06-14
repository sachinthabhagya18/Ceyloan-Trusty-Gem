        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Admin Panel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-75">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-1"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-laptop-fill"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addProduct.php" class="dropdown-item">Add Product</a>
                            <a href="manageProduct.php" class="dropdown-item">Manage Product</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-laptop-fill"></i>Customer</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="manageCustomer.php" class="dropdown-item">Manage Customer</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-1"></i>Blog</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="addBlock.php" class="dropdown-item">Create Block</a>
                            <a href="manageBlog.php" class="dropdown-item">Manage Block</a>
                        </div>
                    </div>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-mail-bulk me-1"></i>Chats</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-1"></i>Default</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->