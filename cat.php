<?php
class Category extends Base
{
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create a new category
    public function createCategory($UserId, $categoryName)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO category(UserId, CategoryName) VALUES(:user, :categoryName)");
            $stmt->bindParam(":user", $UserId, PDO::PARAM_INT);
            $stmt->bindParam(":categoryName", $categoryName, PDO::PARAM_STR);
            $stmt->execute();
            echo '<script>
                Swal.fire({
                    title: "Success!",
                    text: "Category added successfully",
                    icon: "success",
                    confirmButtonText: "Close"
                })
                </script>';
        } catch (Exception $e) {
            echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Failed to add category",
                    icon: "error",
                    confirmButtonText: "Close"
                })
                </script>';
        }
    }

    // Remove an existing category
    public function removeCategory($UserId, $categoryId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM category WHERE UserId = :user AND CategoryId = :categoryId");
        $stmt->bindParam(":user", $UserId, PDO::PARAM_INT);
        $stmt->bindParam(":categoryId", $categoryId, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Get all categories for a user
    public function getAllCategories($UserId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM category WHERE UserId = :user");
        $stmt->bindParam(":user", $UserId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get category ID by name
    public function getCategoryIdByName($UserId, $categoryName)
    {
        $stmt = $this->pdo->prepare("SELECT CategoryId FROM category WHERE UserId = :user AND CategoryName = :categoryName");
        $stmt->bindParam(":user", $UserId, PDO::PARAM_INT);
        $stmt->bindParam(":categoryName", $categoryName, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if ($row) {
            return $row->CategoryId;
        } else {
            return false;
        }
    }

    // Fetch all categories of the user
    public function getUserCategories($UserId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM category WHERE UserId = :user");
        $stmt->bindParam(":user", $UserId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
