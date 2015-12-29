<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 23/12/2015
 * Time: 11:16
 */
require_once 'ExpenseManager.php';
require_once 'IncomeManager.php';
require_once 'User.php';


class UserSession
{
    protected    $user,
                 $expManager,
                 $incManager,
                 $dbmanager;

    public function __construct (User $user)
    {
        $this->user = $user;
        $this->expManager = new ExpenseManager();
        $this->incManager = new IncomeManager();
        $this->dbmanager = new DatabaseManager();
    }

    public function addEntry($typeEntry, $id, $date, $amount, $type, $description, $userId)
    {
        if($typeEntry == "expense")
        {
            $this->expManager->addExpense($id, $date, $amount, $type, $description, $userId);
            $this->dbmanager->addDbExpense($date, $amount, $type, $description, $userId);
        }
        if($typeEntry == "income")
        {
            $this->incManager->addIncome($id, $date, $amount, $type, $description, $userId);
            $this->dbmanager->addDbIncome($date, $amount, $type, $description, $userId);
        }
    }

    public function editEntry($typeEntry, $id, $date, $amount, $type, $description, $userId)
    {
        if($typeEntry == "expense")
        {
            $this->expManager->editExpense($id, $date, $amount, $type, $description, $userId);
            $this->dbmanager->editDbExpense($id, $date, $amount, $type, $description);
        }
        if($typeEntry == "income")
        {
            $this->incManager->editIncome($id, $date, $amount, $type, $description, $userId);
            $this->dbmanager->editDbIncome($id, $date, $amount, $type, $description, $userId);
        }
    }

    public function deleteEntry($typeEntry, $id)
    {
        if($typeEntry == "expense")
        {
            $this->expManager->deleteExpense($id);
            $this->dbmanager->deleteDbExpense($id);
        }
        if($typeEntry == "income")
        {
            $this->incManager->deleteIncome($id);
            $this->dbmanager->deleteDbIncome($id);
        }
    }

    public function DumpData()
    {
        $this->user->DumpData();
        $this->expManager->DumpData();
        $this->incManager->DumpData();
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return ExpenseManager
     */
    public function getExpManager()
    {
        return $this->expManager;
    }

    /**
     * @param ExpenseManager $expManager
     */
    public function setExpManager($expManager)
    {
        $this->expManager = $expManager;
    }

    /**
     * @return IncomeManager
     */
    public function getIncManager()
    {
        return $this->incManager;
    }

    /**
     * @param IncomeManager $incManager
     */
    public function setIncManager($incManager)
    {
        $this->incManager = $incManager;
    }

    /**
     * @return mixed
     */
    public function getDbmanager()
    {
        return $this->dbmanager;
    }

    /**
     * @param mixed $dbmanager
     */
    public function setDbmanager($dbmanager)
    {
        $this->dbmanager = $dbmanager;
    }




}