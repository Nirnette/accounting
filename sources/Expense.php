<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 11:31
 */

class Expense extends Operation
{
    protected   $expenseType;



    public function __construct($id, $date, $amount, $type, $description)
    {
        $this->expenseType = $type;
        parent::__construct($id, $date, $amount, $description);


    }

    /**
     * @return mixed
     */
    public function getExpenseType()
    {
        return $this->expenseType;
    }

    /**
     * @param mixed $expenseType
     */
    public function setExpenseType($expenseType)
    {
        $this->expenseType = $expenseType;
    }


}