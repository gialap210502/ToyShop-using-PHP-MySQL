<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Find">
</form>
<?php
 $host = "localhost";
 $username="root";
 $password="";
 $db= "toyshop";
 $conn = mysqli_connect($host,$username,$password,$db) or die("Can not connect database ".mysqli_connect_error());
    if(ISSET($_POST['submit'])){
        $keyword = $_POST['search'];
?>
<div>
    <h2>Results </h2>
    <?php
        $counter = 0;
        $query = mysqli_query($conn, "select a.*,b.* from products as a left join category as b on a.CAT_ID = b.CAT_ID WHERE PRO_Name LIKE'%$keyword%'") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){
            if($counter == 0 || $counter % 3 == 0)
            {
                echo "<div class='row'>";
            }
    ?>
     <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="color: black; font-family: fantasy; font-size: 25px;"><?php echo $fetch['PRO_Name']?></div>
                        <div class="panel-heading" style="color: red; font-family: fantasy; font-size: 20px;"><?php echo $fetch['CAT_Name']?></div>
                        <div class="panel-body"><img src="productImages/<?php echo $fetch['PRO_Images']?>" class="img-responsive" style="width:100%" height="300px" alt="Image"></div>
                        <div class="panel-footer" style="color: black; font-size: 20px;"><?php echo $fetch['PRO_Price']." vnd" ?></div>
                        <a name="" id="" class="btn btn-primary" href="<?php echo "?page=$productdetail&id=$fetch[PRO_ID]"; ?>" role="button">Buy</a>
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
<?php
    }
?>