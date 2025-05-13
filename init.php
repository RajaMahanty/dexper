<?php 
    session_start();
    include_once 'connection.php';
    include_once 'base.php';
    include_once 'user.php';
    include_once 'expense.php';
    include_once 'budget.php';
    include_once 'cat.php';

    global $pdo;

    

    $getFromB = new Budget($pdo);
    $getFromE = new Expense($pdo);
    $getFromC = new Category($pdo);
    $getFromU = new User($pdo);

     define("BASE_URL", "http://localhost/ExpenseManagement-PHP/");
     
?>  

