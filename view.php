
<?php session_start();

require 'inc/dbconnect.php';

if(isset($_SESSION["email"])){ 

    $email = $_SESSION['email'];

        if(isset($_REQUEST["id"])){

            try {

                $id = $_REQUEST["id"];
    
                $selectApplication = 'SELECT * FROM application WHERE id = :id';
                $fetchApplication = $conn->prepare($selectApplication);
                $fetchApplication->bindValue(':id', $id);
                $fetchApplication->execute();
                $application = $fetchApplication->fetch();
            
                }
    
            catch(PDOException $e)
                {
    
                    $error = $e->getMessage();
    
                }

        }
    
    // include 'inc/apply.php';

    include 'views/header2.php'; 
   
?>

<div class="container">
    <div class="card border-0 shadow my-5 shadow-lg p-3 mb-5 bg-black rounded">
        <div class="card-body p-5">

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <h1 class="font-weight-light">Grant Application</h1>
                </div>
                <div class="col-md-6 mb-3 text-right">
                <!-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#applyModal">
                    APPLY
                </button> -->
                <a class="btn btn-primary" href="home.php"><i class="fas fa-chevron-circle-left"></i> Back</a>
                </div>
            </div> 
            <br />  

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


            <div class="table-responsive">
                <div id="application_table">
                    <table class="table table-hover">
                            <!-- <tr>
                                <th width="20%">Projects</th> 
                                <th width="20%">Description</th>
                                <th width="20%">Amount</th>
                                <th width="20%">Budget Total</th>
                                <th width="20%">Budget Breakdown</th>
                            </tr> -->

                        <tr>
                            <th width="30%">
                                Project Title
                            </th>
                            <td>
                                <?php echo $application['project_title'] ; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Description
                            </th>
                            <td>
                            <?php echo $application['description'] ; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Amount
                            </th>
                            <td>
                            <?php echo $application['amount'] ; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Budget Total
                            </th>
                            <td>
                            <?php echo $application['budget_total'] ; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Budget Breakdown
                            </th>
                            <td>
                                <?php echo $application['budget_breakdown'] ; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>  

        </div>
    </div>


</div>

<?php 

    include 'views/footer.php';

} 

?>