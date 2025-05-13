<?php 
	date_default_timezone_set('Asia/Kolkata');
	include_once "../init.php";

	//User login checker
	if ($getFromU->loggedIn() === false) {
        header('Location: ../index.php');
	}
	
	include_once 'skeleton.php'; 

	// Check if budget is set
	$currentBudget = $getFromB->checkbudget($_SESSION['UserId']);
?>

<div class="wrapper">
    <div class="row">
        <div class="col-12 col-m-12 col-sm-12">
            <div class="card">
                <div class="counter" style="height: 60vh; display: flex; align-items: center; justify-content: center;">
                    <?php if ($currentBudget === null): ?>
                        <p style="color: red; font-family: 'Source Sans Pro';">No budget set. Please set a budget first from here <a href="../templates/4-Set-Budget.php">Set Budget</a></p>
                    <?php else: ?>
                        <form action="" method="post">
                            <div>
                                <label class="add-expense-label" style="font-family: 'Source Sans Pro'; font-size: 1.3em;">Date of Expense:</label><br><br>
                                <input class="text-input" type="datetime-local" value="<?php echo date("Y-m-d\TH:i", time()); ?>" name="dateexpense" required="true" style="width: 100%; padding-top: 8px;"><br><br>
                            </div>
                            <div>
                                <label class="add-expense-label" style="font-family: 'Source Sans Pro'; font-size: 1.3em;">Item:</label><br>
                                <input type="text" class="text-input" name="item" value="" required="true" style="width: 100%; padding-top: 10px;"><br><br>
                            </div>
                            <div>
                                <label class="add-expense-label" style="font-family: 'Source Sans Pro'; font-size: 1.3em;">Cost of Item:</label><br>
                                <input class="text-input" type="text" value="" required="true" name="costitem" onkeypress='validate(event)' style="width: 100%; padding-top: 10px;"><br><br>
                            </div>
                            <div>
                                <label class="add-expense-label" style="font-family: 'Source Sans Pro'; font-size: 1.3em;">Category:</label><br>
                                <?php 
                                $categories = $getFromC->getAllCategories($_SESSION['UserId']);
                                if (empty($categories)): ?>
                                    <p style="color: red; font-family: 'Source Sans Pro';">No categories available. Please add a category first from here <a href="../templates/12-Add-Category.php">Add Category</a></p>
                                <?php else: ?>
                                    <select class="text-input" name="category" required="true" style="width: 100%; padding-top: 10px;">
                                        <?php foreach($categories as $category): ?>
                                            <option style="color: var(--main-color); background-color: var(--main-bg-color);" value="<?php echo $category->CategoryId; ?>"><?php echo $category->CategoryName; ?></option>
                                        <?php endforeach; ?>
                                    </select><br><br>
                                <?php endif; ?>
                            </div>
                            <div><br>
                                <button type="submit" class="pressbutton" name="addexpense" <?php echo empty($categories) ? 'disabled' : ''; ?>>Add</button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
// Create an expense record
if(isset($_POST['addexpense']) && $currentBudget !== null)
{
    $dt = date("Y-m-d H:i:s", strtotime($_POST["dateexpense"]));
    $itemname = $_POST['item'];
    $itemcost = $_POST['costitem'];
    $categoryId = $_POST['category'];

    // Check if budget is exceeded
    $totalExpenses = $getFromE->totalexp($_SESSION['UserId']);
    $newTotal = $totalExpenses + $itemcost;

    if ($newTotal > $currentBudget) {
        echo '<script>
            Swal.fire({
                title: "Warning!",
                text: "Budget Exceeded!",
                icon: "warning",
                confirmButtonText: "Close"
            })
            </script>';
    } else {
        $getFromE->create("expense", array('UserId'=>$_SESSION['UserId'], 'Item' => $itemname, 'Cost'=>$itemcost, 'Date' => $dt, 'CategoryId' => $categoryId));
        echo '<script>
            Swal.fire({
                title: "Done!",
                text: "Records Updated Successfully",
                icon: "success",
                confirmButtonText: "Close"
            })
            </script>';
    }
}
?>

<script src="../static/js/4-Set-Budget.js"></script>
