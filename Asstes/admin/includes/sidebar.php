<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar_brand">
        <h2>
            <span class="lab la-accusoft"></span>
            <span>
                <img src="img/logo1.png" width=150px" height="30px">
            </span>
        </h2>
    </div>
    <div class="profile">
        <div class="profile-img">
            <span>
                <img src="img/avatar.png">
            </span>
            <a href="../logout.php"><span class="las la-power-off"></span></a>
        </div>
        <div class="profile-info">
            <span><h3>Welcome!</h3></span>
            <span><h3><?php echo $admin['firstname'].' '.$admin['lastname']; ?></h3></span>
            <span><a href="../logout.php"><span class="las la-power-off"></span></a></span>
        </div>
    </div>
    <div class="sidebar_menu">
        <ul>
            <li>
                <a href="home.php" class="active2">
                    <span class="las la-home"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="sale.php">
                    <span class="las la-money-bill-wave"></span>
                    <span>Sales</span>
                </a>
            </li>
            <li>
                <a href="report.php">
                    <span class="las la-clipboard-list"></span>
                    <span>Report</span>
                </a>
            </li>
            <li>
                <a href="product.php">
                    <span class="lab la-opencart"></span>
                    <span>Products List</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <span class="las la-boxes"></span>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <span class="las la-users"></span>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <span class="las la-sign-out-alt"></span>
                    <span>logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>