<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="user.php">Laptop Cart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="user-all-products.php">All Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laptops
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user-all-laptop.php">All Laptop Brands</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view-more-laptop.php?laptop_brand=Acer">Acer Laptops</a>
                        <a class="dropdown-item" href="view-more-laptop.php?laptop_brand=Asus">Asus Laptops</a>
                        <a class="dropdown-item" href="view-more-laptop.php?laptop_brand=MSI">MSI Laptops</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Keyboards
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">All Keyboard Brands</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Corsair Keyboards</a>
                        <a class="dropdown-item" href="#">Hyperx Keyboards</a>
                        <a class="dropdown-item" href="#">Logitech Keyboards</a>
                        <a class="dropdown-item" href="#">Razor Keyboards</a>
                        <a class="dropdown-item" href="#">Stealth Series Keyboards</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mice
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">All Mice</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Corsair Mice</a>
                        <a class="dropdown-item" href="#">Logitech Mice</a>
                        <a class="dropdown-item" href="#">Razor Mice</a>
                        <a class="dropdown-item" href="#">Stealth Series Mice</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mr-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user-view-profile.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <?php
                        if (isset($_SESSION['customer_id'])) {
                            echo "<a class='dropdown-item' href='user-logout.php'>Logout</a>";
                        }else{
                            echo "<a class='dropdown-item' href='user-login.php'>Login</a>";
                        }
                        ?>
                        </a>
                        <a class="dropdown-item" href="user-wishlist.php">My Wishlist</a>
                        <a class="dropdown-item" href="user-orders.php">My Orders</a>
                        <a class="dropdown-item" href="user-change-password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">My Cart <span class="badge badge-danger"><?php echo (isset($_SESSION['shopping_cart'])) ? count($_SESSION['shopping_cart']) : "0";?></span></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>