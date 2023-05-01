<?php if(isset($_POST["btnSubmit"])){ 
    $CUS_ID = "";
    $CUS_Address= "";
    $sql = "select * from customer where CUS_Username ='".$_SESSION["username"]."'"; 
    $result = mysqli_query($conn,$sql); 
    while (
        $row = mysqli_fetch_array($result)) { 
            $CUS_ID = $row["CUS_ID"];
            $CUS_Address = $row["CUS_Address"]; 
        } 

        // add orders 
        $or_id = rand(100000,999999); 
        $or_date = date("Y-m-d H:i:s"); 
        $delivery = new DateTime($or_date); 
        $delivery->add(new DateInterval('P20D')); 
        $or_delivery = $delivery->format('Y-m-d H:i:s'); 
        $or_address = $_POST["Address"]; 
        $or_total = $_POST["total"]; 

        $sql = "insert into orders (OR_ID,OR_Date,OR_Delivery,OR_Address,OR_Total,CUS_ID)
        values ('$or_id','$or_date','$or_delivery','$or_address','$or_total','$CUS_ID')";  
        mysqli_query($conn,$sql); 
        
        // add orders detaiL 
        foreach ($_SESSION["mycart"] as $item) {
            $ord_id = rand(1,999999);   
            $PRO_ID = $item['PRO_ID']; 
            $ord_price = $item['PRO_Price']; 
            $ord_quantity = $item['Quantity']; 
            $ord_total = $ord_price * $ord_quantity;

            $sql = "insert into orderdetails (ORD_ID,OR_ID,PRO_ID,ORD_Price,ORD_Quantity,ORD_Total) 
            values ('$ord_id','$or_id','$PRO_ID','$ord_price','$ord_quantity','$ord_total')"; 
            mysqli_query($conn,$sql); 
        }
            unset($_SESSION["mycart"]); 
            echo "<script>alert('Buy Success!!!');
            window.location.href='$urluser?page=$home';
            </script>"; 
    }
    if(isset($_SESSION["mycart"])){ 
        $CUS_ID = "";
        $CUS_Address = ""; 
        $sql = "select * from customer where CUS_Username ='".$_SESSION["username"]."'"; 
        $result = mysqli_query($conn,$sql); 
        whiLe ($row = mysqli_fetch_array($result)) { 
            $CUS_ID = $row["CUS_Name"];
            $CUS_Address = $row["CUS_Address"];  
        } 
        $total_price = 0; 
        foreach ($_SESSION["mycart"] as $item){ 
            $total_price += ($item['Quantity']*$item['PRO_Price']); 
        }
?>
    <form action.— method="post">  
        <div cLass="form-group"> 
            <label for="">Customer</label> 
            <input type="text" 
                class="form-control" name="Customer" value="<?php echo $CUS_ID; ?>" ploceholder=""> 
        </div> 
        <div class="form-group"> 
            <label for="">Address</label> 
            <input type="text" 
                cLass="form-control" name="Address" value="<?php echo $CUS_Address; ?>" id="" aria-describedby="helpId" pLocehoLder=""> 
        </div> 
            <div class="form-group"> 
            <label for="">Total</label> 
            <input type="text" 
            cLass="form-control" name="total" id="" value="<?php echo $total_price; ?>" readonLy="true"> 
        </div> 
            <div class="form-group"> 
            <hr/> 
            <input name="btnSubmit" id="" class="btn btn-primary" type="submit" value="Order"> 
        </div> 
    </form>
<?php 
    } 
?> 


