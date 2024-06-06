

<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager - Add Contact</title>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Fauna+One&family=Jersey+25+Charted&family=Madimi+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

</head>
<body>
    <?php include("header.php"); ?>
    <main class="form-card">
    
        <h2>Add Contact</h2>
        <div class="form-container">
        <form action="add_contact.php" method="post" id="add_contact_form">
        
        <div id="data" class="form-input">
            <label for="">First Name:</label>
            <input type="text" name="first_name"><br />

            <label for="">Last Name:</label>
            <input type="text" name="last_name"><br />

            <label for="">Phone Number:</label>
            <input type="text" name="phone_number"><br />

            <label for="">Email Address:</label>
            <input type="text" name="email_address"><br />

            <label for="">Status:</label><br>
            <input type="radio" name="status" value="member">Member<br />
            <input type="radio" name="status" value="non-member">Non-Member<br />

            <label for="">Birth Date:</label>
            <input type="date" name="dob"><br />
        </div>

        <div id="buttons">
            <label for="">&nbsp;</label>
            <input class="save-contact" type="submit" value="Save Contact"><br />
        </div>

        </form>
        </div>
        <p><a href="index.php">View Contact List</a></p>
    </main>
    <?php include("footer.php"); ?>
</body>
</html>