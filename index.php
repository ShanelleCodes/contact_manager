<?php 
    require('database.php');
    $queryContacts = 'SELECT * FROM contacts';
    $statement1 = $db->prepare($queryContacts);
    $statement1->execute();
    $contacts = $statement1->fetchAll();
    $statement1->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager - Home</title>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Fauna+One&family=Jersey+25+Charted&family=Madimi+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <h2>Contact List</h2>
        <table class="alternate">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Status</th>
                <th>Birth Date</th>
                <th>&nbsp;</th> <!-- for edit buttin -->
                <th>&nbsp;</th> <!-- for delete buttin -->
            </tr>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?php echo $contact['firstName']; ?></td>
                    <td><?php echo $contact['lastName']; ?></td>
                    <td><?php echo $contact['phone']; ?></td>
                    <td><?php echo $contact['emailAddress']; ?></td>
                    <td><?php echo $contact['status']; ?></td>
                    <td><?php echo $contact['dob']; ?></td>
                    <td>
                        <form action="update_contact_form.php"
                            method="post">
                            <input type="hidden" name="contact_id"
                                value="<?php echo $contact['contactID']; ?>">
                            <input class="update" type="submit" value="Update">
                        </form>
                    </td> 
                    <td>
                        <form action="delete_contact.php"
                            method="post">
                            <input type="hidden" name="contact_id"
                                value="<?php echo $contact['contactID']; ?>">
                            <input class="delete" type="submit" value="Delete">
                        </form>
                    </td> 
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_contact_form.php">Add Contact</a></p>
    </main>
    <?php include("footer.php"); ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>