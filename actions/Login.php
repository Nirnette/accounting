<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 24/12/2015
 * Time: 15:37
 */

require_once '../sources/ExpenseManager.php';
require_once '../sources/Expense.php';
require_once '../sources/IncomeManager.php';
require_once '../sources/Income.php';
require_once '../sources/Operation.php';
require_once '../sources/User.php';
require_once '../sources/UserSession.php';
require_once '../sources/DatabaseManager.php';

$nbfields = 0;

if (isset($_POST['logNickname']) && !empty($_POST['logNickname']))
{
    $logNickname = $_POST['logNickname'];
    echo "Nickname: ".$logNickname.'<br/>';
    $nbfields++;
}
else
    echo "No match for this nickname <br/>";

if (isset($_POST['logPassword']) && !empty($_POST['logPassword']))
{
    $logPassword = $_POST['logPassword'];
    $logPassword = md5($logPassword);
    echo "logPassword: ".$logPassword.'<br/>';

    $nbfields++;
}
else
    echo "No match for this password<br/>";

if ($nbfields == 2)
{
    $logUser = new DatabaseManager();
    $loggedUser = $logUser->login($logNickname, $logPassword);

    if ($loggedUser != null) {
        $_SESSION['nickname'] = $logNickname;
        $userInfo = new User($loggedUser['userId'],$loggedUser['userNickname'],$loggedUser['userName'],$loggedUser['userFirstName'],$loggedUser['userEmail'],$loggedUser['userBirthdate']);

        $userCalendar = new UserSession($userInfo);
        $userId = $userCalendar->getUser()->getUserId();
        $userIncomes = $userCalendar->getDbmanager()->getAllIncomes($userId);
        $userExpenses = $userCalendar->getDbmanager()->getAllExpenses($userId);

        foreach ($userIncomes as $income)
        {
            $userCalendar->getIncManager()->addIncome($income['incomeId'], $income['incomeDate'], $income['incomeAmount'], $income['incomeType'], $income['incomeDescription']);
        }
        foreach ($userExpenses as $expense)
        {
            $userCalendar->getExpManager()->addExpense($expense['expenseId'], $expense['expenseDate'], $expense['expenseAmount'], $expense['expenseType'], $expense['expenseDescription']);
        }

        $_SESSION['userData'] = serialize($userCalendar);
    }
}
else
{
    echo "Vous n'avez pas rempli tous les champs, merci de recommencer.";
    return false;
}

$userCalendar->DumpData();