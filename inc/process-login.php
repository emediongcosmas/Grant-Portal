<?php
require 'dbconnect.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Check if the inputs are set and are not NULL
            if( isset($_POST['email']) &&
                isset($_POST['password']) && 
                !empty($_POST['email']) &&
                !empty($_POST['password']))
            {

                    $email = htmlentities($_POST['email']);
                    $password = $_POST['password'];
                    
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        
                        if($email === "admin@admin.com" && $password === "admin001"){

                            //Start a session for the user
                            $_SESSION["email"] = $email;
                            $_SESSION["password"] = $password;

                            header('Location: admin/admin.php');

                        } else {

                            try {
                                // Creates a hash for the passsword
                                $hash = password_hash($password, PASSWORD_BCRYPT);

                                    //Query the database
                                    $fetch = $conn->prepare("SELECT * FROM registration WHERE email = ?");
                                    $fetch->execute([$email]);
                                    $user = $fetch->fetch();

                                        //Check to see if the passwords match
                                        if ($user && password_verify($password, $user['password']))
                                        { 
                                            //Start a session for the user
                                            $_SESSION["email"] = $email;
                                            $_SESSION["password"] = $hash;
                                            
                                            //Redirect to the homepage
                                            header('Location: home.php');

                                        } else {

                                        $error = "Invalid Details";
                                            
                                        }
                                }

                            catch(PDOException $e)
                                {
                                    //This will output an error message
                                    echo $e->getMessage();
                                }

                        }

                    } else {

                        $error = "Invalid email address";

                    }

            } else {

                $error = "All fields are required";

            }

        }
?>