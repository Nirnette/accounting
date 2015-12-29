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
$expenses = $userData->getExpManager()->getExp();
$incomes = $userData->getIncManager()->getInc();


// Delete Expense
if(isset($_POST['expToDel']))
{
    echo "Deleting expense with id: ".$_POST['expToDel'];

    $userData->deleteEntry('expense', $_POST['expToDel']);
}

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
             <form method="post">
            <input type="hidden" value="'. $expense->getOperationId().'" name="expToDel">
        <input type="submit" name="delete" value="delete"/>
        </form></td></tr>';
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
