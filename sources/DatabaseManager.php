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
 * CREATE TABLE accountingExpense (expenseId int auto_increment, expenseAmount int NOT NULL, expenseType varchar(60) NOT NULL, expenseDescription varchar(255), userId int NOT NULL, primary key (expenseId), foreign key (userId) references accountingusers(userId) );
 * CREATE TABLE accountingIncome (incomeId int auto_increment, incomeAmount int NOT NULL, incomeType varchar(60) NOT NULL, incomeDescription varchar(255), userId int NOT NULL, primary key (incomeId), foreign key (userId) references accountingusers(userId));
 *
 *
 *
 * INSERT INTO accountingIncome(incomeAmount,incomeType,incomeDescription, userId) VALUES (10, 'vente LBC', 'Warhammer', 4);
 * INSERT INTO accountingIncome(incomeAmount,incomeType,incomeDescription, userId) VALUES (30, 'vente LBC', 'livre', 4);
 * INSERT INTO accountingIncome(incomeAmount,incomeType,incomeDescription, userId) VALUES (20, 'vente ebay', 'Warhammer', 5);
 * INSERT INTO accountingIncome(incomeAmount,incomeType,incomeDescription, userId) VALUES (1400, 'Salaire', 'Mensuel', 5);
 * INSERT INTO accountingExpense(expenseAmount, expenseType, expenseDescription, userId) VALUES (10, ' repas', 'Macdo', 4);
 * INSERT INTO accountingExpense(expenseAmount, expenseType, expenseDescription, userId) VALUES (50, ' Courses', 'nourriture de la semaine', 4);
 * INSERT INTO accountingExpense(expenseAmount, expenseType, expenseDescription, userId) VALUES (15, ' repas', 'sushis', 5);
 * INSERT INTO accountingExpense(expenseAmount, expenseType, expenseDescription, userId) VALUES (30, ' Loisirs', 'nouvelle souris', 5);
 *
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

    public function login($nickname, $password){
        $pdo = $this->connect();
        if ($pdo != false){
            $sql ="SELECT * from accountingusers where userNickname=:nickname and userPassword=:password";
            $prep = $pdo->prepare($sql);
            $prep->bindParam(":nickname", $nickname,PDO::PARAM_STR);
            $prep->bindParam(":password", $password, PDO::PARAM_STR);
            $prep->execute();
            $resultat= $prep->fetch();
            if ($prep->rowCount() == 1 ){
                $prep->closeCursor();
                return $resultat;
            }
            $prep->closeCursor();


        }
        return null;
    }

    public function getAllExpenses($userId)
    {
        $pdo = $this->connect();
        if ($pdo != false)
        {
            $sql = "SELECT * FROM accountingexpense where userId = :userId";
            $prep = $pdo->prepare($sql);
            $prep->bindParam(':userId', $userId, PDO::PARAM_INT);
            $prep->execute();
            $resultat = $prep->fetchAll();
            $prep->closeCursor();
            return $resultat;
        }

        return null;
    }

    public function getAllIncomes($userId)
    {
        $pdo = $this->connect();
        if ($pdo != false)
        {
            $sql = "SELECT * FROM accountingincome where userId = :userId";
            $prep = $pdo->prepare($sql);
            $prep->bindParam(':userId', $userId, PDO::PARAM_INT);
            $prep->execute();
            $resultat = $prep->fetchAll();
            $prep->closeCursor();
            return $resultat;
        }

        return null;
    }

    public function addDbIncome($date, $amount, $type, $description, $userId)
    {
        $pdo = $this->connect();
        if ($pdo != false)
        {
            $sql = "INSERT INTO accountingincome(incomeDate, incomeAmout, incomeType, incomeDescription, userId) VALUES ( :date, :amount, :type, :description, :userId)";
            $prep = $pdo->prepare($sql);
            $prep->bindValue(':date', $date);
            $prep->bindValue(':amount', $amount, PDO::PARAM_STR);
            $prep->bindValue(':type', $type, PDO::PARAM_STR);
            $prep->bindValue(':description', $description, PDO::PARAM_STR);
            $prep->bindValue(':userId', $userId, PDO::PARAM_STR);
            $prep->execute();
            $prep->closeCursor();

        }
    }

    public function addDbExpense($date, $amount, $type, $description, $userId)
    {
        $pdo = $this->connect();
        if ($pdo != false)
        {
            $sql = "INSERT INTO accountingexpense(incomeDate, incomeAmout, incomeType, incomeDescription, userId) VALUES ( :date, :amount, :type, :description, :userId)";
            $prep = $pdo->prepare($sql);
            $prep->bindValue(':date', $date);
            $prep->bindValue(':amount', $amount, PDO::PARAM_STR);
            $prep->bindValue(':type', $type, PDO::PARAM_STR);
            $prep->bindValue(':description', $description, PDO::PARAM_STR);
            $prep->bindValue(':userId', $userId, PDO::PARAM_STR);
            $prep->execute();
            $prep->closeCursor();

        }
    }

    public function editDbExpense($id, $date, $amount, $type, $description)
    {
        $pdo = $this->connect();
        if ($pdo != false)
        {
            $sql = "UPDATE accountingexpense SET expenseDate = :date, expenseAmount = :amount, expenseType = :type, expenseDescription = :description WHERE expenseId = :id";
            $prep = $pdo->prepare($sql);
            $prep->bindValue(':id', $id, PDO::PARAM_INT);
            $prep->bindValue(':date', $date);
            $prep->bindValue(':amount', $amount, PDO::PARAM_STR);
            $prep->bindValue(':type', $type, PDO::PARAM_STR);
            $prep->bindValue(':description', $description, PDO::PARAM_STR);
            $prep->execute();
            $prep->closeCursor();

        }
    }

    public function editDbIncome($id, $date, $amount, $type, $description)
    {
        $pdo = $this->connect();
        if ($pdo != false)
        {
            $sql = "UPDATE accountingincome SET incomeDate = :date, incomeAmount = :amount, incomeType = :type, incomeDescription = :description WHERE incomeId = :id";
            $prep = $pdo->prepare($sql);
            $prep->bindValue(':id', $id, PDO::PARAM_INT);
            $prep->bindValue(':date', $date);
            $prep->bindValue(':amount', $amount, PDO::PARAM_STR);
            $prep->bindValue(':type', $type, PDO::PARAM_STR);
            $prep->bindValue(':description', $description, PDO::PARAM_STR);
            $prep->execute();
            $prep->closeCursor();

        }
    }

    public function deleteDbIncome($id)
    {
        $pdo = $this->connect();
        if ($pdo != false) {
            $sql = "DELETE FROM accountingincome WHERE incomeId = '" . $id . "' ";
            $prep = $pdo->prepare($sql);
            $prep->execute();
            $prep->closeCursor();
        }
    }

        public function deleteDbExpense($id)
    {
        $pdo = $this->connect();
        if ($pdo != false) {
            $sql = "DELETE FROM accountingexpense WHERE expenseId = '" . $id . "' ";
            $prep = $pdo->prepare($sql);
            $prep->execute();
            $prep->closeCursor();
        }

    }
}