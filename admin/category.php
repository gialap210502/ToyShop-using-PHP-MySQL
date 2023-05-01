<h3><small>Category</small></h4>
<hr>
<h3><a href="?page=category_add.php">Create New</a></h3>
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "select * from category";//change
            $results = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($results)){
        ?>   
            <tr>
                <td scope="row"><?php echo $row['CAT_ID']?></td>
                <td><?php echo $row['CAT_Name']?></td>
                <td>
                    <a href="<?php echo $urladmin.'?page='.$categoryEdit.'&id='.$row['CAT_ID'];?>">
                        <span class="material-icons">border_color</span>
                    </a>
                    <a href="<?php echo $urladmin.'?page='.$categoryDelete.'&id='.$row['CAT_ID'];?>" onclick="return confirm('Are you sure to delete?')">
                    <span class="material-icons" style="color: red">delete</span>
                    </a>
                <td>
            <tr>
        <?php     
            }
        ?>
        </tbody>
</table>