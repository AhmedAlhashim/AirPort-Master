<div class="col-2 pt-5" style="height: 100vh; background-color: rgb(11, 140, 67)">
    <div class="card" style="margin: 5px;">
        <a href="HomePage.php" class="btn btn-block text-start rounded-top rounded-0"><h6>HomePage</h6></a>
        <a href="BookTickets.php" class="btn btn-block text-start rounded-0"><h6>Book Tickets</h6></a>
        <a href="MyTickets.php" class="btn btn-block text-start rounded-0"><h6>My Tickets</h6></a>
    </div>
    <?php
    if ($user['Type'] === 'A') {
    ?>
    <div class="card" style="margin: 5px;">
        <a href="Tickets.php" class="btn btn-block text-start rounded-0"><h6>Tickets</h6></a>
        <a href="All_Flights.php" class="btn btn-block text-start rounded-0" ><h6>Flights</h6></a>
        <a href="Aircraft.php" class="btn btn-block text-start rounded-0"><h6>Aircraft</h6></a>
        <a href="WaitList.php" class="btn btn-block text-start rounded-0 rounded-bottom"><h6>WaitList</h6></a>
        <a href="Report.php" class="btn btn-block text-start rounded-0 rounded-bottom"><h6>Report</h6></a>
    </div>
    <?php
    }
    ?>
</div>