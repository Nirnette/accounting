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

if(!isset($_SESSION['userData']))
{
    header('Location: ../index.php');
}

if (isset($_POST['disconnect'])) {
    session_destroy();
    header('Location: ../index.php');
}

$userData = unserialize($_SESSION['userData']);

// Delete Expense
if(isset($_POST['expToDel']))
{
    echo "Deleting expense with id: ".$_POST['expToDel'];

    $userData->deleteEntry('expense', $_POST['expToDel']);
    $_SESSION['userData'] = serialize($userData);
}

//edit Expense
if(isset($_POST['expToEdit']))
{
    echo "Editing expense with id: ".$_POST['expToEdit'];

    if ( preg_match('#^[1-3]?[0-9] / [0-1]?[0-9] / [1-2][0-9]{3}^ #', $_POST['editexpdate']))
    {
        $userData->editEntry('expense', $_POST['expToEdit'], $_POST['editexpdate'], $_POST['editexpamount'], $_POST['editexptype'], $_POST['editexpdesc'], $_POST['editexpdate']);
        $_SESSION['userData'] = serialize($userData);
    }
}










//initializing data tables
$expenses = $userData->getExpManager()->getExp();
$incomes = $userData->getIncManager()->getInc();



    ?>


    <html>
    <head>

    </head>
    <body>
    <form method="post">
        <input type="submit" name="disconnect" value="disconnect">
    </form>
    Expenses
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

    <?php foreach($expenses as $expense)
    {
        echo '<tr><td>' . $expense->getOperationDate() . '</td>' .
            '<td>' . $expense->getOperationAmount() . '</td>' .
            '<td>' . $expense->getExpenseType() . '</td>' .
            '<td>' . $expense->getOperationDescription() . '</td>'.
            '<td>
             <tr><form method="post"><td>
             <input type="text" name="editexpdate" value="' . $expense->getOperationDate() . '" /></td>' .
            '<td><input type="text" name="editexpamount" value="' . $expense->getOperationAmount() . '" /></td>' .
            '<td><input type="text" name="editexptype" value="' . $expense->getExpenseType() . '" /></td>' .
            '<td><input type="text" name="editexpdesc" value="' . $expense->getOperationDescription() . '" /></td>'.
            '<td>
                     <input type="hidden" value="'. $expense->getOperationId().'" name="expToEdit">
                     <input type="submit" name="edit" value="edit"/>
                     </td></form>
                     <form method="post"><td>
                     <input type="hidden" value="'. $expense->getOperationId().'" name="expToDel">
                     <input type="submit" name="delete" value="delete"/>
                     </td></form></tr>';
    }
    ?>
        </table><br>




        Incomes
        <table border="1">
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
    <?php
    foreach($incomes as $income)
    {
        echo '<tr><td>' . $income->getOperationDate() . '</td>' .
            '<td>' . $income->getOperationAmount() . '</td>' .
            '<td>' . $income->getIncomeType() . '</td>' .
            '<td>' . $income->getOperationDescription() . '</td></tr>';
    }


    ?>
    </table>
    </body>
    </html>
