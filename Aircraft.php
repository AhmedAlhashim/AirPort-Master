<!-- This module is just for programmers 'no excecution' -->
<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statemnt = $pdo->prepare('SELECT * FROM aircraft  where deleted = 0 Order by AirCraftID DESC');
$statemnt->execute();
$aircrafts = $statemnt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
require_once './Part/header.php'
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1"style="display: inline; ">Aircraft</h3>
                <a href="Add_Aircraft.php" type="button" style="float: right;" class="btn btn-lg btn-outline-success">ADD Aircraft</a>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Type</span></th>
                        <th scope="col">EconomySeats</th>
                        <th scope="col">BusinessSeats</th>
                        <th scope="col">FirstSeats</th>
                        <th scope="col">Status</th>
                        <th scope="col">FirstFilght</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aircrafts as $i => $flight) { ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $flight['AirCraftID'] ?></td>
                            <td><?php echo $flight['Type'] ?></td>
                            <td><?php echo $flight['EconomySeats'] ?></td>
                            <td><?php echo $flight['BusinessSeats'] ?></td>
                            <td><?php echo $flight['FirstSeats'] ?></td>
                            <td><?php echo $flight['Status'] ?></td>
                            <td><?php echo $flight['FirstFilght'] ?></td>
                            <td><form style="display: inline-block" method="post" action="Xdelete_aircraft.php">
                                    <input type="hidden" name="AirCraftID" value="<?php echo $flight['AirCraftID'] ?>">
                                    <button type="submit" class="btn btn btn-outline-danger">Delete</button>
                                </form></td>
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