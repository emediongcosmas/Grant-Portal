<?php
    require '../../inc/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( isset($_POST['approved']) &&
        isset($_POST['id']) &&
        !empty($_POST['approved']) &&
        !empty($_POST['id']))   
    {

            // Set variable names for each POST data
            $status     = htmlspecialchars($_POST['approved']);
            $id    = htmlspecialchars($_POST['id']);

        // Insert data into database
        try {

            $updateQuery = "UPDATE application SET status = :status WHERE id = :id";

            $updateStatus = $conn->prepare($updateQuery);    
            $updateStatus->bindParam(':status', $status, PDO::PARAM_INT); 
            $updateStatus->bindParam(':id', $id, PDO::PARAM_INT); 

            $updateStatus->execute();


                //Start a session for the user
                $_SESSION["email"] = $email;

                header('Location: ../admin.php');
            }

        catch(PDOException $e)
            {
                //This will output an error message
                $error = $e->getMessage();
            }

             

    } else{
        echo "All fields are required";
    }
}

?>