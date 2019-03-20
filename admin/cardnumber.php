<?php 

require '../inc/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    for ($i = 0; $i <= 1000; $i++) {
        $value = mt_rand(1000000000, 2000000000);

        try {

            // Query the database to check fetch all card from the CARD database
            $fetch = $conn->prepare("SELECT card_number FROM card WHERE card_number = :card_number");
            $fetch->bindParam(':card_number', $value);
            $fetch->execute();
            $card = $fetch->fetch();

            $card = $card['card_number'];

            if ($card == $value) {

                try {

                    // Query the database to check if any of the generated cards have been registered by a user
                    $fetch = $conn->prepare("SELECT * FROM registration WHERE card_number = :card_number");
                    $fetch->bindParam(':card_number', $card);
                    $fetch->execute();
                    $user = $fetch->fetch();

                    $usedcard = $user['card_number'];
                    $name = $user['firstname'] . ' ' . $user['lastname'];

                    if ($usedcard = $card) {

                        $error = $usedcard . ' ' . 'used by' . ' ' . $name;
                    } else {

                        $error = "Card already generated";
                    }
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                }
            } else {

                try {

                    // Insert the number generated into the database if it doesn not exist already in any database
                    $insertQuery = "INSERT INTO card (card_number) VALUES ( :card_number)";
                    $insertNumber = $conn->prepare($insertQuery);
                    $insertNumber->bindParam(':card_number', $value);
                    $insertNumber->execute();
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }

    $error = "Succesfully Generated";
}

// BEGINNING OF PROCESSING FOR PAGINATION
$per_page = 100;

try {

    // This will determine the number of rows in the database
    $fetch = $conn->prepare("SELECT * FROM card ORDER BY id DESC LIMIT 0, 100 ");
    $fetch->execute();
    $card = $fetch->fetchColumn();
} catch (PDOException $e) {
    $error = $e->getMessage();
}

// Determine the number of pages that will be generated
$page_number = ceil($card / $per_page);

// Determine the page number the user is currently on
if (!isset($_GET['page'])) {

    $page = 1;
} else {

    $page = $_GET['page'];
}

// Determine the starting number from the database for each page
$page_result = ($page - 1) * $per_page;

// Retrieve selected results from database and display them on the page
try {

    $fetch = $conn->prepare("SELECT * FROM card ORDER BY id DESC LIMIT" . ' ' . $page_result . ',' . $per_page);
    $fetch->execute();
    $cards = $fetch->fetchAll();
} catch (PDOException $e) {
    $error = $e->getMessage();
}


include 'views/header.php';

?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5 shadow-lg p-3 mb-5 bg-black rounded">
                <div class="card-body">

                    <h5 class="card-title text-center">GENERATE CARD NUMBERS</h5>

                    <div class="text-center">
                        <!-- Start of Bootstrap alert -->
                        <!-- alert  warning message to client side -->
                        <?php if (isset($error)) { ?>
                        <div class="alert alert-<?php echo 'warning' ?> alert-dismissable fade show" role="alert">
                            <strong><?php echo $error;  ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php 
                    } ?>

                        <!-- alert success message to client side -->
                        <?php if (isset($success)) { ?>
                        <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong><?php echo $success;  ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php 
                    } ?>
                        <!-- End of Bootstrap alert -->
                    </div>

                    <form class="form-signin" method="POST" id="signup-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="generate">
                    </form>
                    <br>

                    <!-- Beginning of table that shows the generated cards -->
                    <table class="table text-center css-serial">
                        <thead class="table-borderless">
                            <tr>
                                <th></th>
                                <th scope="col">SCRATCH CARD NUMBERS</th>
                            </tr>
                        </thead>
                        <?php foreach ($cards as $cardNum) { ?>
                        <tbody>
                            <tr>
                                <td class="counterCell"></td>
                                <td><?php echo $cardNum['card_number']; ?></td>
                            </tr>
                            <tr>
                                <?php 
                            } ?>
                        </tbody>
                    </table>
                    <!-- End of table that shows the generated cards -->

                    <!-- Beginning of pagination -->
                    <?php for ($page = 1; $page <= $page_number; $page++) {
                        echo '<a href="cardnumber.php?page=' . $page . '">' . $page . " " . '</a>';
                    } ?>
                    <!-- End of pagination -->

                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'views/footer.php'; ?> 