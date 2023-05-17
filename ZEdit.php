<?php
  require_once './Part/header.php'
?>

<?php
echo "<br><br>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $FlightID = $_POST['FlightID'];
    $statemnt = $pdo->prepare('SELECT * FROM flight WHERE ID=:ID');
    $statemnt -> bindValue(':ID', $FlightID);
    $statemnt->execute();
    $flights = $statemnt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    var_dump ($flights);
    echo "</pre>";

    $TravelClass = $_POST['TravelClass'];
    if (!$_POST['Adults'])
        $_POST['Adults'] = 0;
    if (!$_POST['Children'])
        $_POST['Children'] =0;
    if (!$_POST['Infants'])
        $_POST['Infants'] =0;

    $Seats = $_POST['Adults'] + $_POST['Children'] + $_POST['Infants'];
    
    if($Seats > 10)
        header("Location: MyTickets.php");
    foreach($flights as $flight) {
        if ($TravelClass === "ECONOMY") {
            $Price = $flight['EconomyPrice'] * $Seats;
            $Type = 'EC';
        } else if ($TravelClass === "BUSINESS") {
            $Price = $flight['BusinessPrice'] * $Seats;
            $Type = 'BC';
        } else {
            $Price = $flight['FirstPrice'] * $Seats;
            $Type = 'FC';
        }
    }
    $TicketID = $_POST['TicketID'];
    echo $Price."<br>".$Type."<br>".$TicketID;
    $statment = $pdo->prepare("UPDATE tickets SET TicketType=:TicketType, Price=:Price WHERE TicketID=:TicketID");
    $statment -> bindValue(':TicketID', $TicketID);
    $statment -> bindValue(':TicketType', $Type);
    $statment -> bindValue(':Price', $Price);
    $statment->execute();
    header('Location: MyTickets.php');
}
?>