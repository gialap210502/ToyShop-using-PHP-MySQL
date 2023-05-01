<h3>Orders</h3>
<hr>

<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order date</th>
            <th>Order delivery</th>
            <th>Address</th>
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT a.*,b.CUS_Name FROM orders as a LEFT join customer as b on a.CUS_ID = b.CUS_ID";
                $results = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($results)) {
            ?>
            <tr>
                <td scope="row"><?php echo $row['OR_ID'] ?></td>
                <td><?php echo $row['CUS_ID'] ?></td>
                <td><?php echo $row['OR_Date'] ?></td>
                <td><?php echo $row['OR_Delivery'] ?></td>
                <td><?php echo $row['OR_Address'] ?></td>
                <td><?php echo $row['OR_Total'] ?></td>
                <td>
                    <a href="<?php echo $urladmin.'?page='.$orderdetail.'&id='.$row['OR_ID'];?>">
                    <span class="material-icons" style="color: blue">search</span>
                    </a>
                    <a href="<?php echo $urladmin.'?page='.$orderdelete.'&id='.$row['OR_ID'];?>">
                    <span class="material-icons" style="color: red">delete</span>
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
</table>