<?php
require_once './Part/header.php'
?>

<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'airport');
$ID = $_GET['ID'] ?? null;

if (!$ID) {
    header('Location: All_Flights.php');
    exit;
}
$statement = $pdo->prepare('SELECT * FROM flight WHERE ID=:ID');
$statement->bindValue(':ID', $ID);
$statement->execute();
$flight = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];
$ID = $flight['ID'];
$TakeOff = $flight['TakeOff'];
$Landing = $flight['Landing'];
$EconomyPrice = $flight['EconomyPrice'];
$BusinessPrice = $flight['BusinessPrice'];
$FirstPrice = $flight['FirstPrice'];
$SourceCity = $flight['SourceCity'];
$Destination = $flight['Destination'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID = $_POST['ID'];
    $TakeOff = $_POST['TakeOff'];
    $Landing = $_POST['Landing'];
    $EconomyPrice = $_POST['EconomyPrice'];
    $BusinessPrice = $_POST['BusinessPrice'];
    $FirstPrice = $_POST['FirstPrice'];
    $SourceCity = $_POST['SourceCity'];
    $Destination = $_POST['Destination'];
    $statment = $pdo->prepare("UPDATE flight SET TakeOff=:TakeOff, Landing=:Landing, EconomyPrice=:EconomyPrice, BusinessPrice=:BusinessPrice,
    FirstPrice=:FirstPrice, SourceCity=:SourceCity, Destination=:Destination WHERE ID=:ID");
    $statment->bindValue(':ID', $ID);
    $statment->bindValue(':TakeOff', $TakeOff);
    $statment->bindValue(':Landing', $Landing);
    $statment->bindValue(':EconomyPrice', $EconomyPrice);
    $statment->bindValue(':BusinessPrice', $BusinessPrice);
    $statment->bindValue(':FirstPrice', $FirstPrice);
    $statment->bindValue(':SourceCity', $SourceCity);
    $statment->bindValue(':Destination', $Destination);
    $statment->execute();
    $statment = $pdo-> prepare("UPDATE flight join aircraft a on flight.Aircraft = a.AirCraftID SET flight.availableSeatEC=a.EconomySeats, flight.availableSeatBC = a.BusinessSeats,flight.availableSeatFC=a.FirstSeats WHERE flight.ID=:ID");
    $statment->bindValue(':ID', $ID);
    $statment->execute();

    header('Location: All_Flights.php');
}
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1">Edit Flight Form</h3>

            </div>
            <br><br>
            <form action="" method="POST" id="myForm" enctype="multipart/form-data">
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label for="input" class="col-form-label" >ID</label>
                    </div>
                    <div class="col">
                        <input type="input" name="ID" class="form-control" style="margin-bottom: 10px;" disabled value="<?= $flight['ID']?>">
                    </div>
                    <div class="col">
                        <span class="form-text">You can not change Flight ID</span>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Take Off AT</label>
                    </div>
                    <div class="col">
                        <input type="datetime-local" name="TakeOff" class="form-control" style="margin-bottom: 10px;" value="<?= $TakeOff ?>">
                    </div>
                    <div class="col"><span class="form-text">Take Off Date Only</span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Landing AT</label>
                    </div>
                    <div class="col">
                        <input type="datetime-local" name="Landing" class="form-control" style="margin-bottom: 10px;"value="<?= $flight['TakeOff']?>">
                    </div>
                    <div class="col"><span class="form-text">Take Off Date Only</span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Aircraft</label>
                    </div>
                    <div class="col">
                        <input type="text" disabled class="form-control"name="Aircraft" style="margin-bottom: 10px;" value= "<?= $flight['Aircraft']?>">
                    </div>
                    <div class="col">
                        <span class="form-text">
                        You can not change Aircraft ID
                        </span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Economy Price</label>
                        <div class="col">
                            <input type="number" name="EconomyPrice" class="form-control" style="margin-bottom: 10px;" value= "<?= $flight['EconomyPrice']?>">
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-form-label">Business Price</label>
                        <div class="col">
                            <input type="number" name="BusinessPrice" class="form-control" style="margin-bottom: 10px;" value= "<?= $flight['BusinessPrice']?>" >
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-form-label">First Class Price</label>
                        <div class="col">
                            <input type="number" name="FirstPrice" class="form-control" style="margin-bottom: 10px;" value= "<?= $flight['FirstPrice']?>">
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">SourceCity</label>
                    </div>
                    <div class="col">
                        <input type="input" name="SourceCity" class="form-control" style="margin-bottom: 10px;" value= "<?= $flight['SourceCity']?>">
                    </div>
                    <div class="col">
                        <span class="form-text">
                            Fly From
                        </span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Destination</label>
                    </div>
                    <div class="col">
                        <input type="input" name="Destination" class="form-control" style="margin-bottom: 10px;"value= "<?= $flight['Destination']?>">
                    </div>
                    <div class="col">
                        <span class="form-text">
                            Fly To
                        </span>
                    </div>
                </div>
                <button class="w-100 btn btn-lg" name="submit"style="background-color:rgb(11, 140, 67); color:white; margin-top:10px" type="submit">Confirm</button>

            </form>
        </div>


    </div>

</div>
</div>
</div>

<?php
require_once './Part/footer.php'
?>