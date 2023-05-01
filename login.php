<?php 
if(isset($_POST["btnSubmit"])){ 
    $username = $_POST['CUS_Username']; 
    $password = $_POST['CUS_Password']; 

    $md5Password = md5($password); 
    $sql = "select * from customer where CUS_Username ='$username' and CUS_Password='$md5Password'"; 
    $result = mysqli_query($conn,$sql); 
    if(mysqli_num_rows($result)!=0){ 
        while ($row = mysqli_fetch_array($result)) {
        
            // create session 
            $_SESSION["CUS_id"] = $row["CUS_ID"];
            $_SESSION["username"] = $row["CUS_Username"]; 
            $_SESSION["name"] = $row["CUS_Name"]; 
            $_SESSION["role"] = $row["CUS_Role"]; 

            echo "<script>alert('Login Success!!!');
            window.location.href='$urluser?page=$home';
            </script>";
        }
    }
} 
?>

<h4>Login</h4> 
<p> To access your account, 
    please identify yourself by providing the information requested in the fields below, then click "Login".
</p> 

<form action="" method="post" name="frmLogin" onsubmit="return validateForm()"> 
    <div class="form-group col-6"> 
        <label for="">Username</label> 
        <input type="text" cLass="form-control" name="CUS_Username" id="" aria-describedby="helpld" placeholder=""> 
    </div> 
    <div class="form-group col-6"> 
        <label for="">Password</label> 
        <input type="password" cLass="form-control" name="CUS_Password" id="" placeholder=""> 
        <small id="errPass- cLass="text-muted">Help text</small> 
    </div> 
        <div class=“form-group col-6"> 
        <hr/> 
        <button type="submit" name="btnSubmit" class="btn btn-primary">Login</button> 
    </div> 
</form> 

<script> 
function validateForm(){ 
    if (document.forms["frmLogin"]["CUS_Username"].value == "") {
        alert("Username must be filled out"); 
        document.forms["frmLogin"]["CUS_Username"].focus(); 
        return false; 
    } 
    if (document.forms["frmLogin"]["CUS_Password"].value == "") { 
        alert("Password must be filled out"); 
        document.formsrfrmLogirli["CUS_Password"].focus(); 
        return false; 
    }
} 
</script> 

