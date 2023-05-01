<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" style="color: black; font-family: fantasy; font-size: 30px;" href="<?php echo "?page=".$home; ?>">Toy Kingdom</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo "?page=".$home; ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo "?page=".$about; ?>">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo "?page=".$product; ?>">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo "?page=".$popularitems; ?>">Popular Items</a></li>
                        <li><a class="dropdown-item" href="<?php echo "?page=".$newarrivals; ?>">New Arrivals</a></li>
                        <li><a class="dropdown-item" href="<?php echo "?page=".$productsale; ?>">SALE</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark" type="submit" href="?page=<?php echo $cart ?>"> 
                    <i ctass="bi-cart-fill me-1"></i>
                     Cart 
                     <span class="badge bg-dark text-white ms-1 rounded-pill"> 
                         <?php echo ((isset($_SESSION['mycart']) && count($_SESSION['mycart'])>0) ? count($_SESSION['mycart']) : 0 ); ?> </span> 
                </a> 
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item-dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">Welcome
                     <?php   if(isset($_SESSION['username'])!="") 
                                echo $_SESSION['username'];
                            else
                                echo "guest";
                     ?>
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                if(isset($_SESSION['username'])=="")
                                {
                            ?>
                                <li><a class="dropdown-item" href="<?php echo "?page=". $login; ?>">Login</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="<?php echo "?page=". $register; ?>">Register</a></li>
                            <?php
                                }
                                if(isset($_SESSION['username'])!="" &&  $_SESSION["role"] == "Admin")
                                {
                            ?>
                                <li><a class="dropdown-item" href="<?php echo "admin/" ?>">Admin</a></li>
                            <?php
                                }
                                if(isset($_SESSION['username'])!="")
                                {
                            ?>
                                <li><a class="dropdown-item" href="<?php echo "?page=". $customer; ?>">Account</a></li>
                                <li><a class="dropdown-item" href="<?php echo "?page=". $logout; ?>">Logout</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>