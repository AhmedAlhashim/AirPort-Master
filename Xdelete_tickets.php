<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$TicketID = $_POST['TicketID'] ?? null;

if (!$TicketID){
    header('Location: Tickets.php');
    exit;
}

$statement = $pdo->prepare('UPDATE tickets SET Deleted = 1 WHERE TicketID =:TicketID');
$statement->bindValue(':TicketID', $TicketID);
$statement->execute();
header('Location: Tickets.php');
?>
