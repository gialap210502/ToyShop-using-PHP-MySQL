<?php 
    if(isset($_POST["btnSubmit"])) {
        $Pro_ID = $_POST['PRO_ID'];
        $CAT_ID = $_POST['CAT_ID'];
        $Pro_Name = $_POST['PRO_Name'];
        $Pro_Images = $_FILES['PRO_Images'];        
        $Pro_Description = $_POST['PRO_Description'];
        $Pro_Price = $_POST['PRO_Price'];
        
        $sql = "select * from products where Pro_ID ='$Pro_ID' or Pro_Name='$Pro_Name'";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)==0){
            copy($Pro_Images['tmp_name'],"../productImages/".$Pro_Images['name']);
            $filepic = $Pro_Images['name'];
            $sql = "insert into products (PRO_ID, CAT_ID, PRO_Name, PRO_Images, PRO_Description, PRO_Price) values 
            ('$Pro_ID', '$CAT_ID', '$Pro_Name', '$filepic', '$Pro_Description', '$Pro_Price')";
            mysqli_query($conn, $sql);
            header("Location: $urladmin?page=$product");
        }
    }
?>

<h3>Add new product</h3>
<hr>
<form method ="post" enctype="multipart/form-data" >
<div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Category</label>
            <select class="form-control" name="CAT_ID" Id="">
            <?php
                $sql ="select * from category";
                $results = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($results)){
            ?>
                    <option value="<?php echo $row['CAT_ID'] ?>"><?php echo $row['CAT_Name']?></option>
            <?php   
            }
            ?>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class = "form-group col-md-7">
            <label for="">ID</label>
            <input type="text" name="PRO_ID" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class = "form-group col-md-7">
            <label for="">Name</label>
            <input type="text" name="PRO_Name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class = "form-group col-md-7">
            <label for="">Image</label>
            <input type="file" name="PRO_Images" id="" class="form-control-file" placeholder="" aria-describedby="fileHelpId">
        </div>
    </div>
    <div class="form-row">
        <div class = "form-group col-md-7">
            <label for="">Description</label>
            <input type="text" name="PRO_Description" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class = "form-group col-md-7">
            <label for="">Price</label>
            <input type="text" name="PRO_Price" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class = "form-group col-md-7">
            <input type="submit" name="btnSubmit" id="" class="btn btn-success" value="Submit">
        </div>
    </div>
</form>