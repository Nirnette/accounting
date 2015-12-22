<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 12:03
 */

class Operation
{
    protected   $operationId,
                $operationDate,
                $operationAmount,
                $operationDescription;


    public function __construct($id, $date, $amount, $description)
    {

    }

    /**
     * @return mixed
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @param mixed $operationId
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
    }

    /**
     * @return mixed
     */
    public function getOperationDate()
    {
        return $this->operationDate;
    }

    /**
     * @param mixed $operationDate
     */
    public function setOperationDate($operationDate)
    {
        $this->operationDate = $operationDate;
    }

    /**
     * @return mixed
     */
    public function getOperationAmount()
    {
        return $this->operationAmount;
    }

    /**
     * @param mixed $operationAmount
     */
    public function setOperationAmount($operationAmount)
    {
        $this->operationAmount = $operationAmount;
    }

    /**
     * @return mixed
     */
    public function getOperationDescription()
    {
        return $this->operationDescription;
    }

    /**
     * @param mixed $operationDescription
     */
    public function setOperationDescription($operationDescription)
    {
        $this->operationDescription = $operationDescription;
    }


}