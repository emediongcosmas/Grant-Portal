<?php       
    session_start();

    $email = $_SESSION["email"];

        require 'dbconnect.php';
        echo $_POST['description'];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Check if the inputs are set and are not NULL
            if( isset($_POST['project_title']) &&
                isset($_POST['description']) &&
                isset($_POST['amount']) &&
                isset($_POST['budget_total']) &&
                isset($_POST['budget_breakdown']) &&
                isset($_POST['email']) &&
                !empty($_POST['project_title']) &&
                !empty($_POST['description']) &&
                !empty($_POST['amount']) &&
                !empty($_POST['budget_total']) &&
                !empty($_POST['budget_breakdown']) &&
                !empty($_POST['email']))
            {   

                    $projectTitle    = htmlentities($_POST['project_title']);
                    $describe        = htmlentities($_POST['description']);
                    $description     = nl2br($describe);
                    $amountNumber    = htmlentities($_POST['amount']);
                    $amount          = number_format($amountNumber);
                    $budget          = htmlentities($_POST['budget_total']);
                    $budgetTotal     = number_format($budget);
                    $budgetbreak     = htmlentities($_POST['budget_breakdown']);
                    $budgetBreakdown = nl2br($budgetbreak);
                    $email           = htmlentities($_POST['email']);
                    $timestamp       = date("Y-m-d H:i:s");

                    try {

                        //Insert the data into the database
                        $insertQuery = "INSERT INTO application (email, project_title, description, amount, budget_total, budget_breakdown, timestamp) VALUES ( :email, :project_title, :description, :amount, :budget_total, :budget_breakdown, :timestamp)";

                            // use exec() because no results are returned
                            $insertApplication = $conn->prepare($insertQuery);
                            $insertApplication->bindParam(':email', $email);
                            $insertApplication->bindParam(':project_title', $projectTitle);
                            $insertApplication->bindParam(':description', $description);
                            $insertApplication->bindParam(':amount', $amount);
                            $insertApplication->bindParam(':budget_total', $budgetTotal);
                            $insertApplication->bindParam(':budget_breakdown', $budgetBreakdown);
                            $insertApplication->bindParam(':timestamp', $timestamp);
                            $insertApplication->execute();

                                 //Start a session for the user
                                 $_SESSION["email"] = $email;
                                 $_SESSION["password"] = $hash;
                                 

                                $success = "New record created successfully";
                                    //Redirect to the home page
                                    header("Location: ../home.php");
                                        
                        }

                    catch(PDOException $e)
                        {
                        echo $e->getMessage();
                        }

            } else {

                $error = "All fields are required";

            }

        }
    ?>