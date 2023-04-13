<?php
$path = $_SERVER['REQUEST_URI'];
$url = str_replace("/shop/", "", $path);
?>

<nav class="navbar navbar-expand-sm navbar-light shadow-sm bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/product_list.php">Kakuzi Traders</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Kakuzi Traders</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link <?=$url=='pos.php'?'active':'' ?>" aria-current="page" href="pos.php">POS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$url=='product_list.php'?'active':'' ?>" href="product_list.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$url=='add_product.php'?'active':'' ?>" href="add_product.php">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$url=='add_user.php'?'active':'' ?>" href="add_user.php">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$url=='daily_replace.php'?'active':'' ?>" href="daily_reports.php">Reports</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>