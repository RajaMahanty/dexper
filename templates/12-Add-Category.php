<?php
include_once "../init.php";

//User login checker
if ($getFromU->loggedIn() === false) {
    header('Location: ../index.php');
}

include_once 'skeleton.php';

if (isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];
    $getFromC->createCategory($_SESSION['UserId'], $categoryName);
}

$categories = $getFromC->getAllCategories($_SESSION['UserId']);
?>

<div class="wrapper">
    <div class="row">
        <div class="col-6 col-m-6 col-sm-6">
            <div class="card">
                <div class="counter" style="height: 60vh; display: flex; align-items: center; justify-content: center;">
                    <form action="" method="post">
                        <div>
                            <label class="add-category-label" style="font-family: 'Source Sans Pro'; font-size: 1.3em; color: var(--main-color);">Category Name:</label><br><br>
                            <input class="text-input" type="text" name="categoryName" required="true" style="width: 100%; padding-top: 8px;  color: var(--main-color);"><br><br>
                        </div>
                        <div><br>
                            <button type="submit" class="pressbutton" name="addCategory">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6 col-m-6 col-sm-6">
            <div class="card">
                <div class="counter" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                    <h3 style="font-family: 'Source Sans Pro'; font-size: 1.5em;  color: var(--main-color);">Available Categories</h3>
                    <ul style="list-style-type: none; padding: 0; width: 100%; text-align: center; color: var(--main-color);">
                        <?php foreach ($categories as $category): ?>
                            <li style="padding: 10px; border-bottom: 1px solid #ccc;"><?php echo htmlspecialchars($category->CategoryName); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>