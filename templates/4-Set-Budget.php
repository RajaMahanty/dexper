<?php
include_once "../init.php";
if ($getFromU->loggedIn() === false) {
    header('Location: ../index.php');
    exit();
}
include_once 'skeleton.php';

$user_id = $_SESSION['UserId'];
$curr_budget = $getFromB->checkbudget($user_id);

$redirect = false;

if (isset($_POST['enterbudget'])) {
    $budget = $_POST['budget'];

    if ($curr_budget == NULL) {
        $getFromB->setbudget($user_id, $budget);
        $redirect = true;
    } else {
        echo '<script>
            Swal.fire({
                title: "Error!",
                text: "Budget can only be set once.",
                icon: "error",
                confirmButtonText: "Close"
              })
            </script>';
    }
}

if (isset($_POST['enterincbudget'])) {
    $amount = $_POST['budget'];

    // Ensure $amount is a number
    $amount = floatval($amount);

    $getFromB->increasebudget($user_id, $amount);
    $redirect = true;
}

if ($redirect) {
    echo '<script>
        Swal.fire({
            title: "Done!",
            text: "Records Updated Successfully",
            icon: "success",
            confirmButtonText: "Close"
          }).then(function() {
            window.location.href = "5-Add-Expenses.php";
          });
        </script>';
}
?>

<div class="wrapper">
    <div class="row">
        <div class="col-12 col-m-12 col-sm-12">
            <div class="card">
                <div class="counter" style="height: 40vh; display: flex; align-items: center; justify-content: center;">
                    <form action="" method="post">
                        <p id="budget-text" style="font-size: 1.4em; font-family:'Source Sans Pro'">
                            <?php if ($curr_budget == NULL): ?>
                                Enter your budget for this month:
                            <?php else: ?>
                                Increase your budget for this month:
                            <?php endif; ?>
                        </p><br>
                        <input type='text' name="budget" onkeypress='validate(event)' class="text-input" required /><br><br><br>
                        <?php if ($curr_budget == NULL): ?>
                            <button type="submit" name="enterbudget" class="pressbutton">Set Budget</button>
                        <?php else: ?>
                            <button type="submit" name="enterincbudget" class="pressbutton">Increase Budget</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="../static/js/4-Set-Budget.js"></script>