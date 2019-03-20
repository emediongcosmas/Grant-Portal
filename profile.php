<?php session_start();

require 'inc/dbconnect.php';

if (isset($_SESSION["email"])) {

    $email = $_SESSION["email"];



    try {

        $selectUser = 'SELECT * FROM user_details WHERE email = :email';
        $fetchUser = $conn->prepare($selectUser);
        $fetchUser->bindValue(':email', $email);
        $fetchUser->execute();
        $user = $fetchUser->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        echo $e->getMessage();
    }

    include 'views/header2.php';

?>

<div class="container">
    <div class="card border-0 shadow my-5 shadow-lg p-3 mb-5 bg-black rounded">
        <div class="card-body p-5">
            <div>
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th>
                                <h1 class="font-weight-light">Personal Information</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $user) { ?>
                        <tr>
                            <th scope="row" width="40%">Surname:</th>
                            <td><?php echo $user['surname']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">First Name:</th>
                            <td><?php echo $user['firstname']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Middle Name:</th>
                            <td><?php echo $user['middlename']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nationality:</th>
                            <td><?php echo $user['nationality']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Marital Status:</th>
                            <td><?php echo $user['maritalstatus']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td><?php echo $user['phone']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email Address:</th>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Gender:</th>
                            <td><?php echo $user['gender']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Age:</th>
                            <td><?php echo $user['age']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <td><?php echo $user['address']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">City:</th>
                            <td><?php echo $user['city']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">State:</th>
                            <td><?php echo $user['state']; ?></td>
                        </tr>

                    </tbody>
                </table>

                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th width="40%">
                                <h1 class="font-weight-light">Education</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Institution:</th>
                            <td><?php echo $user['institution']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">From:</th>
                            <td><?php echo $user['school_start']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">To:</th>
                            <td><?php echo $user['school_end']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th width="40%">
                                <h1 class="font-weight-light">Work Experience</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Company Name:</th>
                            <td><?php echo $user['company_name']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Position:</th>
                            <td><?php echo $user['position']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">From:</th>
                            <td><?php echo $user['work_start']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">To:</th>
                            <td><?php echo $user['work_end']; ?></td>
                        </tr>
                        <?php 
                    } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php 

include 'views/footer.php';
}

?> 