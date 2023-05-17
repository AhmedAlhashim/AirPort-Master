<?php
  $pdo = require_once 'database.php';
  session_start();
  $email = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $statment = $pdo-> prepare("SELECT * FROM user WHERE Email= :email");
    $statment -> bindvalue(':email', $email);
    $statment -> execute();
    $user = $statment -> fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($_POST['password'], $user['Password'])) {
      $_SESSION['ID'] = $user['ID'];
      header('Location: HomePage.php');
    };
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Circle-icons-plane.svg/768px-Circle-icons-plane.svg.png">
  <style>
    body {
      overflow-y: hidden;
      overflow-x: hidden;
    }
  </style>
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-red py-0 " id="navbar" style="background-color: rgb(11, 140, 67)">
  <div class="container-fluid">
    <label class="navbar-brand align-items-baseline" style="color:white;" >Airport</label>
  </div>
</nav>

<div class="Container" style="padding-Top: 17%; padding-right: 25%; padding-left: 25%; padding-bottom: 12.4%;">
  <div class="card" style="padding:25px">
    <form action="" method="POST" id="myForm">
      <h1 class="h3 mb-3 fw-normal ">Login</h1>
      <div class="form-floating" >
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <div><?php echo $error ?></div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <a href="#" style="color:green; text-decoration: none; margin: 50px;">Forgot password?</a>
      </div>
      <button class="w-100 btn btn-lg" style="background-color:rgb(11, 140, 67); color:white;" type="submit">Log in</button>
      <p class="pt-3">Not a member? <a href="SignUp.php" style="color:green; text-decoration: none;">Register</a>.</p>
    </form>
  </div>
</div>
</body>
</html>