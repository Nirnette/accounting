<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 15:31
 */

require_once 'Income.php';

class IncomeManager
{
    protected $inc;


    public function __construct()
    {
        $this->inc = array();
    }

    public function addIncome($id, $date, $amount, $type, $description)
    {
        $newIncome = new Income($id, $date, $amount, $type, $description);
        $this->inc[$newIncome->getOperationId()] = $newIncome;

    }

    public function deleteIncome($id)
    {
        unset($this->inc[$id]);
    }

    public function editIncome($id, $date, $amount, $type, $description)
    {
        $this->inc[$id]->setOperationDate($date);
        $this->inc[$id]->setOperationAmount($amount);
        $this->inc[$id]->setIncomeType($type);
        $this->inc[$id]->setOperationDescription($description);
    }

    public function selectIncome($id)
    {
        return $this->inc[$id];
    }

    public function DumpData()
    {
        foreach( $this->inc as $i)
        {
            $i->DumpData();
        }
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