<!-- This module is just for programmers 'no excecution' -->
<?php
require_once './Part/header.php'
?>
<?php
$Ddate1=$_POST['Percentage_date'].' 00:00:00';
$Ddate2=$_POST['Percentage_date'].' 23:59:59';

//$Ddate = date_create_from_format('Y-m-d H:i:s', $Ddate);


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statemnt = $pdo->prepare('SELECT f.ID Flight_ID ,COUNT(DISTINCT t.TicketID) BOOKED ,(a.EconomySeats+a.BusinessSeats+a.FirstSeats) TOTAL , COUNT(DISTINCT t.TicketID)/(a.EconomySeats+a.BusinessSeats+a.FirstSeats) as NumberOfTickets FROM tickets t JOIN flight AS f on f.ID=t.FlightID Join aircraft a on a.AirCraftID=f.Aircraft WHERE  f.TakeOff >= :Ddate1 and f.TakeOff <=:Ddate2 GROUP BY f.ID;');
$statemnt->bindValue(':Ddate1', $Ddate1);
$statemnt->bindValue(':Ddate2', $Ddate2);
$statemnt->execute();
$Pers = $statemnt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1" style="display: inline;">Pers</h3>
                <a href="Report.php" type="button" style="float: right;" class="btn btn-lg btn-outline-secondary">BACK</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Flight_ID</th>
                        <th scope="col">SEATS BOOKED</th>
                        <th scope="col">TOTAL SEATS</th>
                        <th scope="col">Percentage</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Pers as $i => $Per) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $Per['Flight_ID'] ?></td>
                            <td><?php echo $Per['BOOKED'] ?></td>
                            <td><?php echo $Per['TOTAL'] ?></td>
                            <td><?php echo $Per['NumberOfTickets']*100 ?>%</td>

                        <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

<?php
require_once './Part/footer.php'
?>