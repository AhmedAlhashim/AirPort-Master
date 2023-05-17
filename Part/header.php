<?php
  $pdo = require_once 'database.php';
  session_start();
  $statement = $pdo -> prepare('SELECT * FROM user WHERE ID = :ID');
  $statement -> bindValue(':ID',$_SESSION['ID']);
  $statement -> execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.php">
    <title>Airport</title>
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Circle-icons-plane.svg/768px-Circle-icons-plane.svg.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
      body {
        overflow-x: hidden;
      }
    </style>
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-red py-0 rounded-bottom" id="navbar" style="background-color: rgb(11, 140, 67)">
    <div class="container-fluid">
        <div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Circle-icons-plane.svg/768px-Circle-icons-plane.svg.png" alt="" style="height: 30px; width:30px;">
            <label class="navbar-brand align-items-baseline" style="color:white;" >KFUPM AIRLINES</label>
        </div>
        <div class="d-flex flex-row bd-highlight">
            <div class="btn p-2 bd-highlightl"><a href="Profile.php?user_id" style="color:white;text-decoration: none; " ><?php echo $user['Fname'];?> Profile</a></div>
            <div  class="btn p-2 bd-highlight"><a href="LogOut.php" style="color:white;text-decoration: none;" >Logout</a></div>
        </div>
    </div>
</nav>