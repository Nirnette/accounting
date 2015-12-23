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
    protected $exp;


    public function __construct()
    {
        $this->exp = array();
    }

    public function addExpense($id, $date, $amount, $type, $description)
    {
        $newExpense = new Expense($id, $date, $amount, $type, $description);
        $this->exp[$newExpense->getOperationId()] = $newExpense;

    }

    public function deleteExpense($id)
    {
        unset($this->exp[$id]);
    }

    public function editExpense($id, $date, $amount, $type, $description)
    {
        $this->exp[$id]->setOperationDate($date);
        $this->exp[$id]->setOperationAmount($amount);
        $this->exp[$id]->setExpenseType($type);
        $this->exp[$id]->setOperationDescription($description);
    }

    public function selectExpense($id)
    {
        return $this->exp[$id];
    }

    public function DumpData()
    {
        foreach( $this->exp as $e)
        {
            $e->DumpData();
        }
    }

    /**
     * @return mixed
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param mixed $inc
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
    }

}
