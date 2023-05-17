<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ID = $_POST['ID'] ?? null;

if (!$ID){
    header('Location: All_Flights.php');
    exit;
}

$statement = $pdo->prepare('UPDATE flight SET Deleted = 1 WHERE ID =:ID');
$statement->bindValue(':ID', $ID);
$statement->execute();
header('Location: All_Flights.php');
?>
