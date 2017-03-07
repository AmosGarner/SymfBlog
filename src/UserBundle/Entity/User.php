<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/7/17
 * Time: 11:26 AM
 */

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}