<?php
  $pdo = require_once 'database.php';
  session_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $ID = $_POST['ID'];
    $passport = $_POST['PID'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    echo $Fname.$Lname.$ID.$passport.$email.$phone.$password;
    $statment = $pdo-> prepare("INSERT INTO user (ID, Fname, Lname, Passport, PhoneNumber, Email, Password, Type)
            VALUES(:ID, :Fname, :Lname, :Passport, :PhoneNumber, :Email, :Password, :Type)");
    $statment -> bindValue(':ID', $ID);
    $statment -> bindValue(':Fname', $Fname);
    $statment -> bindValue(':Lname', $Lname);
    $statment -> bindValue(':Passport', $passport);
    $statment -> bindValue(':PhoneNumber', $phone);
    $statment -> bindValue(':Email', $email);
    $statment -> bindValue(':Password', $hashed_password);
    $statment -> bindValue(':Type', 'P');
    $statment -> execute();
      header('Location: LogIn.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Sign Up</title>
  <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Circle-icons-plane.svg/768px-Circle-icons-plane.svg.png">
  <style>
    body {
      overflow-y: hidden;
      overflow-x: hidden;
    }
    .mr {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-red py-0 " id="navbar" style="background-color: rgb(11, 140, 67)">
    <div class="container-fluid">
      <label class="navbar-brand align-items-baseline" style="color:white;">Airport</label>
    </div>
  </nav>

<div class="Container" style="padding-Top: 4%; padding-right: 25%; padding-left: 25%; padding-bottom: 25.4%;">
  <div class="card" style="padding:25px">
    <form action="" method="POST" id="myForm">
      <h1 class="h3 mb-3 fw-normal ">Sign Up</h1>
      <div class="form-floating" >
        <input type="text" class="form-control mr" placeholder="Fname" name="Fname">
        <label for="floatingInput">First Name</label>
      </div>
      <div class="form-floating" >
        <input type="text" class="form-control mr" placeholder="Lname" name="Lname">
        <label for="floatingInput">Last Name</label>
      </div>
      <div class="form-floating" >
        <input type="text" class="form-control mr" placeholder="ID" name="ID">
        <label for="floatingInput">National ID</label>
      </div>
      <div class="form-floating" >
        <input type="text" class="form-control mr" placeholder="PID" name="PID">
        <label for="floatingInput">Passport ID</label>
      </div>
      <div class="form-floating" >
        <input type="email" class="form-control mr" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating" >
        <input type="tel" class="form-control mr" placeholder="0559080071" name="phone">
        <label for="floatingInput">Phone number</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control mr" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <div><?php echo $error ?></div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <button class="w-100 btn btn-lg" style="background-color:rgb(11, 140, 67); color:white; margin-top:5px" type="submit">Sign Up</button>
      <p class="pt-1">Already registered? <a href="LogIn.php" style="color:green; text-decoration: none;">LogIn</a>.</p>
    </form>
  </div>
</body>
</html>