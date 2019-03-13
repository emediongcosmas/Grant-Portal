<?php 
require 'inc/dbconnect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        for ($i = 0; $i <= 1000; $i++) {  
            $value = mt_rand(1000000000, 2000000000);

            try {
                $insertQuery = "INSERT INTO card (card_number) VALUES ( :card_number)";
                $insertNumber = $conn->prepare($insertQuery);
                $insertNumber->bindParam(':card_number', $value);
                $insertNumber->execute();

                }
            catch(PDOException $e)
                {
                    //This will output an error message
                    echo "Connection failed: " . $e->getMessage();
                }

        }
        echo "Succesfully Generated";
    }
        

?>

<?php include 'views/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5 shadow-lg p-3 mb-5 bg-black rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center">GENERATE CARD NUMBERS</h5>

                        <form class="form-signin" method="POST" id="signup-form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="generate">
                        </form>
                        <hr>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include 'views/footer.php'; ?>