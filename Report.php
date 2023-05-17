<?php
require_once './Part/header.php'
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1">Reports</h3>
            </div>
            <div class="row">
                <div class="col-sm-6" style="margin-bottom: 10px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Active Flights Report</h5>
                            <p class="card-text">This report will show all current active flight.</p>
                            <p class="card-text">Which means the flights that its Date and Time are after the Date and Time of genratinig this report</p><br>
                            <a href="R_Active_flights.php" class="btn btn-outline-success">Generate Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" style="margin-bottom: 10px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Booking Percentage Per Flight</h5>
                            <p class="card-text">This report will show a Percentage of the booking in every flight on a given date below.</p>
                            <form action="R_Percentage.php" method="POST">
                                <input type="date" name="Percentage_date" class="form-control" style="margin-bottom: 10px;"/>
                                <input type="submit" class="btn btn-outline-success" value="Generate Report" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" style="margin-bottom: 10px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Payemnts Report</h5>
                            <p class="card-text">This report will show the payments that have been confirmed and completed</p><br><br>
                            <a href="R_Payemnts.php" class="btn btn-outline-success">Generate Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Waitlisted Passengers</h5>
                            <p class="card-text">This report will show the waitlisted passengers in each class given a flight number</p>
                            <form action="R_waitlist.php" method="POST">
                                <input type="number" name="FlightID" class="form-control" style="margin-bottom: 10px;" placeholder="flight number"/>
                                <input type="submit" class="btn btn-outline-success" value="Generate Report" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Average load factor</h5>
                            <p class="card-text">This report will show a r (percentage of seats occupied divided by total seats) for all planes on a given date</p>
                            <form action="R_Average.php" method="POST">
                                <input type="date" name="R_Average_date" class="form-control" style="margin-bottom: 10px;"/>
                                <input type="submit" class="btn btn-outline-success" value="Generate Report" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" style="margin-bottom: 10px;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ticket cancelled</h5>
                            <p class="card-text">This report will show all the tickets that has been cancelled</p><br><br><br>
                            <a href="R_ticket_cancelled.php" class="btn btn-outline-success">Generate Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once './Part/footer.php'
        ?>