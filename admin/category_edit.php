<?php
    $err="";
    $id="";
    $name="";
    if(isset($_POST["btnSubmit"])){
        $id = isset($_POST["inputID"])?$_POST["inputID"]:"";
        $name = isset($_POST["inputName"])?$_POST["inputName"]:"";
        if($id==""){
            $err .= "<li> Enter category ID</li>";
        }
        if($name==""){
            $err .= "<li> Enter category name</li>";
        }
        if(empty($err)){
            $sql = "update category set CAT_Name='$name' where CAT_ID='$id'";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$category");
        }
    }else{
        //fill data
        if(isset($_GET["id"])){
            $id="";
            $name="";
            $sql = "select * from category where CAT_ID=".$_GET["id"];
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['CAT_ID'];
                $name = $row['CAT_Name'];
            }
            
        }
    }
?>
<h3><small>Edit Category</small></h4>
<hr>
<ul style="color: red">
    <?php echo $err; ?>
</ul>
<form method="post">
<div class="form-row">
    <div class="form-group col-md-7">
      <label for="inputID">ID</label>
      <input type="text" name="inputID" id="" class="form-control" placeholder="ID" value="<?php echo "". isset($id)?$id:""; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-7">
      <label for="">Name</label>
      <input type="text" name="inputName" id="" class="form-control" placeholder="Name" value="<?php echo "". isset($name)?$name:""; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
      <input type="submit" name="btnSubmit" id="" class="btn btn-success" value="Submit" >
      <input type="button" name="btnIgnore" id="" class="btn btn-primary" value="Ignore" onclick="window.location='<?php echo '?page='.$category ?>'" >
    </div>
</div>
</form>