<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Manager - Database Error</title>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed.</p>
        <p>MySQL must be running.</p>
        <p>Error Message: <?php echo $_SESSION["database_error"]; ?> </p>

        <p><a href="index.php">view Contact List</a></p>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>