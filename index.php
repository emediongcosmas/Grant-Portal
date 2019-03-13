<?php

    include 'inc/process-register.php';

    // userRegistration();

?>

<?php include 'views/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5 shadow-lg p-3 mb-5 bg-black rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>

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
                            <div class="form-label-group">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="form-label-group">
                                <input type="number" name="cardNumber" class="form-control" placeholder="Scratch Card Number" required>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">SIGN UP</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <p class="small">Already have an account? <span><a href="login.php">Login</a></span> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include 'views/footer.php'; ?>