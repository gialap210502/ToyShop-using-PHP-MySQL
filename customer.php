<?php
$err = "";
    if(isset($_POST["btnSubmit"])) {
        $CUS_ID = $_POST['CUS_ID'];
        $CUS_Name = $_POST['CUS_Name'];
        $CUS_Username = $_POST['CUS_Username'];       
        $CUS_Email = $_POST['CUS_Email'];
        $CUS_Phone = $_POST['CUS_Phone'];
        $CUS_Address = $_POST['CUS_Address'];
        if($CUS_ID==""){
            $err .= "<li> Enter customer ID</li>";
        }
        if($CUS_Name==""){
            $err .= "<li> Enter customer Name</li>";
        }
        if($CUS_Username==""){
            $err .= "<li> Enter customer Username</li>";
        }
        if($CUS_Email==""){
            $err .= "<li> Enter customer Email</li>";
        }
        if($CUS_Phone==""){
            $err .= "<li> Enter customer Phone</li>";
        }
        if($CUS_Address==""){
            $err .= "<li> Enter customer Address</li>";
        }
        if(empty($err)){
            $sql = "update customer set CUS_Name='$CUS_Name', CUS_Username='$CUS_Username', 
             CUS_Email='$CUS_Email', CUS_Phone='$CUS_Phone', 
            CUS_Address='$CUS_Address'  where CUS_ID='$CUS_ID'";
            mysqli_query($conn,$sql);
            echo "<script>alert('Update Success!!!');
            window.location.href='$urluser?page=$home';
            </script>";
        }
    }else{
        //fill data
        if(isset($_SESSION["CUS_id"])){
            $sql = "select * from customer where CUS_ID=".$_SESSION["CUS_id"];
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($result)) {
                $CUS_ID = $row['CUS_ID'];
                $CUS_Name = $row['CUS_Name'];
                $CUS_Username = $row['CUS_Username'];       
                $CUS_Email = $row['CUS_Email'];
                $CUS_Phone = $row['CUS_Phone'];
                $CUS_Address = $row['CUS_Address'];
            }
            
        }
    }

?>

<h4><small>Customer update</small></h4>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">ID</label>
            <input type="text" name="CUS_ID" id="" class="form-control" placeholder="" value="<?php echo $CUS_ID ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Name</label>
            <input type="text" name="CUS_Name" id="" class="form-control" placeholder="" value="<?php echo $CUS_Name ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Username</label>
            <input type="text" name="CUS_Username" id="" class="form-control" placeholder="" value="<?php echo $CUS_Username ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Email</label>
            <input type="text" name="CUS_Email" id="" class="form-control" placeholder="" value="<?php echo $CUS_Email ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Phone</label>
            <input type="text" name="CUS_Phone" id="" class="form-control" placeholder="" value="<?php echo $CUS_Phone ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <label for="">Address</label>
            <input type="text" name="CUS_Address" id="" class="form-control" placeholder="" value="<?php echo $CUS_Address ?>" ari-describedby="helpId">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-7">
            <input type="submit" name="btnSubmit" id="" class="btn btn-success" value="Submit">
        </div>
    </div>
</form>