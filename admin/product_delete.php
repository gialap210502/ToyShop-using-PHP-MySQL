<?php
    $sql = "Delete from products where PRO_ID =".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    header("Location: $urladmin?page=$product");
?>