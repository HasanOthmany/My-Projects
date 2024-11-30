<?php
/* Here, we'll be receiving the data entered in the form */
@$FirstName = $_POST['FirstName']; /* This is the "name" attribute's value of the first input in HTML below */
@$LastName = $_POST['LastName'];
@$Email = $_POST['Email'];

/* We'll create an associative array that stores the error messages in case we write something wrong in the input fields. They'll appear below them */
$Errors = [
    'FirstNameError' => '',
    'LastNameError' => '',
    'EmailError' => ''
]; /* With associative arrays, we can call the elements with the names they have rather than by the index number. Here, the elements are empty, but they'll be changed below in the expressions */

// echo $FirstName . ' ' . $LastName . ' ' . $Email; --- This code will always display the data entered, so we must make it only display it when the "Register" button is clicked

if (isset($_POST['Submit'])) /* The "isset" function makes sure that the "Register" button (named "Submit") is clicked to enable the code below */
{
    /* We have to make sure that everything entered in the input fields is a string to prevent scripts from being written in to avoid security risks and cyberattacks */
    // (MOVED DOWN) $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']); /* The function here does what we've explained above; transform all entered data to strings. The first parameter is obviously the $conn variable to reach the database, and the second one is the input field. Now that we prevent it to be stored in the database as a script, we have to prevent it from being returned to the page as a script, too. We'll do this in the "Index" file */
    // (MOVED DOWN) $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    // (MOVED DOWN) $Email = mysqli_real_escape_string($conn, $_POST['Email']);

    /* Here, we'll add a query (info to the database). First, we create a variable with any name we want, but we can use "sql" to make it easier. The commands are preferred in uppercase, but that's not necessary. Then, we write the name of the table then the columns between parentheses, then the values */
    // (MOVED DOWN) $sql = "INSERT INTO users(FirstName, LastName, Email) VALUES ('$FirstName', '$LastName', '$Email')"; /* "INSERT INTO" adds to the specified table (users) and the columns that are between parentheses (FirstName, LastName and Email). "VALUES" adds the specified values that are between parentheses. In this case, it uses the variables $FirstName, $LastName and $Email from above, which are whatever is written in those input fields */

    /* Next, we have to use the query above by connecting it to the "$conn" variable using the following function */
    // mysqli_query($conn, $sql);


    // FIRST NAME VALIDATION
    if(empty($FirstName)) /* This will make sure that if the $FirstName variable is empty, the error message below will appear, and the info entered won't be submitted to the database. This is known as "validation" */ {
        $Errors['FirstNameError'] = 'Please enter your first name'; /*This will change the value of "FirstNameError" from empty to the one we've specified, if the first name is not entered. The error will be echoed via PHP below the input fields in the "Index.php" document */
    }

    // LAST NAME VALIDATION
    if(empty($LastName)) /* If $LastName is empty, an error will be displayed */ {
        $Errors['LastNameError'] = 'Please enter your last name';
    }
    
    // EMAIL VALIDATION
    if(empty($Email)) /* If $Email is empty, an error will be displayed */ {
        $Errors['EmailError'] = 'Please enter your email address';
    }elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)) /* This expression checks if the email is NOT valid (because there's a ! in the beginning. If there isn't, it checks if the email is valid) */ {
        $Errors['EmailError'] = 'Please enter a valid email address';
    }

    
    // NO ERRORS VALIDATION
    if(!array_filter($Errors)) /* This function checks if the "Errors" array is empty, as there's an exclamation mark beforehand. If it's empty, it'll excute all codes below */ {
        $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);

        $sql = "INSERT INTO users(FirstName, LastName, Email) VALUES ('$FirstName', '$LastName', '$Email')";

        if (mysqli_query($conn, $sql)) {
            header('Location: '. $_SERVER['PHP_SELF']); /* This will make the page refreshes upon clicking on "Register". If not, it'll display an error instead. Also, the info entered gets added to the database */
        }
        else {
            echo 'Error' . mysqli_error();
        }
    }
} 
?>