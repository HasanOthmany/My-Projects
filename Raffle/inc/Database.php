<?php
/* We should hide these info in a different file than the main one to protect it */

/* We'll connect this page to the "Raffle" database */
$conn = mysqli_connect('localhost', 'root', 'root', 'raffle'); /* First we create a variable with any name, and we give it the value "mysqli_connect". Then, we specify the host name (localhost), the username (root), the password (nothing), and the name of the database (Raffle) */

/* Now, let's make sure we're connected to the database */
if(!$conn) /* This will make sure if the "$conn" variable is NOT connected to the database */ {
    echo 'Error: ' . mysqli_connect_error();
} /* If the "$conn" variable isn't connected to the database, the causing error will appear on the page */
?>