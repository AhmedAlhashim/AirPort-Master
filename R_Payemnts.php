<!-- This module is just for programmers 'no excecution' -->
<?php
require_once './Part/header.php'
?>
<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=airport', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statemnt = $pdo->prepare('SELECT ID,TicketID, paymentDeta
FROM book
WHERE paymentCONF= "1";');
$statemnt->execute();
$books = $statemnt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="">
    <div class="row">
        <?php
        require_once './Part/menu.php'
        ?>
        <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
            <!-- wright the code under this -->
            <div>
                <h3 class="rounded-top ps-1 pb-1" style="display: inline;">Payemnts</h3>
                <a href="Report.php" type="button" style="float: right;" class="btn btn-lg btn-outline-secondary">BACK</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">Payment Data</th>
                        <th scope="col">Payment Confirmation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $i => $book) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $book['ID'] ?></td>
                            <td><?php echo $book['TicketID'] ?></td>
                            <td><?php echo $book['paymentDeta'] ?></td>
                            <td>Confirmed</td>

                        <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

<?php
require_once './Part/footer.php'
?>