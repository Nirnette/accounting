<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 11:42
 */

class Calculations
{

// Opération pour obtenir le total de dépenses journalier
// Operation to get daily expenses total
    public function dayTotal($date, $expense)
    {
        $total = 0;
        foreach ($expense->getOperationDate() as $d )
        {
            if ($d == $date)
            {
                $total += $expense;
            }
        }

        return $total;
    }

    // opération pour obtenir le total de dépenses hebdomadaire
    // Operation to get weekly expenses total
    public function weekTotal($week, $expense)
    {
        $total = 0;
        foreach ($expense->getOperationDate() as $w )
        {
            if ($w == $week)
            {
                $total += $expense;
            }
        }

        return $total;

    }

    // opération pour obtenir le total de dépenses mensuel
    // Operation to get monthly expenses total
    public function monthTotal($month, $expense)
    {
        $total = 0;
        foreach ($expense->getOperationDate() as $m )
        {
            if ($m == $month)
            {
                $total += $expense;
            }
        }

        return $total;

    }


    // Operation pour calculer le total hebdomadaire pour un type de dépense
    // Operation to get the weekly total for one type of expense
    public function typeWeekTotal($week, $type , $expense)
    {
        $total = 0;
        foreach ($expense->getOperationDate() as $w )
        {
            if ($w == $week && $expense->getExpenseType() == $type )
            {
                $total += $expense;
            }
        }

        return $total;
    }

    // Operation pour calculer le total mensuel pour un type de dépense
    // Operation to get the monthly total for one type of expense
    public function typeMonthTotal($month, $type, $expense)
    {
        $total = 0;
        foreach ($expense->getOperationDate() as $m )
        {
            if ($m == $month && $expense->getExpenseType() == $type )
            {
                $total += $expense;
            }
        }

        return $total;
    }

}