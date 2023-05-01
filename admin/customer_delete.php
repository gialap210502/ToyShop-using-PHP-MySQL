<?php
    $sql = "Delete from customer where CUS_ID =".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    header("Location: $urladmin?page=$customer");
?>