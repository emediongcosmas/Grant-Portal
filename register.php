<?php 
    session_start();

    $email = $_SESSION["email"];

    include 'inc/process.php';

?>

<?php include 'views/header2.php'; ?>

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

            <h1 class="font-weight-light">Personal Information</h1> <br>
            <div>
                <form role="form" method="POST" id="registration" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-row    ">
                        <div class="col-md-4 mb-3">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" name="surname" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" name="firstName" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="middleName">Middle name</label>
                            <input type="text" class="form-control" name="middleName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="surname">Nationality</label>
                            <input type="text" class="form-control" name="nationality" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="firstName">Marital Status</label>
                            <select class="form-control" id="maritalstatus" name="maritalstatus">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="middleName">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault04">Gender</label>
                            <select class="form-control" id="inputState" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" name="age" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault03">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault05">State</label>
                            <input type="text" class="form-control" name="state" required>
                        </div>
                    </div>

                    <br>
                    <h1 class="font-weight-light">Education</h1> <br>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault03">Institution</label>
                            <input type="text" class="form-control" id="institution" name="institution" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault05">From</label>
                            <select class="form-control" id="school_start" name="school_start">
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault05">To</label>
                            <select class="form-control" id="school_end" name="school_end">
                                <option value="Present">Present</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <h1 class="font-weight-light">Work Experience</h1> <br>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault03">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault03">Position</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault05">From</label>
                            <select class="form-control" id="work_start" name="work_start">
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault05">To</label>
                            <select class="form-control" id="work_end" name="work_end">
                                <option value="Present">Present</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                            </select> 
                        </div>
                    </div> 

                    <br>
                    <div class="form-row">
                        <div class=" col-md-12 mb-3 text-right">
                            <button class="btn btn-success btn-lg" type="submit" id="save" name="preview" value="preview" formaction="preview.php">Preview</button>
                            <button class="btn btn-primary btn-lg" type="submit" id="save" name="submit" value="save">Save</button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'views/footer.php'; ?>