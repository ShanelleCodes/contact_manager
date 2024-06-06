<?php
    require_once('database.php');

    $contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);

    $query = 'SELECT * FROM contacts 
            WHERE contactID = :contact_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':contact_id', $contact_id);
        $success = $statement->execute();
        $contact = $statement->fetch();
        $statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager - Update Contact</title>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <h2>Update Contact</h2>
        <form action="update_contact.php" method="post" id="update_contact_form">
        
        <div id="data">
            <input type="hidden" name="contact_id"
                value="<?php echo $contact['contactID'];?>">

            <label for="">First Name:</label>
            <input type="text" name="first_name" 
                value="<?php echo $contact['firstName'];?>"><br />

            <label for="">Last Name:</label>
            <input type="text" name="last_name"
                value="<?php echo $contact['lastName'];?>"><br />

            <label for="">Phone Number:</label>
            <input type="text" name="phone_number"
                value="<?php echo $contact['phone'];?>"><br />

            <label for="">Email Address:</label>
            <input type="text" name="email_address"
                value="<?php echo $contact['emailAddress'];?>"><br />

            <label for="">Status:</label><br>
            <input type="radio" name="status" value="member"
                value="<?php echo ($contact['status'] ==
                            'member')
                            ? 'checked' : '' ?>">Member<br />
            <input type="radio" name="status" value="non-member"
                value="<?php echo ($contact['status'] ==
                            'non-member')
                            ? 'checked' : '' ?>">Non-Member<br />

            <label for="">Birth Date:</label>
            <input type="date" name="dob"
                value="<?php echo $contact['dob'];?>"><br />
        </div>

        <div id="buttons">
            <label for="">&nbsp;</label>
            <input type="submit" value="Update Contact"><br />
        </div>

        </form>

        <p><a href="index.php">View Contact List</a></p>
    </main>
    <?php include("footer.php"); ?>
</body>
</html>