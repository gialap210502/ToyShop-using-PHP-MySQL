<?php
    if(isset($_POST["btnSubmit"])) {
        $Pro_ID = $_POST['PRO_ID'];
        $CAT_ID = $_POST['categorylist'];
        $Pro_Name = $_POST['PRO_Name'];
        $Pro_Images = $_FILES['PRO_Images'];        
        $Pro_Description = $_POST['PRO_Description'];
        $Pro_Price = $_POST['PRO_Price'];

        echo $Pro_Images['name'];

        if($Pro_Images['name']!=""){
            copy($Pro_Images['tmp_name'],"../itemImages/".$Pro_Images['name']);
            $filepic = $Pro_Images['name'];
            $sql = "update products set PRO_Name='$Pro_Name', PRO_Images='$filepic',
             PRO_Description='$Pro_Description', PRO_Price='$Pro_Price' where PRO_ID ='$Pro_ID'";
            mysqli_query($conn,$sql);
            echo "<script>alert('Update Success!!!')
            window.location.href='$urladmin?page=$product';
            </script>";
        }else{
            $sql = "update products set PRO_Name='$Pro_Name', PRO_Images='$filepic',
            PRO_Description='$Pro_Description', PRO_Price='$Pro_Price' where PRO_ID ='$Pro_ID'";
            mysqli_query($conn,$sql);
            echo "<script>alert('Update Success!!!');
            window.location.href='$urladmin?page=$product';
            </script>";
        }
    }else{
        //fill data
        if(isset($_GET["id"])){
            
            $sql = "select * from products where PRO_ID ='".$_GET['id']."'";
            
            $results = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($results)){
                $Pro_ID = $row['PRO_ID'];
                $CAT_ID = $row['CAT_ID'];
                $Pro_Name = $row['PRO_Name'];
                $Pro_Images = $row['PRO_Images'];        
                $Pro_Description = $row['PRO_Description'];
                $Pro_Price = $row['PRO_Price'];
            }
        }
    }

?>

<h4><small>Update Product</small></h4>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Category</label>

            <select class="form-control" name="categorylist" id="">
                <?php 
                    $sql = "select * from category";
                    $results = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($results)){
                        if($row['CAT_ID' == $CAT_ID]){
                ?>
                    <option value="<?php echo $row['CAT_ID'] ?>"><?php echo $row['CAT_Name'] ?></option>
                <?php
                    }else{
                ?>
                    <option value="<?php echo $row['CAT_ID'] ?>"><?php echo $row['CAT_Name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">ID</label>
            <input type="text" name="PRO_ID" id="" class="form-control" placeholder="" value="<?php echo $Pro_ID ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Name</label>
            <input type="text" name="PRO_Name" id="" class="form-control" placeholder="" value="<?php echo $Pro_Name ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Description</label>
            <input type="text" name="PRO_Description" id="" class="form-control" placeholder="" value="<?php echo $Pro_Description ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Price</label>
            <input type="text" name="PRO_Price" id="" class="form-control" placeholder="" value="<?php echo $Pro_Price ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Image</label>
            <input type="file" name="PRO_Images" id="" class="form-control-file" placeholder="" value="<?php echo $Pro_Images ?>" ari-describedby="fileHelpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <input type="submit" name="btnSubmit" id="" class="btn btn-success" value="Submit">
        </div>
    </div>
</form>