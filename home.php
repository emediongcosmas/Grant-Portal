
<?php
    //BEGINS THE SESSION ON THE PAGE
    session_start();

    $email = $_SESSION['email'];

    require 'inc/dbconnect.php';

        try {

            $selectApplication = 'SELECT * FROM application WHERE email = :email ORDER BY id DESC';
            $fetchApplication = $conn->prepare($selectApplication);
            $fetchApplication->bindValue(':email', $email);
            $fetchApplication->execute();
            $application = $fetchApplication->fetchAll(PDO::FETCH_ASSOC);
        
            }

        catch(PDOException $e)
            {

                $error = $e->getMessage();

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
                <a class="btn btn-success btn-lg" href="application.php">APPLY</a>
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
                        <tr>
                            <th width="50%">Projects</th> 
                            <th width="30%"></th>
                            <th width="20%"></th>
                        </tr>

                        <?php
                            foreach($application as $row) {
                        ?>

                        <tr>
                            
                            <td>
                                <?php echo $row["project_title"]; ?>
                            </td>
                            <td>
                                <?php echo date('M d, Y h:ia', strtotime($row['timestamp'])); ?>
                            </td>
                            <td>
                                <input type="button" name="view" value="View Details" id="" class="btn btn-link btn-xs view_details" />
                            </td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>  

        </div>
    </div>

    <div class="modal fade" id="applyModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Grant Application</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="application" method="POST" action="">
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
                            <textarea form="#application" class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="budget_total">Budget Total</label>
                            <input type="text" class="form-control" id="budget_total" name="budget_total" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="budget_breakdown">Budget Breakdown</label>
                            <textarea form="#application" class="form-control" name="budget_breakdown" id="budget_breakdown" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                   
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="form-row">
                    <div class="col-md-12 text-right">
                        <input type="submit" name="insert" id="insert" value="SUBMIT" class="btn btn-success" />
                    </div>
                </div>
            </div>
            </form>

            </div>
        </div>
    </div>


</div>

<?php include 'views/footer.php'; ?>