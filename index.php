<?php
    $urladmin ="http://localhost/toyshop/admin/";
    $urluser = "http://localhost/toyshop/";
    $about = "about.php";
    $home = "home.php";
    $productsale = "productsale.php";
    $popularitems = "popularitems.php";
    $newarrivals = "newarrivals.php";
    $footer = "Your website 2021";
    $login = "login.php";
    $logout = "logout.php";
    $register = "register.php";
    $product = "product.php";
    $productdetail = "productdetail.php";
    $cart = "shoppingcart.php";
    $customer = "customer.php";
    $customerEdit = "customer_edit.php";
    $find = "find.php";
     //Connection
     $host = "localhost";
     $username="root";
     $password="";
     $db= "toyshop";
     $conn = mysqli_connect($host,$username,$password,$db) or die("Can not connect database ".mysqli_connect_error());
    include("./theme.php");


?>
