<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>PHP Login/SignUp</title>
  <link rel="stylesheet" type="text/css" href="form.css"/>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP Login/SignUp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div>
      <h3>LogIn Here:</h3>
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Username</label>
          <input type="text" class="form-control" name="log_name" id="formGroupExampleInput" placeholder="Enter Your Name">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Password</label>
          <input type="password" class="form-control" name="log_pass" id="formGroupExampleInput" placeholder="Enter Your Password">
        </div>
        <button class="btn btn-primary mx-auto" type="submit">Login</button>
      </form>
    </div>
    <div>
    <h3>Register Here:</h3>
      <form action="register.php" method="POST">
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Username</label>
          <input type="text" class="form-control" name="reg_name" id="formGroupExampleInput" placeholder="Enter Your Name">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Password</label>
          <input type="password" class="form-control" name="reg_pass" id="formGroupExampleInput" placeholder="Enter Your Password">
        </div>
        <button class="btn btn-primary mx-auto" type="submit">Register</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>