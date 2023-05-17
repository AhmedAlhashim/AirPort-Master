<!-- This module is just for programmers 'no excecution' -->
<?php
require_once './Part/header.php'
?>
<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statemnt = $pdo->prepare('SELECT t.TicketID, f.TakeOff, f.Landing, t.SeatNumber, t.TicketType, f.SourceCity,f.Destination ,t.Price , t.Baggage 
FROM tickets t, flight f
WHERE t.FlightID = f.ID AND t.Deleted=1;');
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
        <h3 class="rounded-top ps-1 pb-1"style="display: inline;">All Tickets</h3>
        <a href="Report.php" type="button" style="float: right;" class="btn btn-lg btn-outline-secondary">back</a>

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
            <th scope="col">Baggage</th>
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
              <td><?php echo $ticket['Baggage'] ?></td>              
            </tr>
          <?php } ?>

        </tbody>

      </table>
    </div>
  </div>
</div>

<?php
require_once './Part/footer.php'
?>