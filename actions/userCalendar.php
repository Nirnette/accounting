<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 28/12/2015
 * Time: 15:55
 */
session_start();
require_once '../sources/ExpenseManager.php';
require_once '../sources/Expense.php';
require_once '../sources/IncomeManager.php';
require_once '../sources/Income.php';
require_once '../sources/Operation.php';
require_once '../sources/User.php';
require_once '../sources/UserSession.php';
require_once '../sources/DatabaseManager.php';



    if(isset($_POST['disconnect']))
    {
        session_destroy();
        header('Location : ../index.php');
    }

var_dump($_SESSION['userData']);


?>


<html>
<head>

</head>
<body>
<form method="post">
    <input type="submit" name="disconnect" value="disconnect">
</form>
</body>
</html>
