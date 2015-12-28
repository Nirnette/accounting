<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 23/12/2015
 * Time: 15:12
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



if (isset($_POST['nickname']) && !empty($_POST['nickname']))
{
    $nickname = $_POST['nickname'];
    echo "Nick: ".$nickname.'<br/>';
    $nbfields++;
}
else
    echo "Nickname is missing <br/>";

if (isset($_POST['password']) && !empty($_POST['password']))
{
    $password = $_POST['password'];
    echo "Pw: ".$password.'<br/>';
    $nbfields++;
}
else
    echo "Password is missing <br/>";

if (isset($_POST['name']) && !empty($_POST['name']))
{
    $name = $_POST['name'];
    echo "Name: ".$name.'<br/>';
    $nbfields++;
}
else
    echo "Name is missing <br/>";

if (isset($_POST['firstname']) && !empty($_POST['firstname']))
{
    $firstname = $_POST['firstname'];
    echo "Firstname : ".$firstname.'<br/>';
    $nbfields++;
}
else
    echo "Firstname is missing <br/>";

if (isset($_POST['email']) && !empty($_POST['email']))
{
    $email = $_POST['email'];
    echo "Email: ".$email.'<br/>';
    $nbfields++;
}
else
    echo "Email is missing <br/>";


if (isset($_POST['birthdate']) && !empty($_POST['birthdate'] ))
{
    $birthdate = $_POST['birthdate'];
    if (preg_match('#^[1-3]?[0-9] / [0-1]?[0-9] / [1-2][0-9]{3}^ #', $birthdate))
    {
        echo "Birthdate: ".$birthdate.'<br/>';
        $nbfields++;
    }
    else
    {
        echo "Birthdate is not in dd/mm/yyyy format, pleast try again <br/>";
    }
}
else
    echo "Birthdate is missing <br/>";


if ($nbfields == 6)
{
    $usr = new User($nickname, $password, $name, $firstname, $email, $birthdate);
    $newusr = new UserSession($usr);

    if ($newusr->getDbmanager()->register($nickname, $password, $name, $firstname, $email, $birthdate) == false) {
        echo "Vous n'avez pas pu vous enregistrer";
    } else
    {
        echo "Vous êtes bien enregistré";
        $_SESSION['nickname'] = serialize ($newusr);
    }
}
else
{
    echo "Vous n'avez pas rempli tous les champs, merci de recommencer.";
    return false;
}
