<?php
    session_start(); 
    // get the data from the form
    $contact_id = filter_input(INPUT_POST, 'contact_id', 
        FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $phone_number = filter_input(INPUT_POST, 'phone_number');
    $email_address = filter_input(INPUT_POST, 'email_address');
    $status = filter_input(INPUT_POST, 'status');
    $dob = filter_input(INPUT_POST, 'dob');
    if($status == null){
        $status = "unknown";
    }

    // code to save to MySQL database goes here 
    // validate the inputs
    if($first_name == null || $last_name == null || $phone_number == null ||
        $email_address == null || $dob == null) {
            $_SESSION["add_error"] = "Invalid contact data. Check all
                fields and try again.";

            // redirect to error page 
            $url = "error.php";
            header("Location: " . $url);
            die();
    }
    else{
        require_once('database.php');

        // Add the contact to the databse 
        $query = 'UPDATE contacts 
            SET firstName = :firstName, 
                lastName = :lastName,
                phone = :phone,
                emailAddress = :emailAddress,
                status = :status,
                dob = :dob
                WHERE contactID = :contactID';
        $statement = $db->prepare($query);
        $statement->bindValue(':contactID', $contact_id);
        $statement->bindValue(':firstName', $first_name);
        $statement->bindValue(':lastName', $last_name);
        $statement->bindValue(':phone', $phone_number);
        $statement->bindValue(':emailAddress', $email_address);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':dob', $dob);
        $statement->execute();
        $statement->closeCursor();
    }

    $_SESSION["fullName"] = $first_name . " " . $last_name;
    // redirect to confirmation page 
    $url = "update_confirmation.php";
    header("Location: " . $url);
    die();
?>