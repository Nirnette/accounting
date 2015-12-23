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

    public function DumpData()
    {
        echo "Id is: ".$this->getOperationId()."<br />";
        echo "Date is: ".$this->getOperationDate()."<br />";
        echo "Amount is: ".$this->getOperationAmount()."<br />";
        echo "Type is: ".$this->getExpenseType()."<br />";
        echo "Description is: ".$this->getOperationDescription()."<br /><br />";
    }


}