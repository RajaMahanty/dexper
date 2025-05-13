<?php
include_once "../init.php";

//User login checker
if ($getFromU->loggedIn() === false) {
    header('Location: ../index.php');
}

include_once 'skeleton.php';

if (isset($_POST['removeCategory'])) {
    $categoryName = $_POST['categoryName'];
    $categoryId = $getFromC->getCategoryIdByName($_SESSION['UserId'], $categoryName);
    if ($categoryId) {
        try {
            $getFromC->removeCategory($_SESSION['UserId'], $categoryId);
            echo '<script>
                Swal.fire({
                    title: "Done!",
                    text: "Category Removed Successfully",
                    icon: "success",
                    confirmButtonText: "Close"
                })
                </script>';
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Cannot delete category as it is being used",
                        icon: "error",
                        confirmButtonText: "Close"
                    })
                    </script>';
            } else {
                throw $e; // Re-throw if it's a different exception
            }
        }
    } else {
        echo '<script>
            Swal.fire({
                title: "Error!",
                text: "Category Not Found",
                icon: "error",
                confirmButtonText: "Close"
            })
            </script>';
    }
}

$categories = $getFromC->getAllCategories($_SESSION['UserId']);
?>

<div class="wrapper">
    <div class="row">
        <div class="col-12 col-m-12 col-sm-12">
            <div class="card">
                <div class="counter" style="height: 60vh; display: flex; align-items: center; justify-content: center;">
                    <form action="" method="post">
                        <div>
                            <label class="add-category-label" style="color: var(--main-color); font-family: 'Source Sans Pro'; font-size: 1.3em;">Chose Category:</label><br><br>
                            <?php if (empty($categories)): ?>
                                <p style="color: red; font-family: 'Source Sans Pro';">No categories available to remove. Please add a category first from here <a href="../templates/12-Add-Category.php">Add Category</a></p>
                            <?php else: ?>
                                <select class="text-input" name="categoryName" required="true" style="color: var(--main-color); width: 100%; padding-top: 8px;">
                                    <?php foreach ($categories as $category): ?>
                                        <option style="color: var(--main-color); background-color: var(--main-bg-color);" value="<?php echo $category->CategoryName; ?>"><?php echo $category->CategoryName; ?></option>
                                    <?php endforeach; ?>
                                </select><br><br>
                            <?php endif; ?>
                        </div>
                        <div><br>
                            <button type="submit" class="pressbutton" name="removeCategory" <?php echo empty($categories) ? 'disabled' : ''; ?>>Remove Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
