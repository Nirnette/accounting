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

    if ($logUser->login($logNickname, $logPassword) != false) {
        $_SESSION['nickname'] = $logNickname;
    }
}
else
{
    echo "Vous n'avez pas rempli tous les champs, merci de recommencer.";
    return false;
}

