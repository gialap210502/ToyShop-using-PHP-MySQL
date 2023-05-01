<h3>Order Detail</h3>
<hr>
<?php
    $id = $_GET["id"];
?>

<?php
    $sql = "SELECT a.*, b.CUS_Name FROM orders AS a LEFT JOIN customer AS b on a.CUS_ID = b.CUS_ID WHERE a.OR_ID = '$id'";
    $results = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($results)) {
?>
        Customer: <?php echo $row['CUS_Name'] ?> <br/>
        Order ID: <?php echo $row['OR_ID'] ?> <br/>
        Date: <?php echo $row['OR_Date'] ?> <br/>
        Delivery: <?php echo $row['OR_Delivery'] ?> <br/>
        Address: <?php echo $row['OR_Address'] ?> <br/>
<?php
    }
?> 
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Order ID</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT a.*, b.PRO_Name FROM orderdetailS as a left join products as b on a.PRO_ID = b.PRO_ID where a.OR_ID = '$id'";
                $results = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($results)) {
            ?>
            <tr>
                <td scope="row"><?php echo $row['OR_ID'] ?></td>
                <td><?php echo $row['PRO_Name'] ?></td>
                <td><?php echo $row['ORD_Quantity'] ?></td>
                <td><?php echo $row['ORD_Price'] ?></td>

            </tr>
            <?php
                }
            ?>
        </tbody>
</table>
