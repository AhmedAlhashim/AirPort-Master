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
    <form action="ZEdit.php" method="POST">
      <div class="overflow-auto container-fluid">
        <div>
          <h3 class="rounded-top ps-1 pb-1" >EDIT BOOKING</h3>
        </div>
        <div class="container-sm">
          <div class="row">
            <div class="mb-2 col">
              <div class="h-100 card">
              <!-- ... -->
                <div class="card-body">
                  <h5 class="card-title">Dates</h5>
                  <div class="mb-2">
                    <label id="flight-type-label" for="flight-type-select" class="form-label">Flight</label>
                    <select onclick="trip()" id="flight-type-select" class="form-select" aria-describedby="flight-type-label" name="Type">
                      <option value="one-way">One-way</option>
                      <option value="round-trip">Round-trip</option>
                    </select>
                  </div>
                  <div id="departure-date" class="mb-2">
                  <!-- ... -->
                    <div id="departure-date" class="mb-2">
                      <label id="departure-date-label" for="departure-date-input" class="form-label">Departure date</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi-calendar"></i></span>
                        <input type="date" class="form-control" id="departure-date-input" aria-describedby="departure-date-label" name="DepartureDate"/>
                        <input type="hidden" name="TicketID" value="<?php echo $_POST['TicketID'] ?>">
                        <input type="hidden" name="FlightID" value="<?php echo $_POST['FlightID'] ?>">
                      </div>
                    </div>
                      <!-- ... -->
                  </div>
                  <div id="return-date" class="mb-2">
                  <!-- ... -->
                    <div id="return-date" class="mb-2">
                      <label id="return-date-label" for="return-date-input" class="form-label">Return date</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi-calendar-fill"></i> </span>
                        <input type="date" class="form-control" id="return-date-input" aria-describedby="return-date-label" name="ReturnDate"/>
                      </div>
                    </div>
                    <!-- ... -->
                  </div>
                </div>
                <!-- ... -->
              </div>
            </div>
            <div class="mb-2 col">
              <div class="h-100 card">
                <div class="card-body">
                  <h5 class="card-title">
                  <!-- ... -->
                    <div class="card-body">
                      <h5 class="card-title" style="margin-top:-15px;">Details</h5>
                      <div class="mb-2">
                        <label id="travel-class-label" for="travel-class-select" class="form-label">Travel class</label>
                        <select class="form-select" id="travel-class-select" aria-describedby="travel-class-label" name="TravelClass">
                          <option value="ECONOMY">Economy</option>
                          <option value="BUSINESS">Business</option>
                          <option value="FIRST">First Class</option>
                        </select>
                      </div>
                      <label class="form-label">Passengers</label>
                      <div class="mb-2">
                      <!-- ... -->
                        <div class="mb-2">
                          <div class="input-group">
                            <label for="adults-input" class="input-group-text">Adults</label>
                            <input type="number" min="0" class="form-control" id="adults-input" aria-describedby="adults-label" name="Adults" />
                          </div>
                          <span id="adults-label" class="form-text">12 years old and older</span>
                        </div>
                        <!-- ... -->
                      </div>
                      <div class="mb-2">
                      <!-- ... -->
                        <div class="input-group">
                          <label for="children-input" class="input-group-text">Children</label>
                          <input type="number" min="0" class="form-control" id="children-input" aria-describedby="children-label" name="Children" />
                        </div>
                        <span id="children-label" class="form-text">2 to 12 years old</span>
                      </div>
                      <div class="mb-2">
                        <div class="input-group">
                          <label for="infants-input" class="input-group-text">Infants</label>
                          <input type="number" min="0" class="form-control" id="infants-input" aria-describedby="infants-label" name="Infants" />
                        </div>
                        <span id="infants-label" class="form-text">Up to 2 years old</span>
                      </div>
                    </div>
                    <!-- ... -->
                  </h5>
                </div>
              </div>
            </div>
            <!-- ... -->
            <button class="w-100 btn btn-lg" style="background-color:rgb(11, 140, 67); color:white;" type="submit">Edit</button>
          </div>
        </div>
      </div>
    </form>
    <!-- wright the code above this -->
  </div>
</div>
</div>

<?php
  require_once './Part/footer.php'
?>

<script>
   document.getElementById("return-date").style.display = "none";
  function trip() {
    var Trip = document.getElementById("flight-type-select").value;
    if (Trip === "round-trip") {
    document.getElementById("return-date").style.display = "inline";
  } else {
    document.getElementById("return-date").style.display = "none";
  }
}
</script>