<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$AirCraftID = $_POST['AirCraftID'] ?? null;

if (!$AirCraftID){
    header('Location: aircraft.php');
    exit;
}
$statement = $pdo->prepare('UPDATE aircraft SET Deleted = 1 WHERE AirCraftID =:AirCraftID ');
$statement->bindValue(':AirCraftID', $AirCraftID );
$statement->execute();
$statement = $pdo->prepare('UPDATE flight SET Deleted = 1 WHERE AirCraft=:AirCraftID');
$statement->bindValue(':AirCraftID', $AirCraftID );
$statement->execute();
header('Location: aircraft.php');
?>
