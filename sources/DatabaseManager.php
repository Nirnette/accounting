<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 23/12/2015
 * Time: 14:02
 */


/**
 * Tables creations :
 * CREATE TABLE accountingUsers (userId int auto_increment, userNickname varchar(40) NOT NULL, userPassword varchar(255) NOT NULL, userName varchar(60) NOT NULL, userFirstName varchar(60) NOT NULL, userEmail varchar(100) NOT NULL, userBirthdate date NOT NULL, primary key (userId));
 * CREATE TABLE accountingAccount (accountId int auto_increment, accountName varchar(60) NOT NULL, userId int NOT NULL, primary key (accountId), foreign key (userId) references accountingUsers(userId));
 * CREATE TABLE accountingExpense (expenseId int auto_increment, expenseAmount
 */

class DatabaseManager
{
    public function connect()
    {
        $pdo = null;
        try {
            $pdo = new PDO(
                'mysql:host=localhost;dbname=nirnettezlkate', 'root', ''
            );
        } catch (PDOException $err) {
            $messageErreur = $err->getMessage();
            error_log($messageErreur, 0);
        }
        return $pdo;
    }

    public function register($nickname, $password, $name, $firstname, $email, $birthdate)
    {
        $pdo = $this->connect();
        if ($pdo == null)
        {
            return false;
        }
        $register = $pdo->prepare('INSERT INTO accountingusers(userNickname, userPassword, userName, userFirstName, userEmail, userBirthdate)
                                  VALUES (:nickname, :password, :name, :firstname, :email, :birthdate)');

        $register->bindValue(':nickname', $nickname, PDO::PARAM_STR);
        $register->bindValue(':password', md5($password), PDO::PARAM_STR);
        $register->bindValue(':name', $name, PDO::PARAM_STR);
        $register->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $register->bindValue(':email', $email, PDO::PARAM_STR);
        $register->bindValue(':birthdate', $birthdate);

        return ($register->execute());

    }

    public function


}