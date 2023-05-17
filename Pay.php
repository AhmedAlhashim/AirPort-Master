<?php
require_once './Part/header.php'
?>

<?php
$TicketID = $_POST['TicketID'] ?? null;
if (!$TicketID){
    header('Location: MyTickets.php');
    exit;
}

$statement = $pdo->prepare('UPDATE tickets SET paymentCONF = 1 WHERE TicketID =:TicketID');
$statement->bindValue(':TicketID', $TicketID);
$statement->execute();

$date = date("Y/m/d");
echo "<br><br><br>".$date;
$statement = $pdo->prepare('INSERT INTO book (ID, TicketID, paymentDeta, paymentCONF)
        VALUES(:ID, :TicketID, :paymentDeta, 1)');
$statement->bindValue(':ID', $user["ID"]);
$statement->bindValue(':TicketID', $TicketID);
$statement->bindValue(':paymentDeta', $date);
$statement->execute();
header('Location: MyTickets.php');
?>