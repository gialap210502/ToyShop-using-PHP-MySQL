<h3>Products</h3>
<hr>
<h4><a href="<?php echo "?page=$productAdd" ?>">Create new</a></h4>

<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $results = mysqli_query($conn, "SELECT PRO_ID,CAT_Name,PRO_Name,PRO_Images,PRO_Description,PRO_Price 
            FROM products a, category b WHERE a.CAT_ID = b.CAT_ID");
            while ($row = mysqli_fetch_array($results)){
        ?>
            <tr>
                <td><?php echo $row['PRO_ID']?> </td>
                <td><?php echo $row['CAT_Name']?></td>
                <td><?php echo $row['PRO_Name']?></td>
              
                <td><?php echo $row['PRO_Description']?></td>
                <td><?php echo $row['PRO_Price']?></td>
                <td><img src="../productImages/<?php echo $row['PRO_Images']; ?>" style="width: 50px; height: 50px"></td>
                <td>
                    <a href="<?php echo $urladmin.'?page='.$productEdit.'&id='.$row['PRO_ID'];?>">
                        <span class="material-icons">border_color</span>
                    </a>
                    <a href="<?php echo $urladmin.'?page='.$productDelete.'&id='.$row['PRO_ID'];?>" onclick="return confirm('Are you sure to delete?')">
                        <span class="material-icons" style="color: red">delete</span>
                    </a>
                </td>
            </tr>
       <?php
            }
        ?>
    </tbody>
</table>