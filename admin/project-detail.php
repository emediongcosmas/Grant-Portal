<?php 

session_start();

require '../inc/dbconnect.php';

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
    

include 'views/header.php'; 

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PROJECT DETAILS</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

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
        <!-- /.container-fluid -->

        <?php include 'views/footer.php'; }?>