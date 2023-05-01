<h3>Customer</h3>
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $results = mysqli_query($conn, "SELECT * FROM customer");
            while ($row = mysqli_fetch_array($results)){
        ?>
            <tr>
                <td><?php echo $row['CUS_ID']?> </td>
                <td><?php echo $row['CUS_Name']?></td>
                <td><?php echo $row['CUS_Username']?></td>
                <td><?php echo $row['CUS_Email']?></td>
                <td><?php echo $row['CUS_Phone']?></td>
                <td><?php echo $row['CUS_Address']?></td>
                <td><?php echo $row['CUS_Role']?></td>
                <td>
                    <a href="<?php echo $urladmin.'?page='.$customerEdit.'&id='.$row['CUS_ID'];?>">
                        <span class="material-icons">border_color</span>
                    </a>
                    <a href="<?php echo $urladmin.'?page='.$customerDelete.'&id='.$row['CUS_ID'];?>" onclick="return confirm('Are you sure to delete?')">
                        <span class="material-icons" style="color: red">delete</span>
                    </a>
                </td>
            </tr>
       <?php
            }
        ?>
    </tbody>
</table>