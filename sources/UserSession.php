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
                 $incManager;

    public function __construct (User $user)
    {
        $this->user = $user;
        $this->expManager = new ExpenseManager();
        $this->incManager = new IncomeManager();
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




}