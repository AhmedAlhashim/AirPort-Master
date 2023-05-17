<?php
require_once './Part/header.php'
?>
<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SourceCity = $_POST['SourceCity'];
    $Destination = $_POST['Destination'];
    $Type = $_POST['Type'];
    $DepartureDate1 = $_POST['DepartureDate'].' 00:00:00';
    $DepartureDate2=$_POST['DepartureDate'].' 23:59:59';
    $ReturnDate = $_POST['ReturnDate'];    // not implemented yet
    $TravelClass = $_POST['TravelClass'];
    if (!$_POST['Adults'])
        $_POST['Adults'] = 0;
    if (!$_POST['Children'])
        $_POST['Children'] =0;
    if (!$_POST['Infants'])
    $_POST['Infants'] =0;

    $Seats = $_POST['Adults'] + $_POST['Children'] + $_POST['Infants'];
    if($Seats > 10)
        header("Location: BookTickets.php");
    
    $statment = $pdo-> prepare("SELECT * FROM flight 
                WHERE SourceCity = :SourceCity AND Destination = :Destination and TakeOff >= :Ddate1 and TakeOff <=:Ddate2 and Deleted=0 ");
    $statment->bindValue(':Ddate1', $DepartureDate1);
    $statment->bindValue(':Ddate2', $DepartureDate2);
    $statment->bindvalue(':SourceCity', $SourceCity);
    $statment->bindvalue(':Destination', $Destination);

    $statment -> execute();
    $flights = $statment -> fetchAll(PDO::FETCH_ASSOC);
  };  
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1" style="display: inline; margin-right: 53.2rem;">Search</h3>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</span></th>
                        <th scope="col">Take-off</span></th>
                        <th scope="col">Landing</th>
                        <th scope="col">Price</th>
                        <th scope="col">SourceCity</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Book</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($flights as $i => $flight) { ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $flight['TakeOff'] ?></td>
                            <td><?php echo $flight['Landing'] ?></td>

                            <?php
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
                            ?>
                            <td><?php echo $Price."SR" ?></td>
                            <td><?php echo $flight['SourceCity'] ?></td>
                            <td><?php echo $flight['Destination'] ?></td>
                            <form action="MyTickets.php" method="POST">
                                <input type="hidden" name="Aircraft" value="<?php echo $flight['Aircraft'] ?>">
                                <input type="hidden" name="FlightID" value="<?php echo $flight['ID'] ?>">
                                <input type="hidden" name="Type" value="<?php echo $Type ?>">
                                <input type="hidden" name="Price" value="<?php echo $Price ?>">
                                <input type="hidden" name="Seats" value="<?php echo $Seats ?>">
                                <td><button type="submit" class="btn btn-outline-info">book</button></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- write the code above this -->
    </div>
</div>
</div>

<?php
require_once './Part/footer.php'
?>