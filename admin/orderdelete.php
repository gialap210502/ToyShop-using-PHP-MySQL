<?php
    $sql = "Delete from orders where OR_ID =".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    header("Location: $urladmin?page=$order");
?>