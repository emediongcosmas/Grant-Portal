

// START OF userlogin()
    function userLogin(){

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
                                        $id =  $user['email'];
                                        //Redirect to the homepage
                                        header('Location: home.php?id='.$id);

                                    } else {

                                       echo "Invalid Details";
                                        
                                    }
                            }

                        catch(PDOException $e)
                            {
                                //This will output an error message
                                echo $e->getMessage();
                            }

                    } else {

                        $error = "Invalid email address";

                    }

            } else {

                $error = "All fields are required";

            }

        }
    }
// END OF userlogin()



?>