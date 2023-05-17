<?php
require_once './Part/header.php'
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID = $_POST['ID'];
    $TakeOff = $_POST['TakeOff'];
    $Landing = $_POST['Landing'];
    $Aircraft = $_POST['Aircraft'];
    $EconomyPrice = $_POST['EconomyPrice'];
    $BusinessPrice = $_POST['BusinessPrice'];
    $FirstPrice = $_POST['FirstPrice'];
    $SourceCity = $_POST['SourceCity'];
    $Destination = $_POST['Destination'];
    $statment = $pdo->prepare("INSERT INTO flight (ID, TakeOff, Landing,Aircraft, EconomyPrice, BusinessPrice, FirstPrice, SourceCity, Destination)
            VALUES(:ID, :TakeOff, :Landing,:Aircraft, :EconomyPrice, :BusinessPrice, :FirstPrice, :SourceCity, :Destination)");
    $statment -> bindValue(':ID', $ID);
    $statment -> bindValue(':TakeOff', $TakeOff);
    $statment -> bindValue(':Landing', $Landing);
    $statment -> bindValue(':Aircraft', $Aircraft);
    $statment -> bindValue(':EconomyPrice', $EconomyPrice);
    $statment -> bindValue(':BusinessPrice', $BusinessPrice);
    $statment -> bindValue(':FirstPrice', $FirstPrice);
    $statment -> bindValue(':SourceCity', $SourceCity);
    $statment -> bindValue(':Destination', $Destination);
    $statment -> execute();
    $statment = $pdo-> prepare("update flight join aircraft a on flight.Aircraft = a.AirCraftID SET flight.availableSeatEC=a.EconomySeats, flight.availableSeatBC = a.BusinessSeats,flight.availableSeatFC=a.FirstSeats");
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
                <h3 class="rounded-top ps-1 pb-1">Add/Edit Flight Form</h3>
            </div>

            <form method="POST" id="myForm">
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label for="input" class="col-form-label">ID</label>
                    </div>
                    <div class="col">
                        <input type="input" name="ID" class="form-control" style="margin-bottom: 10px;">
                    </div>
                    <div class="col">
                        <span class="form-text">Should be 5 Digets</span>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Take Off AT</label>
                    </div>
                    <div class="col">
                        <input type="datetime-local" name="TakeOff" class="form-control" style="margin-bottom: 10px;">
                    </div>
                    <div class="col"><span class="form-text">Take Off Date Only</span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Landing AT</label>
                    </div>
                    <div class="col">
                        <input type="datetime-local" name="Landing" class="form-control" style="margin-bottom: 10px;">
                    </div>
                    <div class="col"><span class="form-text">Take Off Date Only</span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Aircraft</label>
                    </div>
                    <div class="col">
                        <input type="number" name="Aircraft"class="form-control" style="margin-bottom: 10px;" >
                    </div>
                    <div class="col">
                        <span class="form-text">
                            Aircraft Name
                        </span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Economy Price</label>
                        <div class="col">
                            <input type="number" name="EconomyPrice" class="form-control" style="margin-bottom: 10px;">
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-form-label">Business Price</label>
                        <div class="col">
                            <input type="number" name="BusinessPrice"  class="form-control" style="margin-bottom: 10px;">
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-form-label">First Class Price</label>
                        <div class="col">
                            <input type="number" name="FirstPrice"  class="form-control" style="margin-bottom: 10px;">
                        </div>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">SourceCity</label>
                    </div>
                    <div class="col">
                        <input type="input" name= "SourceCity" class="form-control" style="margin-bottom: 10px;">
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
                        <input type="input" name="Destination" class="form-control" style="margin-bottom: 10px;">
                    </div>
                    <div class="col">
                        <span class="form-text">
                            Fly To
                        </span>
                    </div>
                </div>
                <button class="w-100 btn btn-lg" style="background-color:rgb(11, 140, 67); color:white; margin-top:10px" type="submit">Confirm</button>

            </form>
        </div>


        </form>
    </div>

</div>
</div>
</div>

<?php
require_once './Part/footer.php'
?>