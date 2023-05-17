<?php
require_once './Part/header.php'
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $AirCraftID  = $_POST['AirCraftID'];
    $Type = $_POST['Type'];
    $EconomySeats = $_POST['EconomySeats'];
    $BusinessSeats = $_POST['BusinessSeats'];
    $FirstSeats = $_POST['FirstSeats'];
    $FirstFilght = $_POST['FirstFilght'];
    $statment = $pdo-> prepare("INSERT INTO aircraft (AirCraftID, Type, EconomySeats, BusinessSeats, FirstSeats, FirstFilght)
            VALUES(:AirCraftID, :Type, :EconomySeats, :BusinessSeats, :FirstSeats, :FirstFilght)");
    $statment -> bindValue(':AirCraftID', $AirCraftID );
    $statment -> bindValue(':Type', $Type);
    $statment -> bindValue(':EconomySeats', $EconomySeats);
    $statment -> bindValue(':BusinessSeats', $BusinessSeats);
    $statment -> bindValue(':FirstSeats', $FirstSeats);
    $statment -> bindValue(':FirstFilght', $FirstFilght);
    $statment -> execute();
      header('Location: Aircraft.php');
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
                <h3 class="rounded-top ps-1 pb-1">Add AircraftForm</h3>
            </div>

            <form method="POST" id="myForm">
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">AirCraft ID</label>
                    </div>
                    <div class="col">
                        <input type="int"name="AirCraftID" class="form-control" style="margin-bottom: 10px;">
                    </div>
                    <div class="col">
                        <span class="form-text">Should be 5 Digets</span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Type</label>
                    </div>
                    <div class="col">
                        <input type="text" name="Type"class="form-control" style="margin-bottom: 10px;" >
                    </div>
                    <div class="col">
                        <span class="form-text">
                            Aircraft Name
                        </span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">First Filght</label>
                    </div>
                    <div class="col">
                        <input type="date" name="FirstFilght" class="form-control" style="margin-bottom: 10px;">
                    </div>
                    <div class="col"><span class="form-text">Take Off Date Only</span>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-2">
                        <label class="col-form-label">Economy Seats</label>
                        <div class="col">
                            <input type="number" name="EconomySeats" class="form-control" style="margin-bottom: 10px;">
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-form-label">Business Seats</label>
                        <div class="col">
                            <input type="number" name="BusinessSeats"  class="form-control" style="margin-bottom: 10px;">
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="col-form-label">First Class Seats</label>
                        <div class="col">
                            <input type="number" name="FirstSeats"  class="form-control" style="margin-bottom: 10px;">
                        </div>
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