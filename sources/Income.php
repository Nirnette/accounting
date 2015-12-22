<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 11:39
 */

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


}