<!-- This module is just for programmers 'no excecution' -->
<?php
require_once './Part/header.php'
?>
<?php
$Ddate1 = $_POST['R_Average_date'] . ' 00:00:00';
$Ddate2 = $_POST['R_Average_date'] . ' 23:59:59';
$partt['x']=0;
$Total['t']=0;

//SELECT (SUM(a.EconomySeats)+SUM(a.FirstSeats)+SUM(a.BusinessSeats))t FROM aircraft a JOIN flight f ON f.Aircraft=a.AirCraftID WHERE f.TakeOff >= '2022-05-06 00:00:00' and f.TakeOff <= '2022-05-06 23:59:59';
//SELECT COUNT(t.TicketID) BOOKED FROM tickets t JOIN flight f ON f.ID=t.FlightID WHERE f.TakeOff = '2022-05-06 14:52:00' and f.TakeOff <= '2022-05-06 23:59:59';
$statemnt = $pdo->prepare('SELECT (SUM(a.EconomySeats)+SUM(a.FirstSeats)+SUM(a.BusinessSeats))t FROM aircraft a JOIN flight f ON f.Aircraft=a.AirCraftID WHERE f.TakeOff >= :Ddate1 and f.TakeOff <= :Ddate2');
$statemnt->bindValue(':Ddate1', $Ddate1);
$statemnt->bindValue(':Ddate2', $Ddate2);
$statemnt->execute();
$Totals = $statemnt->fetchAll(PDO::FETCH_ASSOC);
$statemnt = $pdo->prepare('SELECT COUNT(t.TicketID)x FROM tickets t JOIN flight f ON f.ID=t.FlightID WHERE f.TakeOff >= :Ddate1 and f.TakeOff <=:Ddate2');
$statemnt->bindValue(':Ddate1', $Ddate1);
$statemnt->bindValue(':Ddate2', $Ddate2);
$statemnt->execute();
$part = $statemnt->fetchAll(PDO::FETCH_ASSOC);
foreach ($part as $i => $partt) {
    foreach ($Totals as $i => $Total) {
        if (is_numeric($partt['x']) && is_numeric($Total['t'])) {
            $temps=$partt['x']/$Total['t'];
          } else {
            $temps=0;
            $partt['x']=0;
            $Total['t']=0;
          }
    }}
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1" style="display: inline;">Average load factor</h3>
                <a href="Report.php" type="button" style="float: right;" class="btn btn-lg btn-outline-secondary">BACK</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col">Booked Tickets</th>
                        <th scope="col">Percentage</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                    <td><?php echo  $Total['t'] ?></td>
                    <td><?php echo  $partt['x'] ?></td>
                    <td><?php echo  number_format((float)$temps, 4, '.', '')*100 ?>%</td>
                    </tr>
            


                </tbody>

            </table>
        </div>
    </div>
</div>

<?php
require_once './Part/footer.php'
?>