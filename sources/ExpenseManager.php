<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 15:31
 */
require_once 'Expense.php';

class ExpenseManager
{
    protected $inc;


    public function __construct()
    {
        $this->inc = array();
    }

    public function addExpense($id, $date, $amount, $type, $description)
    {
        $newExpense = new Expense($id, $date, $amount, $type, $description);
        $this->inc[$newExpense->getOperationId()] = $newExpense;

    }

    public function deleteExpense($id)
    {
        unset($this->inc[$id]);
    }

    public function editExpense($id, $date, $amount, $type, $description)
    {
        $this->inc[$id]->setOperationDate($date);
        $this->inc[$id]->setOperationAmount($amount);
        $this->inc[$id]->setExpenseType($type);
        $this->inc[$id]->setOperationDescription($description);
    }

    public function selectExpense($id)
    {
        return $this->inc[$id];
    }

    /**
     * @return mixed
     */
    public function getInc()
    {
        return $this->inc;
    }

    /**
     * @param mixed $inc
     */
    public function setInc($inc)
    {
        $this->inc = $inc;
    }

}
