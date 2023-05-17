<?php
require_once './Part/header.php'
?>

<?php
$statemnt = $pdo->prepare('SELECT * FROM flight WHERE Deleted=0 and TakeOff > NOW() Order by ID DESC');
$statemnt->execute();
$flights = $statemnt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1" style="display: inline; margin-right: 130vh;">Acrive Flights</h3>
                <a href="Report.php" type="button" style="float: right;" class="btn btn-lg btn-outline-secondary">back</a>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Filght ID</th>
                        <th scope="col">Take off</span></th>
                        <th scope="col">Landing</th>
                        <th scope="col">Duration</th>
                        <th scope="col">E Price</th>
                        <th scope="col">B Price</th>
                        <th scope="col">F Price</th>
                        <th scope="col">Take off city</th>
                        <th scope="col">Landing City</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($flights as $i => $flight) { ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $flight['ID'] ?></td>
                            <td><?php echo $flight['TakeOff'] ?></td>
                            <td><?php echo $flight['Landing'] ?></td>
                            <td><?php
                                $assigned_time = $flight['TakeOff'];
                                $completed_time = $flight['Landing'];
                                $d1 = new DateTime($assigned_time);
                                $d2 = new DateTime($completed_time);
                                $interval = $d2->diff($d1);
                                echo $interval->format('%d d, %H h, %I m, %S s'); ?></td>
                            <td><?php echo $flight['EconomyPrice'] ?></td>
                            <td><?php echo $flight['BusinessPrice'] ?></td>
                            <td><?php echo $flight['FirstPrice'] ?></td>
                            <td><?php echo $flight['SourceCity'] ?></td>
                            <td><?php echo $flight['Destination'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- wright the code above this -->
    </div>
</div>
</div>

<?php
require_once './Part/footer.php'
?>