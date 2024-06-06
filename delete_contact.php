<?php 
    require_once('database.php');

    // Get ID 
    $contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);

    if($contact_id != false){
        $query = 'DELETE FROM contacts 
            WHERE contactID = :contact_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':contact_id', $contact_id);
        $success = $statement->execute();
        $statement->closeCursor();
    }

    //Display the Contact List page
    $url = "index.php";
    header("Location: " . $url);
    die();
?>