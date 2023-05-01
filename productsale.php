<h1>SALE |</h1>
<div class="container">

    <?php
        $counter = 0;
        $sql = "select a.*,b.* from products as a left join category as b on a.CAT_ID = b.CAT_ID where a.CAT_ID = 2";
        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($results)) {
   
            if($counter == 0 || $counter % 3 == 0)
            {
                echo "<div class='row'>";
            }
        ?>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="color: black; font-family: fantasy; font-size: 25px;"><?php echo $row['PRO_Name'] ?></div>
                        <div class="panel-heading" style="color: red; font-family: fantasy; font-size: 20px;"><?php echo $row['CAT_Name'] ?></div>
                        <div class="panel-body"><img src="productImages/<?php echo $row['PRO_Images']; ?>" class="img-responsive" style="width:100%" height="300px" alt="Image"></div>
                        <div class="panel-footer" style="color: black; font-size: 20px;"><?php echo $row['PRO_Price']." vnd" ?></div>
                        <a name="" id="" class="btn btn-primary" href="<?php echo "?page=$productdetail&id=$row[PRO_ID]"; ?>" role="button">Buy</a>
                    </div>
                </div>
        <?php
            $counter++;
            if($counter % 3 == 0) 
            {
                echo "</div>";
                echo "<hr/>";
            }
        }
    ?>

</div>