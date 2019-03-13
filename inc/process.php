<?php
    require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( isset($_POST['surname']) &&
        isset($_POST['firstName']) &&
        isset($_POST['middleName']) &&
        isset($_POST['nationality']) &&
        isset($_POST['maritalstatus']) &&
        isset($_POST['phone']) &&
        isset($_POST['email']) &&
        isset($_POST['gender']) &&
        isset($_POST['age']) &&
        isset($_POST['address']) &&
        isset($_POST['city']) &&
        isset($_POST['state']) &&
        isset($_POST['institution']) &&
        isset($_POST['school_start']) &&
        isset($_POST['school_end']) &&
        isset($_POST['company_name']) &&
        isset($_POST['position']) &&
        isset($_POST['work_start']) &&
        isset($_POST['work_end']) &&
        !empty($_POST['surname']) &&
        !empty($_POST['firstName']) &&
        !empty($_POST['middleName']) &&
        !empty($_POST['nationality']) &&
        !empty($_POST['maritalstatus']) &&
        !empty($_POST['phone']) &&
        !empty($_POST['email']) &&
        !empty($_POST['gender']) &&
        !empty($_POST['age']) &&
        !empty($_POST['address']) &&
        !empty($_POST['city']) &&
        !empty($_POST['state']) &&
        !empty($_POST['institution']) &&
        !empty($_POST['school_start']) &&
        !empty($_POST['school_end']) &&
        !empty($_POST['company_name']) &&
        !empty($_POST['position']) &&
        !empty($_POST['work_start']) &&
        !empty($_POST['work_end']))   
    {
            // Set variable names for each POST data
            $surname        = htmlspecialchars($_POST['surname']);
            $firstname      = htmlspecialchars($_POST['firstName']);
            $middlename     = htmlspecialchars($_POST['middleName']);
            $nationality    = htmlspecialchars($_POST['nationality']);
            $maritalstatus  = $_POST['maritalstatus'];
            $phone          = htmlspecialchars($_POST['phone']);
            $email          = htmlspecialchars($_POST['email']);
            $gender         = htmlspecialchars($_POST['gender']);
            $age            = htmlspecialchars($_POST['age']);
            $address        = htmlspecialchars($_POST['address']);
            $city           = htmlspecialchars($_POST['city']);
            $state          = htmlspecialchars($_POST['state']);
            $institution    = htmlspecialchars($_POST['institution']);
            $school_start   = htmlspecialchars($_POST['school_start']);
            $school_end     = htmlspecialchars($_POST['school_end']);
            $company_name   = htmlspecialchars($_POST['company_name']);
            $position       = htmlspecialchars($_POST['position']);
            $work_start     = htmlspecialchars($_POST['work_start']);
            $work_end       = htmlspecialchars($_POST['work_end']);


            // Validate Email Address
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {

                // Validate Age
                if(filter_var($age, FILTER_VALIDATE_INT) && is_numeric($age))
                {
                    // Insert data into database
                    try {

                        $insertQuery = "INSERT INTO user_details (  surname, 
                                                                    firstname, 
                                                                    middlename,
                                                                    nationality,
                                                                    maritalstatus,
                                                                    phone, 
                                                                    email,
                                                                    gender,
                                                                    age,
                                                                    address,
                                                                    city,
                                                                    state,
                                                                    institution,
                                                                    school_start,
                                                                    school_end,
                                                                    company_name,
                                                                    position,
                                                                    work_start,
                                                                    work_end ) 
                                                          VALUES ( :surname, 
                                                                   :firstname, 
                                                                   :middlename,
                                                                   :nationality,
                                                                   :maritalstatus,
                                                                   :phone, 
                                                                   :email,
                                                                   :gender,
                                                                   :age,
                                                                   :address,
                                                                   :city,
                                                                   :state,
                                                                   :institution,
                                                                   :school_start,
                                                                   :school_end,
                                                                   :company_name,
                                                                   :position,
                                                                   :work_start,
                                                                   :work_end )";

                            
                            $userDetails = $conn->prepare($insertQuery);
                            $userDetails->bindParam(':surname', $surname);
                            $userDetails->bindParam(':firstname', $firstname);
                            $userDetails->bindParam(':middlename', $middlename);
                            $userDetails->bindParam(':nationality', $nationality);
                            $userDetails->bindParam(':maritalstatus', $maritalstatus);
                            $userDetails->bindParam(':phone', $phone);
                            $userDetails->bindParam(':email', $email);
                            $userDetails->bindParam(':gender', $gender);
                            $userDetails->bindParam(':age', $age);
                            $userDetails->bindParam(':address', $address);
                            $userDetails->bindParam(':city', $city);
                            $userDetails->bindParam(':state', $state);
                            $userDetails->bindParam(':institution', $institution);
                            $userDetails->bindParam(':school_start', $school_start);
                            $userDetails->bindParam(':school_end', $school_end);
                            $userDetails->bindParam(':company_name', $company_name);
                            $userDetails->bindParam(':position', $position);
                            $userDetails->bindParam(':work_start', $work_start);
                            $userDetails->bindParam(':work_end', $work_end);
                            $userDetails->execute();

                            echo "Saved successfully";

                            //Start a session for the user
                            $_SESSION["email"] = $email;
                            $_SESSION["password"] = $hash;
                            
                                header('location: home.php');       
                        }

                    catch(PDOException $e)
                        {
                            //This will output an error message
                            $error = $e->getMessage();
                        }

                } else{
                    echo "Please enter a valid age";
                }

            } else {
                echo "Please enter a valid email address";
            }

    } else{
        echo "All fields are required";
    }
}

?>