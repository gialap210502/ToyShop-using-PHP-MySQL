<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="asset/images/favicon.ico" />
    <!-- Material+Icons-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="asset/css/styles.css" rel="stylesheet" />
    <link href="asset/css/mycss.css" rel="stylesheet" />
    <title>Toy Kingdom</title>
</head>
<body>
    <!--Navigation-->
    <?php include("./nav.php");?>
    <!--Header-->
    <?php include("./header.php");?>
    <!--Section-->
    <?php include("./section.php");?>
    <!--Footer-->
    <?php include("./footer.php");?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="asset/js/scripts.js"></script>
</body>
</html>