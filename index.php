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
require_once 'sources/DatabaseManager.php';

?>

<html>
<head>
    <title>
        Futur site de suivi de dépenses
    </title>
</head>
<body>

<form method="post" action="actions/Register.php">
    <label for="nickname">NickName </label>
    <input type="text" name="nickname" id="nickname" />
    <br />
    <label for="password">password </label>
    <input type="text" name="password" id="password" />
    <br />
    <label for="name">Name</label>
    <input type="text" name="name" id="name" />
    <br />
    <label for="firstname">FirstName</label>
    <input type="text" name="firstname" id="firstname" />
    <br />
    <label for="email">Email</label>
    <input type="email" name="email" id="email" />
    <br />
    <label for="birthdate">Birthdate</label>
    <input type="date" name="birthdate" id="birthdate" />
    <br />
    <input type="submit">
</form>
<br><br>

<form method="post">
    <input type="text" name="logNickname">
    <input type="text" name="logPassword">
    <input type="submit">
</form>

</body>


</html>
