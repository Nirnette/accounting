<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 11:39
 */
require_once 'Operation.php';

class Income extends Operation
{
    protected       $incomeType;


    public function __construct($id, $date, $amount, $type, $description)
    {
        $this->incomeType = $type;
        parent::__construct($id, $date, $amount, $description );
    }

    /**
     * @return mixed
     */
    public function getIncomeType()
    {
        return $this->incomeType;
    }

    /**
     * @param mixed $incomeType
     */
    public function setIncomeType($incomeType)
    {
        $this->incomeType = $incomeType;
    }

    public function DumpData()
    {
        echo "Id is: ".$this->getOperationId()."<br />";
        echo "Date is: ".$this->getOperationDate()."<br />";
        echo "Amount is: ".$this->getOperationAmount()."<br />";
        echo "Type is: ".$this->getIncomeType()."<br />";
        echo "Description is: ".$this->getOperationDescription()."<br /><br />";
    }
}