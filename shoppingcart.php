<?php if(isset($_SESSION["mycart"])){ 
    
    if(isset($_POST["btnRemove"])){ 
        foreach($_SESSION["mycart"] as $key => $value) { 
            if($_POST["PRO_ID"] == $key){ 
                unset($_SESSION["mycart"][$key]); 
                $status = "<div class='box' style='color:red;'> 
                Product is removed from your cart!</div>"; 
            } 
         
          if(empty($_SESSION["mycart"])){ 
                unset($_SESSION["mycart"]);    
                return; 
            } 
        }
    }
    if(isset($_POST["btnChange"])){ 
        foreach($_SESSION["mycart"] as &$value) {
            if($_POST["PRO_ID"] == $value["PRO_ID"]){
                $value['Quantity'] = $_POST['Quantity'];
                $value['PRO_Total'] = $value['Quantity'] * $value['PRO_Price'];
                echo "<div class='alert alert-warning' role='alert'>Updated</div>";
            }  
        }
    } 
    $total_price = 0;
?> 
    <table class="table table-hover table-inverse table-responsive"> 
        <thead cLass="thead-inverse"> 
        <tr> 
            <th>Item</th> 
            <th>Image</th> 
            <th>Price</th> 
            <th>Quantity</th>
            <th>ID</th>
            <th></th> 
        </tr> 
        </thead> 
        <tbody> 
            <?php 
            $counter= 0; 
            foreach ($_SESSION["mycart"] as $item){ 
            ?> 
                <tr> 
                    <td><?php echo $item['PRO_Name'] ?></td>    
                    <td><img src="<?php echo $item['PRO_Images'] ?>" cLass="img-responsive" styLe="width:50px" height="50px" aLt="Image"></td> 
                    <td><?php echo $item['PRO_Price'] ?></td> 
                    <form action="" method="post">
                        <td>
                            <div class="form-group">
                              <input type="number" name="Quantity" class="form-control" value="<?php echo $item['Quantity'] ?>">
                            </div>
                        </td>
                    <td> 
                        <input type='hidden' name='PRO_ID' value="<?php echo $item["PRO_ID"]; ?>"/>
                        <button type='submit' name="btnChange" class='btn btn-primary'>change</button>
                        <button type='submit' name="btnRemove" class='btn btn-primary'>Remove Item</button> 
                    </td>
                    </form>
                </tr> 
            <?php 
                    $total_price += ($item['Quantity'] * $item['PRO_Price']);
                }    
            ?> 
        </tbody> 
        <tfoot>         
            <tr> 
                <td colspan="2"> 
                </td> 
                <td> 
                    <?php echo $total_price; ?> 
                </td> 
            </tr> 
        </tfoot> 
    </table> 
    <a name="" id="" class="btn btn-primary" href="?page=order.php" roLe="button">Orders</a> 
    <?php 
        }eLse{ 
            echo "<h3>Your cart is empty!</h3>"; 
        } 
    ?> 

