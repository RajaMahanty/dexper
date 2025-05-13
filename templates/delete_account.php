<?php
include_once "../init.php";
// User login check
if ($getFromU->loggedIn() === false) {
    header('Location: ../index.php');
}
include_once 'skeleton.php';

// Check if the form is submitted
if (isset($_POST['delete_account'])) {
    try {
        $userId = $_SESSION['UserId'];
        $getFromU->deleteUserData($userId);
        $getFromU->logout();
        echo '<script>
                window.location.href = "../index.php";
              </script>';
        exit(); // Ensure no further code is executed
    } catch (Exception $e) {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to delete account. Please try again later.",
                    icon: "error",
                    confirmButtonText: "Close"
                })
                </script>';
    }
}
?>

<div class="wrapper">
    <div class="row">
        <div class="col-12 col-m-12 col-sm-12">
            <div class="card">
                <div class="counter" style="display: flex; align-items: center; justify-content: center;">
                    <form method="POST" onsubmit="return confirmDeletion();">
                        <h1 style="font-family: 'Source Sans Pro'; color: var(--main-color);">Delete Account</h1>
                        <p style="color: var(--second-color);">Are you sure you want to delete your account? This action cannot be undone.</p>
                        <button type="submit" class="pressbutton" name="delete_account" style="background-color: red; color: white;">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDeletion() {
    return confirm('Are you sure you want to delete your account? This action cannot be undone.');
}
</script>
