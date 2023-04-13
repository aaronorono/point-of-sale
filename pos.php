<?php
require 'connect.php';
session_start();
if (isset($_GET['btn']) and $_GET['btn'] == 'add') {
  extract($_GET); //$id $name $selling_price
  if(array_key_exists($id, $_SESSION['cart'])) {
    $new_quantity = $_SESSION['cart']['$id']['quantity'] + 1; 
    $new_total = $new_quantity * $selling_price;

    $_SESSION['cart']['$id']['quantity']  = $new_quantity;
    $_SESSION['cart']['$id']['quantity']  = $new_total;

  } else {

 
  $data = [
    'id' => $id,
    'name' => $name,
    'selling_price' => $selling_price,
    'quantity' => 1,
    'total' => $selling_price * 1
  ];
  $_SESSION['cart'][$id] = $data;
}
  header("location:pos.php");
}
// var_dump($_SESSION['cart']);
// die();
if (isset($_GET['btn']) and $_GET['btn'] == 'clear')
{
  unset($_SESSION['cart']);
  header("location:pos.php");
}
if (isset($_GET['btn']) and $_GET['btn'] == 'remove')
{
  $id = $_GET['id'];
  unset($_SESSION['cart'] ['$id']);
  header("location:pos.php");
}
$values = array_values($_SESSION['cart'] ?? []);
$overall_total = array_reduce($values, function($previous, $product){
  $previous += $product('total');
  return $previous;
}, 0);
if (isset($_GET['btn']) and $_GET['btn'] == 'sell')
{
  $user_id = 1;
  $total = $overall_total;
  $payment_mode = "MPESA";
  $sql = "INSERT INTO `sales`( `user_id`, `total`, `payment_mode`) 
                       VALUES ($user_id, $total,'$payment_mode')";
  mysqli_query($con, $sql) or  die(mysqli_error($con));
  unset($_SESSION['cart']);
  header("location:pos.php");


}


$products = [
  ["id" => 1, "name" => "methylphenidate", "quantity" => 63, "buying_price" => 141.42, "selling_price" => 145],
  ["id" => 2, "name" => "EUCALYPTOL", "quantity" => 60, "buying_price" => 69.52, "selling_price" => 147],
  ["id" => 3, "name" => "Moexipril", "quantity" => 65, "buying_price" => 107.59, "selling_price" => 256],
  ["id" => 4, "name" => "Capsicum Annuum", "quantity" => 40, "buying_price" => 97.88, "selling_price" => 311],
  ["id" => 5, "name" => "Esmolol", "quantity" => 37, "buying_price" => 143.36, "selling_price" => 75],
  ["id" => 6, "name" => "SULFACETAMIDE", "quantity" => 72, "buying_price" => 194.78, "selling_price" => 88],
  ["id" => 7, "name" => "Oxygen", "quantity" => 37, "buying_price" => 171.61, "selling_price" => 320],
  ["id" => 8, "name" => "LISINOPRIL", "quantity" => 37, "buying_price" => 145.54, "selling_price" => 348],
  ["id" => 9, "name" => "Cat Pelt", "quantity" => 17, "buying_price" => 65.04, "selling_price" => 271],
  ["id" => 10, "name" => "Meclizine HCl", "quantity" => 70, "buying_price" => 147.89, "selling_price" => 60],
  ["id" => 11, "name" => "Panadol", "quantity" => 77, "buying_price" => 86.57, "selling_price" => 266],
  ["id" => 12, "name" => "Benzalkonium", "quantity" => 35, "buying_price" => 117.61, "selling_price" => 108],
  ["id" => 13, "name" => "BENZALKONIUM", "quantity" => 12, "buying_price" => 173.03, "selling_price" => 265],
  ["id" => 14, "name" => "leuprolide acetate", "quantity" => 98, "buying_price" => 121.41, "selling_price" => 154],
  ["id" => 15, "name" => "Zonisamide", "quantity" => 25, "buying_price" => 81.74, "selling_price" => 343],
  ["id" => 16, "name" => "Potassium Chloride", "quantity" => 99, "buying_price" => 156.86, "selling_price" => 125],
  ["id" => 17, "name" => "Gabapentin", "quantity" => 23, "buying_price" => 170.5, "selling_price" => 131],
  ["id" => 18, "name" => "Fluconazole", "quantity" => 20, "buying_price" => 58.99, "selling_price" => 134],
  ["id" => 19, "name" => "Clonidine Hydrochloride", "quantity" => 69, "buying_price" => 100.93, "selling_price" => 123],
  ["id" => 20, "name" => "HYDROQUINONE", "quantity" => 89, "buying_price" => 123.68, "selling_price" => 305],
  ["id" => 21, "name" => "Dimethicone", "quantity" => 74, "buying_price" => 118.63, "selling_price" => 334],
  ["id" => 22, "name" => "ETHYL ALCOHOL", "quantity" => 73, "buying_price" => 162.55, "selling_price" => 267],
  ["id" => 23, "name" => "GEMCITABINE HYDROCHLORIDE", "quantity" => 31, "buying_price" => 81.49, "selling_price" => 73],
  ["id" => 24, "name" => "Acetaminophen", "quantity" => 49, "buying_price" => 151.24, "selling_price" => 84],
  ["id" => 25, "name" => "Warfarin Sodium", "quantity" => 14, "buying_price" => 63.3, "selling_price" => 250],
  ["id" => 26, "name" => "Spstein", "quantity" => 90, "buying_price" => 112.69, "selling_price" => 188],
  ["id" => 27, "name" => "loratadine", "quantity" => 68, "buying_price" => 123.82, "selling_price" => 265],
  ["id" => 28, "name" => "Acetaminophen", "quantity" => 68, "buying_price" => 86.29, "selling_price" => 76],
  ["id" => 29, "name" => "Aconitum napellus", "quantity" => 89, "buying_price" => 111.27, "selling_price" => 236],
  ["id" => 30, "name" => "DOG EPITHELIA", "quantity" => 11, "buying_price" => 168.74, "selling_price" => 272],
  ["id" => 31, "name" => "Chicken Meat", "quantity" => 89, "buying_price" => 128.99, "selling_price" => 124],
  ["id" => 32, "name" => "Wheat Smut", "quantity" => 65, "buying_price" => 149.38, "selling_price" => 158],
  ["id" => 33, "name" => "cyclobenzaprine hydrochloride", "quantity" => 23, "buying_price" => 172.98, "selling_price" => 225],
  ["id" => 34, "name" => "BENZOCAINE", "quantity" => 89, "buying_price" => 122.8, "selling_price" => 210],
  ["id" => 35, "name" => "amlodipine", "quantity" => 17, "buying_price" => 178.89, "selling_price" => 138],
  ["id" => 36, "name" => "mineral oil", "quantity" => 15, "buying_price" => 90.79, "selling_price" => 323],
  ["id" => 37, "name" => "Guaifenesin", "quantity" => 51, "buying_price" => 93.44, "selling_price" => 171],
  ["id" => 38, "name" => "PRAVASTATIN SODIUM", "quantity" => 92, "buying_price" => 106.38, "selling_price" => 213],
  ["id" => 39, "name" => "Primidone", "quantity" => 94, "buying_price" => 157.85, "selling_price" => 324],
  ["id" => 40, "name" => "Octinoxate", "quantity" => 85, "buying_price" => 59.63, "selling_price" => 310],
  ["id" => 41, "name" => "Oil Menthol", "quantity" => 95, "buying_price" => 137.98, "selling_price" => 91],
  ["id" => 42, "name" => "Acetaminophen", "quantity" => 78, "buying_price" => 157.8, "selling_price" => 66],
  ["id" => 43, "name" => "Mineral oil", "quantity" => 14, "buying_price" => 99.83, "selling_price" => 124],
  ["id" => 44, "name" => "Metformin", "quantity" => 94, "buying_price" => 183.32, "selling_price" => 128],
  ["id" => 45, "name" => "Nicotine", "quantity" => 24, "buying_price" => 185.69, "selling_price" => 183],
  ["id" => 46, "name" => "Asacol", "quantity" => 77, "buying_price" => 187.92, "selling_price" => 112],
  ["id" => 47, "name" => "Enalapril Maleate", "quantity" => 27, "buying_price" => 163.04, "selling_price" => 320],
  ["id" => 48, "name" => "acyclovir", "quantity" => 75, "buying_price" => 130.02, "selling_price" => 299],
  ["id" => 49, "name" => "AMIODARONE", "quantity" => 22, "buying_price" => 181.75, "selling_price" => 301],
  ["id" => 50, "name" => "Zincum Aceticum", "quantity" => 28, "buying_price" => 152.0, "selling_price" => 146],
  ["id" => 51, "name" => "CAMPHOR", "quantity" => 42, "buying_price" => 68.61, "selling_price" => 102],
  ["id" => 52, "name" => "Diltiazem", "quantity" => 26, "buying_price" => 58.02, "selling_price" => 225],
  ["id" => 53, "name" => "Ibuprofen", "quantity" => 94, "buying_price" => 187.69, "selling_price" => 250],
  ["id" => 54, "name" => "Ketoconazole", "quantity" => 56, "buying_price" => 55.32, "selling_price" => 241],
  ["id" => 55, "name" => "Octinoxate", "quantity" => 96, "buying_price" => 198.25, "selling_price" => 271],
  ["id" => 56, "name" => "Nicotine", "quantity" => 70, "buying_price" => 95.68, "selling_price" => 323],
  ["id" => 57, "name" => "Quinapril", "quantity" => 56, "buying_price" => 118.12, "selling_price" => 252],
  ["id" => 58, "name" => "BENZALKONIUM", "quantity" => 89, "buying_price" => 100.41, "selling_price" => 238],
  ["id" => 59, "name" => "Promethazine", "quantity" => 56, "buying_price" => 143.74, "selling_price" => 251],
  ["id" => 60, "name" => "Spirit", "quantity" => 55, "buying_price" => 131.9, "selling_price" => 145]
];


?>

<!doctype html>
<html lang="en">

<head>
  <title>Point of Sale</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/data Tables.bootstrap5.min.css">
</head>

<body>
  <?php require 'nav.php'; ?>
  <div class="row my-5">
    <div class="col-sm-8">
      <table class="table table-striped table-hover" id="products">
        <thead>
          <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Quantity in Stock</th>
            <th>Price</th>
            <th>Add</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <td> <?= $product['id'] ?> </td>
              <td><?= $product['name'] ?> </td>
              <td><?= $product['quantity'] ?> </td>
              <td><?= $product['selling_price'] ?> </td>
              <td><a class="btn btn-outline-success btn-sm" href="pos.php?btn=add=<?= $product['id'] ?>&name=<?= $product['name'] ?>&selling_price=<?= $product['selling_price'] ?>">+</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </div>
    </table>

  </div>
  <div class="col-sm-4 vh-100 d-flex flex-column justify-content-between">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th></th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($_SESSION['cart'])):?>
        <?php foreach ($_SESSION['cart'] as $key => $value) : ?>

          <tr>
            <td><a class="text-decoration-none text-danger" href="pos.php?btn=remove&id=<?= $value['name'] ?>">X</a></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['quantity'] ?></td>
            <td><?= $value['selling_price'] ?></td>
            <td><?= $value['total'] ?></a></td>
          </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
  </div>
  </table>
  <div>
    <div class="row text-bg-secondary h5">
      <div class="col-6 text-end"> Total </div>
      <div class="col-6 text-end"> <?=$overall_total ?? 0 ?> </div>

    </div>
    <div class="row mb-4 mt-2">
      <div class="col-5"><a href="pos.php?btn=clear" class="btn btn-danger my-3 d-block w-100">Clear</a></div>
      <div class="col-5"><a href="pos.php?btn=sell" class="btn btn-success my-3 d-block w-100">Sell</a></div>
    </div>
  </div>

  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/data Tables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#products').DataTable();
    });
  </script>
</body>

</html>