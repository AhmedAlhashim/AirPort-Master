<!-- This module is just for programmers 'no excecution' -->
<?php
require_once './Part/header.php'
?>
<?php
$FlightID=$_POST["FlightID"];

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statemnt = $pdo->prepare('SELECT user.Fname , user.Lname,tickets.TicketType FROM `tickets` INNER JOIN `user` ON user.ID = tickets.UserID WHERE tickets.Waitlist="1" AND tickets.FlightID =:FlightID');
$statemnt->bindValue(':FlightID', $FlightID);
$statemnt->execute();
$Waitlisteds = $statemnt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1" style="display: inline;">WaitList</h3>
                <a href="Report.php" type="button" style="float: right;" class="btn btn-lg btn-outline-secondary">BACK</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Class Type Of the Ticket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Waitlisteds as $i => $Waitlisted) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $Waitlisted['Fname'] ?></td>
                            <td><?php echo $Waitlisted['Lname'] ?></td>
                            <td><?php echo $Waitlisted['TicketType'] ?></td>
                        <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

<?php
require_once './Part/footer.php'
?>