<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/8/17
 * Time: 6:35 PM
 */

namespace UserBundle\Entity;


use DateTime;

class UserLogin
{
    private $id;
    private $user_Id;
    private $attempted_datetime;

    /**
     * UserLogin constructor.
     */
    public function __construct()
    {
        $this->attempted_datetime = new DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_Id;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($user_Id)
    {
        $this->user_Id = $user_Id;
    }

    /**
     * @return mixed
     */
    public function getAttemptedDatetime()
    {
        return $this->attempted_datetime;
    }

    /**
     * @param mixed $attempted_datetime
     */
    public function setAttemptedDatetime($attempted_datetime)
    {
        $this->attempted_datetime = $attempted_datetime;
    }

}