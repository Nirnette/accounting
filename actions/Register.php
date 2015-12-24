<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 23/12/2015
 * Time: 15:12
 */

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

if (isset($_POST['birthdate']) && !empty($_POST['birthdate']))
{
    $birthdate = $_POST['birthdate'];
    echo "Birthdate: ".$birthdate.'<br/>';
    $nbfields++;
}
else
    echo "Birthdate is missing <br/>";


if ($nbfields != 6)
{
    echo "Vous n'avez pas rempli tous les champs, merci de recommencer.";
    return false;
}
else
{
    $newusr = new DatabaseManager();

    if ($newusr->register($nickname, $password, $name, $firstname, $email, $birthdate) == false) {
        echo "Vous n'avez pas pu vous enregistrer";
    } else
    {
        echo "Vous êtes bien enregistré";
    }
}