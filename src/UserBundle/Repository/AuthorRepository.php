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
            ->select('b.id', 'b.name','b.lastUpdatedDate', 'u.username', 'u.lastLogin')
            ->from('BlogBundle:Blog', 'b')
            ->join('UserBundle:User', 'u')
            ->where('b.isPublished = :published')
            ->andWhere('u.id = b.createdBy')
            ->setParameter('published', true)
            ->orderBy('b.lastUpdatedDate', 'DESC')
            ->groupBy('u')
            ->getQuery()
            ->getArrayResult();
    }
}