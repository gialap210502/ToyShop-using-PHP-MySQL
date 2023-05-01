<?php 
if(isset($_POST["btnRegister"])){

    $CUS_Name = $_POST["CUS_Name"]; 
    $CUS_Username = $_POST["CUS_Username"]; 
    $CUS_Password = md5($_POST["CUS_Password"]); 
    $CUS_Email = $_POST["CUS_Email"]; 
    $CUS_Phone = $_POST["CUS_Phone"]; 
    $CUS_Address = $_POST["CUS_Address"]; 
    // random customer's id 
    $cus_id = rand(100000,999999); 
    $sql = "insert into customer (CUS_ID,CUS_Name,CUS_Username,CUS_Password,CUS_Email,CUS_Phone,CUS_Address) 
    values ('$cus_id','$CUS_Name','$CUS_Username','$CUS_Password','$CUS_Email','$CUS_Phone','$CUS_Address')"; 
    
   mysqli_query($conn,$sql); 
    echo "<script>
    alert('Register Success!!!!'); 
    window.location.href='$urluser?page=$login'; 
    </script>"; 
} 
?> 





<form action="" method="post" name="frmRegister"> 
    <div cLass="form-group"> 
        <label for="">Name</label> 
        <input type="text" name="CUS_Name" id="" class="form-control" placeholder=""- aria-describedby="helpId"> 
    </div> 
    <div cLass="form-group"> 
        <label for="">Username</label> 
        <input type="text" name="CUS_Username" id="" class="form-control" placeholder="" aria-describedby="helpId"> 
    </div> 
    <div cLass="row">
        <div cLass="form-group col-sm-6"> 
            <label for="">Password</label> 
            <input type="password" name="CUS_Password" id="" class="form-control" placeholder="" aria-describedby="helpId"> 
        </div> 
        <div cLass="form-group col-sm-5"> 
            <label for="">Re-Password</label> 
            <input type="password" name="CUS_Repassword" id="" class="form-control" placeholder="" aria-describedby="helpId"> 
        </div> 
    </div>    
    <div class="row"> 
        <div cLass="form-group col-sm-6"> 
            <label for="">Email</label> 
            <input type="text" name="CUS_Email" id="" class="form-control" placeholder="" aria-describedby="helpId"> 
        </div> 
        <div cLass="form-group col-sm-6"> 
            <label for="">Phone</label> 
            <input type="text" name="CUS_Phone" id="" class="form-control" placeholder="" aria-describedby="helpId"> 
        </div> 
    </div> 
    <div cLass="form-group"> 
        <label for="">Address</label> 
        <textarea cLass="form-control" name="CUS_Address" id="" rows="3"></textarea> 
    </div> 
    <div ctass="form-group"> 
        <hr /> 
        <button type="submit" cLass="btn btn-primary" name="btnRegister" onclick="return validateForm()">Register</button> 
    </div> 
</form>

<script>  
function validateForm(){ 
    if (document.forms["frmRegister"]["CUS_Name"].value == "") { 
        alert("Name must be filled out"); 
        document.forms["frmRegister"]["CUS_Name"].focus(); 
        return false; 
    } 
    if (document.forms["frmRegister"]["CUS_Username"].value == "") { 
        alert("Username must be filled out"); 
        document.forms["frmRegister"]["CUS_Username"].focus(); 
        return false; 
    }   
    if (document.forms["frmRegister"]["CUS_Password"].value == "") {  
        alert("Password must be filled out"); 
        document.forms["frmRegister"]["CUS_Password"].focus(); 
        return false; 
    } 
    if (document.forms["frmRegister"]["CUS_Email"].value == "") { 
        alert("Email must be filled out"); 
        document.forms["frmRegister"]["CUS_Email"].focus();
        return false; 
    } 
    if (document.forms["frmRegister"]["CUS_Phone"].value == "") { 
        alert("Phone must be filled out"); 
        document.forms["frmRegister"]["CUS_Phone"].focus(); 
        return false; 
    } 
    if (document.forms["frmRegister"]["CUS_Password"].value != document.forms["frmRegister"]["CUS_Repassword"].value) { 
        alert("password and confirm password field will not match "); 
        document.forms["frmRegister"]["CUS_Password"].focus(); 
        return false; 
    } 
} 
</script> 