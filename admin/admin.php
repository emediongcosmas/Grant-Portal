<?php 

session_start();

require '../inc/dbconnect.php';

if (isset($_SESSION["email"])) {

    $email = $_SESSION['email'];

    if (
        isset($_POST['search']) &&
        isset($_POST['filter']) &&
        !empty($_POST['search']) &&
        !empty($_POST['filter'])
    ) {

            $search = $_POST['search'];
            $filter = $_POST['filter'];

            if ($filter == 'city') {

                try {

                    $selectApplication = 'SELECT * FROM application INNER JOIN user_details ON application.email = user_details.email  WHERE city = :city ORDER BY id DESC';
                    $fetchApplication = $conn->prepare($selectApplication);
                    $fetchApplication->bindValue(':city', $search);
                    $fetchApplication->execute();
                    $application = $fetchApplication->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {

                    echo $e->getMessage();
                }
            } elseif ($filter == 'state') {

                try {

                    $selectApplication = 'SELECT * FROM application INNER JOIN user_details ON application.email = user_details.email  WHERE state = :state ORDER BY id DESC';
                    $fetchApplication = $conn->prepare($selectApplication);
                    $fetchApplication->bindValue(':state', $search);
                    $fetchApplication->execute();
                    $application = $fetchApplication->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {

                    echo $e->getMessage();
                }
            }
        } else {

        try {

            $selectApplication = 'SELECT * FROM application INNER JOIN user_details ON application.email = user_details.email ORDER BY id DESC';
            $fetchApplication = $conn->prepare($selectApplication);
            $fetchApplication->execute();
            $application = $fetchApplication->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    include 'views/header.php';

    ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-control" id="filter" name="filter">
                        <option value="city">City</option>
                        <option value="state">State</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">GRANT APPLICATIONS</h6>
        </div>
        <div class="card-body p-5">
            <div class="table-responsive">
                <table class="table table table-hover table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Applicant</th>
                            <th>Project Title</th>
                            <!-- <th>Description</th> -->
                            <th>Amount</th>
                            <!-- <th>Budget Total</th>
                      <th>Budget Breakdown</th> -->
                            <th>Status</th>
                            <!-- <th>Disapproved</th> -->
                        </tr>
                    </thead>
                    <?php foreach ($application as $user) { ?>
                    <tbody>
                        <tr>
                            <td width="20%">
                                <form method="POST" action="user-details.php">
                                    <input type='hidden' value="<?php echo $user["email"]; ?>" id="id" name='id'>
                                    <input type="submit" name="view" value="<?php echo $user["firstname"] . ' ' . $user["surname"]; ?>" id=" " class="btn btn-link btn-xs view_details" />
                                </form>
                            </td>

                            <td width="20%">
                                <form method="POST" action="project-detail.php">
                                    <input type='hidden' value="<?php echo $user["id"]; ?>" id="id" name='id'>
                                    <input type="submit" name="view" value="<?php echo $user["project_title"]; ?>" id=" " class="btn btn-link btn-xs view_details" />
                                </form>

                            </td>

                            <td width="10%"><?php echo $user['amount']; ?></td>

                            <td width="10%">
                                <?php if ($user["status"] == 0) { ?>

                                <form method="POST" action="inc/status-process.php">
                                    <input type='hidden' value="<?php echo $user["id"]; ?>" id="id" name='id'>
                                    <input type='hidden' value="1" id="approved" name="approved">
                                    <button type="submit" name="pending" class="btn btn-xs btn-primary">Pending...</button>
                                </form>

                                <?php 
                            } else { ?>

                                <i class="fas fa-check-circle fa-2x approved"></i>

                                <?php 
                            } ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php 
                } ?>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include 'views/footer.php';
} ?> 