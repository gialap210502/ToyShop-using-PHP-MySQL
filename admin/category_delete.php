<?php
    $sql = "delete from category where CAT_ID=".$_GET["id"];
    $result = mysqli_query($conn,$sql);
    header("Location: $urladmin?page=$category");
?>