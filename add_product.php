<?php
if(isset($_POST['name']))
{
    //extract($_REQUEST);
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $buying_price = $_POST['buying_price'];
    $selling_price = $_POST['selling_price'];
    require 'connect.php';
    $sql = "INSERT INTO `products`( `name`, `quantity`, `buying_price`, `selling_price`) 
                         VALUES ('$name','$quantity','$buying_price','$selling_price')";
    mysqli_query($con, $sql) or die(mysqli_error($con));
    setcookie('message','product saved successfully', time()+5);
    header("location:add_product.php");
    // var_dump($_COOKIE);
    // die();
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Add Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php require 'nav.php'; ?>
    <div class="container vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-sm-6">
                <?php if(isset($_COOKIE['message'])): ?>
                    <div class="alert my-3 alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Success!</strong>Product has been save. 
                    </div>
                <?php endif; ?>

                <form action="add_product.php" method="post" class="shadow px-2 py-5">
                    <h3 class="text-center">Add Product</h3>

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="product_name" class="form-control rounded-0" name="name" id="product_name" aria-describedby="helpId" placeholder="Names">

                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity in Stock</label>
                        <input type="number" min="0" class="form-control" name="quantity" id="quantity" aria-describedby="helpId" placeholder="Quantity">
                        
                    </div>
                    <div class="mb-3">
                        <label for="buying_price" class="form-label">Buying Price</label>
                        <input type="number" min="0" class="form-control" name="buying_price" id="buying_price" aria-describedby="helpId" placeholder="Buying Price">
                        
                    </div>
                    <div class="mb-3">
                        <label for="selling_price" class="form-label">Selling Price</label>
                        <input type="number" min="0" class="form-control" name="selling_price" id="selling_price" aria-describedby="helpId" placeholder="Selling Price">
                        
                    </div>


                    <div class="btn btn-dark d-block w-100 rounded-0">Save</div>
                </form>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>