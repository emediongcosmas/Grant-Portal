<?php 
require 'dbconnect.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Check if the inputs are set and are not NULL
            if( isset($_POST['email']) &&
                isset($_POST['password']) &&
                isset($_POST['cardNumber']) &&
                !empty($_POST['email']) &&
                !empty($_POST['password']) &&
                !empty($_POST['cardNumber']))
            {

                        $email = htmlentities($_POST['email']);
                        $password = $_POST['password'];
                        $number = htmlspecialchars($_POST['cardNumber']);
                    
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                            if(is_numeric($number)){

                                try {
                                    //Query the database
                                    $fetch = $conn->prepare("SELECT * FROM card WHERE card_number = :card_number");
                                    $fetch->bindParam(':card_number', $number);
                                    $fetch->execute();
                                    $card= $fetch->fetch();

                                        //Check to see if the passwords match
                                        if ($card['card_number'] != $number)
                                        { 
                                            $error = "Incorrect Card Number";

                                        } else {

                                                        
                                            try {

                                                //Query the database
                                                $fetch = $conn->prepare("SELECT card_number FROM registration WHERE card_number = :card_number");
                                                $fetch->bindParam(':card_number', $number);
                                                $fetch->execute();
                                                $user = $fetch->fetch();

                                                $card = $user['card_number'];
                                                
                                                    if ($card === $number)
                                                    {
                                                        
                                                        $error = "Card taken";
                        
                                                    } 
                                                    else {

                                                        //Query the database
                                                        $fetch = $conn->prepare("SELECT email FROM registration WHERE email = :email");
                                                        $fetch->bindParam(':email', $email);
                                                        $fetch->execute();
                                                        $user = $fetch->fetch();

                                                        $user_email = $user['email'];

                                                        if ($user_email === $email)
                                                        {
                                                        
                                                            $error = "Email address taken";
                        
                                                        } else {

                                                        //Beginning of database query
                                                            try {
                                                                $hash = password_hash($password, PASSWORD_BCRYPT);
                                                                    //Insert the data into the database
                                                                    $sql = "INSERT INTO registration (email, password, card_number) VALUES ( :email, :hash, :card_number)";

                                                                        // use exec() because no results are returned
                                                                        $insertUser = $conn->prepare($sql);
                                                                        $insertUser->bindParam(':email', $email);
                                                                        $insertUser->bindParam(':hash', $hash);
                                                                        $insertUser->bindParam(':card_number', $number);
                                                                        $insertUser->execute();

                                                                        $id = $email;

                                                                            $error = "New record created successfully";

                                                                            //Start a session for the user
                                                                            $_SESSION["email"] = $email;
                                                                            $_SESSION["password"] = $hash;

                                                                                //Redirect to the home page
                                                                                header("Location: register.php");
                                                                                
                                                                }

                                                            catch(PDOException $e)
                                                                {
                                                                echo $e->getMessage();
                                                                }

                                                        }

                                                    }
                                                            
                                                    
                                                            
                                                }
                                
                                                catch(PDOException $e)
                                                    {
                                                        //This will output an error message
                                                        echo $e->getMessage();
                                                }
                                                            
                                        }
                                    }
        
                                catch(PDOException $e)
                                    {
                                        //This will output an error message
                                        echo $e->getMessage();
                                    }


                            } else {
                                echo "Invalid Scratch Card Number";
                            }

                        } else {
                            echo "Invalid email address";
                        }

            } else {

                echo "All fields are required";
                
            }

        }
        ?>