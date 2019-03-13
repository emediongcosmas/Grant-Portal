<?php 
    session_start();
    $email = $_SESSION["email"];
?>

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
                            <th width="40%" scope="row">Surname:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="surname" value="<?php echo $_POST['surname']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">First Name:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="firstName" value="<?php echo $_POST['firstName'];?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Middle Name:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="middleName" value="<?php echo $_POST['middleName']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Nationality:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="nationality" value="<?php echo $_POST['nationality']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Marital Status:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="maritalstatus" value="<?php echo $_POST['maritalstatus']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <div class="form-row">
                                <td><input type="tel" class="form-control" name="phone" value="<?php echo $_POST['phone']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Email Address:</th>
                            <div class="form-row">
                                <td><input type="email" class="form-control" name="email" value="<?php echo $_POST['email']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Gender:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="gender" value="<?php echo $_POST['gender']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Age:</th>
                            <div class="form-row">
                                <td><input type="number" class="form-control" name="age" value="<?php echo $_POST['age']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="address" value="<?php echo $_POST['address']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">City:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="city" value="<?php echo $_POST['city']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">State:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="state" value="<?php echo $_POST['state']; ?>"></td>
                            </div>
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
                            <th width="40%" scope="row">Institution:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="institution" value="<?php echo $_POST['institution']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">From:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="school_start" value="<?php echo $_POST['school_start']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">To:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="school_to" value="<?php echo $_POST['school_end']; ?>"></td>
                            </div>
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
                            <th width="40%"  scope="row">Company Name:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="company_name" value="<?php echo $_POST['company_name']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">Position:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="position" value="<?php echo $_POST['position']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">From:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="work_start" value="<?php echo $_POST['work_start']; ?>"></td>
                            </div>
                        </tr>
                        <tr>
                            <th scope="row">To:</th>
                            <div class="form-row">
                                <td><input type="text" class="form-control" name="work_end" value="<?php echo $_POST['work_end']; ?>"></td>
                            </div>
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