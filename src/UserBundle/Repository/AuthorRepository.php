<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/22/17
 * Time: 5:22 PM
 */

namespace UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository
{
    public function getAuthors(){
        return $this->getEntityManager()->createQueryBuilder()
            ->select('user.id', 'user.username', 'user.lastLogin')
            ->from('UserBundle:User', 'user')
            ->getQuery()
            ->getArrayResult();
    }
}