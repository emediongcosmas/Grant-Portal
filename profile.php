<?php include 'views/header2.php'; ?>

<div class="container">
    <div class="card border-0 shadow my-5 shadow-lg p-3 mb-5 bg-black rounded">
        <div class="card-body p-5">
            <div>
            <form role="form" method="POST" id="registration" action="inc/process.php">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h1 class="font-weight-light">Personal Information</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Surname:</th>
                            <td><?php echo $_POST['surname']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">First Name:</th>
                            <td><?php echo $_POST['firstName']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Middle Name:</th>
                            <td><?php echo $_POST['middleName']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nationality:</th>
                            <td><?php echo $_POST['nationality']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Marital Status:</th>
                            <td><?php echo $_POST['maritalstatus']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td><?php echo $_POST['phone']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email Address:</th>
                            <td><?php echo $_POST['email']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Gender:</th>
                            <td><?php echo $_POST['gender']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Age:</th>
                            <td><?php echo $_POST['age']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <td><?php echo $_POST['address']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">City:</th>
                            <td><?php echo $_POST['city']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">State:</th>
                            <td><?php echo $_POST['state']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h1 class="font-weight-light">Education</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Institution:</th>
                            <td><?php echo $_POST['institution']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">From:</th>
                            <td><?php echo $_POST['school_start']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">To:</th>
                            <td><?php echo $_POST['school_end']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h1 class="font-weight-light">Work Experience</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Company Name:</th>
                            <td><?php echo $_POST['company_name']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Position:</th>
                            <td><?php echo $_POST['position']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">From:</th>
                            <td><?php echo $_POST['work_start']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">To:</th>
                            <td><?php echo $_POST['work_end']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-row">
                    <div class=" col-md-12 mb-3 text-right">
                        <button class="btn btn-primary btn-lg" type="submit" id="save" name="submit" value="save">Save</button>
                    </div>
                </div>  
            </form>
            
                <!-- <form role="form" method="POST" id="registration" action="inc/process.php">
                    
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 text-right">
                            <button class="btn btn-primary btn-lg" type="submit" id="save" name="submit" value="save">Save</button>
                        </div>
                    </div>  
                </form> -->
            </div>
        </div>
    </div>
</div>

<?php include 'views/footer.php'; ?>