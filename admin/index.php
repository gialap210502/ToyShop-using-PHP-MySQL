<?php
    $urladmin ="http://localhost/toyshop/admin/";
    $urluser = "http://localhost/toyshop/";
    $home = "home.php";
    $category = "category.php";
    $categoryEdit = "category_edit.php"; 
    $categoryDelete = "category_delete.php";
    $product = "product.php";
    $productAdd = "product_add.php";
    $productEdit = "product_edit.php";
    $productDelete = "product_delete.php";
    $customer = "customer.php";
    $customerEdit ="customer_edit.php";
    $customerDelete ="customer_delete.php";
    $order ="order.php";
    $orderdelete = "orderdelete.php";
    $orderdetail = "orderdetail.php";
    $orderEdit = "order_edit.php";
    //Connection
    $host = "localhost";
    $username="root";
    $password="";
    $db= "toyshop";
    $conn = mysqli_connect($host,$username,$password,$db) or die("Can not connect database ".mysqli_connect_error());

    include('./theme.php');
?>
