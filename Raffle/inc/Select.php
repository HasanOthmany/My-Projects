<?php
$sql_all = 'SELECT * FROM users ORDER BY RAND() LIMIT 1'; /* Here, we create a variable that selects everything (* means all) from the "users" table and stores them. It also orders the info randomly and limits them to the specified number (only 1 card will be displayed) */
$result = mysqli_query($conn, $sql_all); /* Here, we use the "mysqli_query" function to excute the query above. The first parameter is the $conn variable that connects to the database, and the second parameter is the variable $sql_all from above that is excuted */
$users = mysqli_fetch_all($result, MYSQLI_ASSOC); /* This function fetches all info stored in the "$result" variable, then they get turned into an associative array */
?>