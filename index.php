<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 10:34
 */

require_once 'sources/incomeManager.php';
require_once 'sources/Income.php';
require_once 'sources/Operation.php';
require_once 'sources/User.php';
require_once 'sources/UserSession.php';


$manager = new IncomeManager();

$manager->addIncome(1,'22/12/15', 30, 'Loisir', 'Sortie entre amis' );
$manager->addIncome(2,'22/12/15', 30, 'Loisir', 'Sortie entre amis' );
$manager->addIncome(3,'22/12/15', 30, 'Loisir', 'Sortie entre amis' );
$manager->addIncome(4,'22/12/15', 30, 'Loisir', 'Sortie entre amis' );



foreach ($manager->getInc() as $inc)
{
    echo $inc->getOperationId() . "</br>";
}


$manager->deleteIncome(3);

foreach ($manager->getInc() as $inc)
{
    echo $inc->getOperationId() . "</br>";
}

$manager->editIncome(4, '23/12/2015', 25, 'courses', 'nourriture');

$manager->selectIncome(4)->DumpData();

$manager->DumpData();

$usr = new User(1, 'toto', 'KC', 'Kate', 'lachieuse_pro@hotmail.com', '13/05/1985' );

$usrsess = new UserSession($usr);
$usrsess->getIncManager()->addIncome(1,'22/12/15', 200, 'Salaire', '');
$usrsess->getExpManager()->addExpense(1,'22/12/15', 30, 'Loisir', 'Sortie entre amis');


$usrsess->DumpData();
?>

<html>
<head>
    <title>
        Futur site de suivi de dépenses
    </title>
</head>
<body>
Site en construction.
</body>


</html>
