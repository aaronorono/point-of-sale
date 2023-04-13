<?php 

?>
<!doctype html>
<html lang="en">

<head>
  <title>Log In</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-sm-6">
                <form action="login.php" method="post" class="shadow px-2 py-5">
                    <h3 class="text-center">Sign In</h3>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email"
                        class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
                     
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="btn btn-dark d-block w-100 rounded-0">Sign In</div>
                </form>

            </div>
        </div>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>