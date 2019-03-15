
<?php session_start();

require 'inc/dbconnect.php';

if(isset($_SESSION["email"])){ 

    $email = $_SESSION['email'];
    
 include 'views/header2.php'; 

?>

<div class="container">
    <div class="card border-0 shadow my-5 shadow-lg p-3 mb-5 bg-black rounded">
        <div class="card-body p-5">

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

            <h1 class="font-weight-light">Application Form</h1> <br>
            <div>
                <form role="form" method="POST" id="registration" action="inc/apply.php">

                    <input type='hidden' value="<?php echo $email; ?>" id="email" name='email'>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="project_title">Project Title</label>
                            <input type="text" class="form-control" id="project_title" name="project_title" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <!-- <input type="textarea" class="form-control" name="description" id="description" cols="30" rows="4"> -->
                            <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="budget_total">Budget Total</label>
                            <input type="text" class="form-control" id="budget_total" name="budget_total" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="budget_breakdown">Budget Breakdown</label>
                            <textarea class="form-control" name="budget_breakdown" id="budget_breakdown" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-row text-right">
                        <div class="col-md-12">
                            <!-- <input type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-danger" formaction="home.php"/> -->
                            <a class="btn btn-danger" href="home.php">Cancel</a>
                            <button type="submit" name="cancel" id="cancel" value="Submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php 

    include 'views/footer.php';

} 

?>