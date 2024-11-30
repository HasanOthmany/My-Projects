<?php
include './inc/Database.php';
include './inc/Form.php';
include './inc/Select.php';
include './inc/Database_Close.php';

// foreach($users as $user) {
    // echo "<h1>" . htmlspecialchars($user['FirstName']) . "</h1>"; /* This function converts special characters to HTML entities, so the script will be read as a normal string */
// } - There's a better way to write this code in HTML below
?>
<?php include_once './parts/header.php'; ?>
    <div class="container">

        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
            <div class="col-md-6 p-lg-5 mx-auto">
                <img src="./images/game.jpg" alt="">
                <h1 class="display-3 fw-normal">Raffle</h1>
                <p class="lead fw-normal">Time left until results:
                <h3 id="countdown"></h3> <!--This is the ID that is used to display the countdown timer -->
                </p>
            </div>
        </div>
        
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
                <h3>To participate in the raffle, please do the following:</h3>
                <ul class="list-group list-group-flush mt-5">
                    <li class="list-group-item">Enter your first name</li>
                    <li class="list-group-item">Enter your last name</li>
                    <li class="list-group-item">Enter your email address</li>
                    <li class="list-group-item">Click on "Register"</li>
                    <li class="list-group-item">Good luck!</li>
                </ul>
            </div>
        </div>

    <div class="position-relative text-center">
        <div class="col-md-6 p-lg-5 mx-auto my-5">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"> <!-- The $_SERVER variable here returns the current directory. This is better than specifying the this  file when it's uploaded online -->
                <h3>Please enter your information below</h3>
                <div class="mb-3">
                    <label for="FirstName" class="form-label">First name</label>
                    <input type="text" name="FirstName" id="FirstName" class="form-control" value="<?php echo $FirstName?>"> <!-- The "value" attribute enters info in the input field. Here, it'll enter whatever's last written as the first name. We'll use this to keep the data in the input field upon clicking on the submit button if there are any errors -->
                    <div class="form-text error text-danger"><?php echo $Errors['FirstNameError']?></div>
                </div>

                <div class="mb-3">
                    <label for="LastName" class="form-label">Last name</label>
                    <input type="text" name="LastName" id="LastName" class="form-control" value="<?php echo $LastName?>">
                    <div class="form-text error text-danger"><?php echo $Errors['LastNameError']?></div>
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email address</label>
                    <input type="text" name="Email" id="Email" class="form-control" value="<?php echo $Email?>">
                    <div class="form-text error text-danger"><?php echo $Errors['EmailError']?></div>
                </div>

                <button type="submit" name="Submit" class="btn btn-primary">Register</button>
        </form>
        </div>
    </div>

    <!--
    <form action="Index.php" method="POST">
        <input type="text" name="FirstName" id="FirstName" placeholder="First Name">
        <input type="text" name="LastName" id="LastName" placeholder="Last Name">
        <input type="text" name="Email" id="Email" placeholder="Email Adress">
        <input type="submit" name="Submit" value="Register">
    </form>
    -->

<div class="loader-container">
    <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>

<!-- Button trigger modal -->
<div class="d-grid gap-2 col-6 mx-auto my-5">
    <button type="button" id="winner" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
    Reveal Winner
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">The winner is...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user): ?>
        <h1 class="display-3 text-center modal-title" id="modalWinner"><?php echo htmlspecialchars($user['FirstName']) . ' ' . htmlspecialchars($user['LastName']); ?></h1>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>


    <!-- <div class="d-grid gap-2 col-6 mx-auto my-5">
    <button id="winner" type="button" class="btn btn-primary">Choose Winner</button>
    </div> -->

    <div id="cards" class="row mb-5 pb-5">

        <!-- We'll write the PHP code from above here. It's better to make the names appear below the form rather than above it -->

        <div class="col-lg">
            <div class="card my-1 bg-light">
                <div class="card-body">
                    <h5 class="card-title cardText">The winner is...</h5>
                    <h1 id="winnerName" class="cardText"></h1>
                </div>
            </div>
        </div>
        <?php // endforeach; ?> <!-- And we continue the PHP code from above here by ending it with "endforeach" -->
            <!-- This code has been moved upwards to make the winner's name appear in the modal -->

<?php include './parts/footer.php'; ?>