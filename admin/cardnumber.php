<?php 
require '../inc/dbconnect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        for ($i = 0; $i <= 1000; $i++) {  
            $value = mt_rand(1000000000, 2000000000);

            try {

               //Query the database
               $fetch = $conn->prepare("SELECT card_number FROM card WHERE card_number = :card_number");
               $fetch->bindParam(':card_number', $value);
               $fetch->execute();
               $card = $fetch->fetch();

               $card = $card['card_number'];

                if($card == $value){

                    try {   
                        $fetch = $conn->prepare("SELECT * FROM registration WHERE card_number = :card_number");
                        $fetch->bindParam(':card_number', $card);
                        $fetch->execute();
                        $user = $fetch->fetch();

                            $usedcard = $user['card_number'];
                            $name = $user['firstname'].' '.$user['lastname'];

                                if($usedcard = $card){
                                    echo $usedcard.' '.'used by'.' '.$name;
                                }
        
                        }
                    catch(PDOException $e)
                        {
                            //This will output an error message
                            $error = $e->getMessage();
                        }


                    
                } else{
                    
                    try {
                            $insertQuery = "INSERT INTO card (card_number) VALUES ( :card_number)";
                            $insertNumber = $conn->prepare($insertQuery);
                            $insertNumber->bindParam(':card_number', $value);
                            $insertNumber->execute();
            
                            }
                        catch(PDOException $e)
                            {
                                //This will output an error message
                                $error = $e->getMessage();
                            }

                }

                }
            catch(PDOException $e)
                {
                    //This will output an error message
                    $error = $e->getMessage();
                }

            // 

        }

        $error = "Succesfully Generated";
    }
        

?>

<?php include 'views/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5 shadow-lg p-3 mb-5 bg-black rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center">GENERATE CARD NUMBERS</h5>

                        <div class="text-center">      
                            <!-- Start of Bootstrap alert -->
                            <!-- alert  warning message to client side -->
                            <?php if(isset($error)){ ?>
                                <div class="alert alert-<?php echo 'warning' ?> alert-dismissable fade show" role="alert">
                                    <strong><?php  echo $error;  ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <!-- alert success message to client side -->
                            <?php if(isset($success)){ ?>
                                <div class="alert alert-success alert-dismissable fade show" role="alert">
                                    <strong><?php  echo $success;  ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>
                            <!-- End of Bootstrap alert -->
                        </div>

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