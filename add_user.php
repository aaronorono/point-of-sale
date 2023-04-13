<?php
if (isset($_REQUEST['name'])) {
  extract($_REQUEST);
  require 'connect.php';
  $hashed = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO `users`( `name`, `email`, `password`, `role`) 
                       VALUES ('$name','$email','$password','$role')";

  mysqli_query($con, $sql) or die(mysqli_error($con));


  setcookie("message", $name, time() + 5);
  header("location:add_user.php");
}
?>



<!doctype html>
<html lang="en">

<head>
  <title>Add User</title>
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
        <?php if (isset($_COOKIE['message'])) : ?>
          <div class="alert my-3 alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success!</strong>User <?=$_COOKIE['message']?> has been saved.
          </div>
        <?php endif; ?>

        <form action="add_user.php" method="post" class="shadow px-2 py-5">
          <h3 class="text-center">Add User</h3>
          <div class="mb-3">
            <label for="name" class="form-label">Names</label>
            <input type="name" class="form-control rounded-0" name="name" id="name" aria-describedby="helpId" placeholder="Names">

          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="normal" id="normal" value="normal" checked>
            <label class="form-check-label" for="normal">
              Normal User
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="admin" id="admin" value="admin">
            <label class="form-check-label" for="admin">
              Admin User
            </label>
          </div>
          <div class="mb-3">

            <label for="email" class="form-label">Email</label>

            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">

          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
          <div class="btn btn-dark d-block w-100 rounded-0">Save</div>
        </form>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>