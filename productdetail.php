<?php
    if(isset($_POST["btnSubmit"])){ 
        $id = $_POST['PRO_ID'];  
        $newItems = array( 
            $id => array( 
                'PRO_ID'=> $id, 
                'PRO_Name' => $_POST['PRO_Name'], 
                'PRO_Price' => $_POST['PRO_Price'], 
                'Quantity' => 1, 
                'PRO_Images' => $_POST['PRO_Images'], 
                'PRO_Total' => $_POST['PRO_Price'] 
            )
        ); 

        if(empty($_SESSION['mycart'])){   
            $_SESSION['mycart'] = $newItems; 
            echo "<script>alert('Add Success!!!!'); 
            window.location.href=$urluser?page=$product'; 
            </script>"; 
        }eLse{ 
            $array_keys = array_keys($_SESSION["mycart"]); 
            if(in_array($id,$array_keys)) { 
            echo "<script>alert('Items exits!!!!');</script>";  
            }eLse { 
            $_SESSION["mycart"] = $_SESSION["mycart"] + $newItems ; 
            echo "<script>alert('Add Success!!!!'); 
            window.location.href='$urluser?page=$product'; 
            </script>"; 
            }
        }
    }
    //load product detail
     $id = $_GET["id"];

     $sql = "select a.*,b.* from products as a left join category as b on a.CAT_ID = b.CAT_ID where PRO_ID = $id";
     $results = mysqli_query($conn,$sql);
     while ($row = mysqli_fetch_array($results)) {
?>
    <form method="post">
        <div class="row">
            <div class="col-sm-4">
                <img src="productImages/<?php echo $row['PRO_Images']; ?>" width="400px" height="300px" class="img-responsive">
            </div>
            <div class="col-sm-8">
                <h4>Product ID: <?php echo $row['PRO_ID'] ?></h4><br/>
                <span>Product Name:  <?php echo $row['PRO_Name'] ?></span><br/>
                <span>Category Name: <?php echo $row['CAT_Name'] ?></span><br/>
                <span>Product Decription:  <?php echo $row['PRO_Description'] ?></span><br/>
                <span>Product Price: <?php echo $row['PRO_Price']." VND" ?></span><br/>

                <input type="hidden" name="PRO_ID" value="<?php echo $row['PRO_ID'] ?>">
                <input type="hidden" name="PRO_Name" value="<?php echo $row['PRO_Name'] ?>">
                <input type="hidden" name="PRO_Price" value="<?php echo $row['PRO_Price'] ?>">
                <input type="hidden" name="PRO_Images" value="productImages/<?php echo $row['PRO_Images']; ?>">


                <button type="submit" class="btn btn-primary" name="btnSubmit">Add to Cart</button>
            </div>
        </div>
    </form>    
<?php
    }
?>