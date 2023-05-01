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
            $sql = "select * from category where CAT_ID ='$id' or CAT_Name='$name'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==0){
            $sql = "insert into category (CAT_ID, CAT_Name) values ('$id', '$name')";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$category");
            }else{
            $err .= "<li>Duplicated</li>";
            }
        }
    }
?>

<h3>Add new category</h3>
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