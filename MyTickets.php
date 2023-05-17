<?php
require_once './Part/header.php'
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $FlightID = $_POST['FlightID'];
  $FlightID = $_POST['FlightID'];

  $statment = $pdo->prepare("SELECT * FROM flight WHERE ID = :ID;");
  $statment->bindValue(':ID', $FlightID);
  $statment->execute();
  $flights = $statment->fetch(PDO::FETCH_ASSOC);
  $Type = $_POST['Type'];
  if ($Type === 'FC') {
    $statment = $pdo->prepare("UPDATE flight
          SET availableSeatFC = :availableSeatFC WHERE ID = :ID");
    $statment->bindValue(':availableSeatFC', $flights['availableSeatFC'] - $_POST['Seats']);
    $SeatNumber = $flights['availableSeatFC'];
    if ($flights['availableSeatFC']- $_POST['Seats'] <= 0)
      header("Location: BookTickets.php");
    else if ($flights['availableSeatFC']- $_POST['Seats'] > 3)
      $Waitlist = 0;
    else
      $Waitlist = 1;
  } else if ($Type === 'EC') {
    $statment = $pdo->prepare("UPDATE flight
          SET availableSeatEC = :availableSeatEC WHERE ID = :ID");
    $statment->bindValue(':availableSeatEC', $flights['availableSeatEC'] - $_POST['Seats']);
    $SeatNumber = $flights['availableSeatEC'];
    if ($flights['availableSeatEC']- $_POST['Seats'] <= 0)
      header("Location: BookTickets.php");
    else if ($flights['availableSeatEC']- $_POST['Seats'] > 10)
      $Waitlist = 0;
    else
      $Waitlist = 1;
  } else { //BC
    $statment = $pdo->prepare("UPDATE flight
              SET availableSeatBC = :availableSeatBC WHERE ID =:ID");
    $statment->bindValue(':availableSeatBC', $flights['availableSeatBC'] - $_POST['Seats']);
    $SeatNumber = $flights['availableSeatBC'];
    if ($flights['availableSeatBC'] - $_POST['Seats'] <= 0)
      header("Location: BookTickets.php");
    else if ($flights['availableSeatBC']- $_POST['Seats'] > 3)
      $Waitlist = 0;
    else
      $Waitlist = 1;
  }
  $statment->bindValue(':ID', $FlightID);
  $statment->execute();

  $Price = $_POST['Price'];
  $FlightID = $_POST['FlightID'];
  $statment = $pdo->prepare("INSERT INTO tickets (TicketType, SeatNumber, Price, FlightID, Waitlist, UserID, Deleted)
            VALUES(:TicketType, :SeatNumber, :Price, :FlightID, :Waitlist, :UserID , 0)");
  $statment->bindValue(':TicketType', $Type);
  $statment->bindValue(':SeatNumber', $SeatNumber);
  $statment->bindValue(':Price', $Price);
  $statment->bindValue(':FlightID', $FlightID);
  $statment->bindValue(':Waitlist', $Waitlist);
  $statment->bindValue(':UserID', $user["ID"]);
  $statment->execute();
};

$statemnt = $pdo->prepare('SELECT t.FlightID, t.paymentCONF, t.TicketID, f.TakeOff, f.Landing, t.SeatNumber, t.TicketType, f.SourceCity, f.Destination ,t.Price
  FROM tickets t, flight f
  WHERE t.FlightID = f.ID AND t.Deleted=0; AND UserID = :UserID');
$statemnt->bindValue(':UserID', $user["ID"]);
$statemnt->execute();
$tickets = $statemnt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="">
  <div class="row">
    <?php
    require_once './Part/menu.php'
    ?>
    <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
      <!-- wright the code under this -->
      <div>
        <h3 class="rounded-top ps-1 pb-1">My Tickets</h3>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Take off</th>
            <th scope="col">Duration</th>
            <th scope="col">Seat</th>
            <th scope="col">Type</th>
            <th scope="col">SourceCity</th>
            <th scope="col">Destination</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $i => $ticket) {
          ?>
            <tr>
              <th scope="row"><?php echo $i + 1 ?></th>
              <td><?php echo $ticket['TicketID'] ?></td>
              <td><?php echo $ticket['TakeOff'] ?></td>
              <td><?php
                  $assigned_time = $ticket['TakeOff'];
                  $completed_time = $ticket['Landing'];
                  $d1 = new DateTime($assigned_time);
                  $d2 = new DateTime($completed_time);
                  $interval = $d2->diff($d1);
                  echo $interval->format('%d d, %H h, %I m, %S s'); ?></td>
              <td><?php echo $ticket['SeatNumber'] ?></td>
              <td><?php echo $ticket['TicketType'] ?></td>
              <td><?php echo $ticket['SourceCity'] ?></td>
              <td><?php echo $ticket['Destination'] ?></td>
              <td><?php echo $ticket['Price'] ?></td>
              <td> <?php if ($ticket['paymentCONF'] == 0) { ?>
                  <form style="display: inline;" action="ZEditTickets.php" method="POST">
                    <input type="hidden" name="TicketID" value="<?php echo $ticket['TicketID'] ?>">
                    <input type="hidden" name="FlightID" value="<?php echo $ticket['FlightID'] ?>">
                    <button type="submit" class="btn btn-outline-success">Edit</button>
                  </form>
                <?php } ?>
                <form style="display: inline-block" method="post" action="Zdelete_tickets.php">
                  <input type="hidden" name="TicketID" value="<?php echo $ticket['TicketID'] ?>">
                  <input type="hidden" name="FlightID" value="<?php echo $ticket['FlightID'] ?>">
                  <button type="submit" class="btn btn btn-outline-danger">Delete</button>
                </form>
                <?php
                if ($ticket['paymentCONF'] == 0) {
                ?>
                  <form style="display: inline;" action="Pay.php" method="POST">
                    <input type="hidden" name="TicketID" value="<?php echo $ticket['TicketID'] ?>">
                    <button type="submit" class="btn btn-outline-warning">Pay</button>
              </td>
              </form>
            </tr>
        <?php }
              } ?>

        </tbody>

      </table>
    </div>
  </div>
</div>

<?php
require_once './Part/footer.php'
?>