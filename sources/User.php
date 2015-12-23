<?php
/**
 * Created by PhpStorm.
 * User: Nini
 * Date: 22/12/2015
 * Time: 16:28
 */

class User
{
    protected   $userId,
                $userNickname,
                $userName,
                $userFirstName,
                $userEmail,
                $userBirthdate;

    public function __construct($id, $nickname, $name, $firstName, $email, $birthdate)
    {
        $this->userId = $id;
        $this->userNickname = $nickname;
        $this->userName = $name;
        $this->userFirstName = $firstName;
        $this->userEmail = $email;
        $this->userBirthdate = $birthdate;
    }

    public function DumpData()
    {
        echo "Infos User : <br/>";
        echo "Id is: ".$this->getUserId()."<br />";
        echo "Nickname is: ".$this->getUserNickname()."<br />";
        echo "Name is: ".$this->getUserName()."<br />";
        echo "First name is: ".$this->getUserFirstName()."<br />";
        echo "Email is: ".$this->getUserEmail()."<br />";
        echo "Birthdate is: ".$this->getUserBirthdate()."<br /><br />";
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserNickname()
    {
        return $this->userNickname;
    }

    /**
     * @param mixed $userNickname
     */
    public function setUserNickname($userNickname)
    {
        $this->userNickname = $userNickname;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    /**
     * @param mixed $userFirstName
     */
    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserBirthdate()
    {
        return $this->userBirthdate;
    }

    /**
     * @param mixed $userBirthdate
     */
    public function setUserBirthdate($userBirthdate)
    {
        $this->userBirthdate = $userBirthdate;
    }


}