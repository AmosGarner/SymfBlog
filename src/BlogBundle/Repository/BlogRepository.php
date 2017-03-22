<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/22/17
 * Time: 3:59 PM
 */

namespace BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BlogRepository extends EntityRepository
{

    public function getRecentBlogs(){
        return $this->getEntityManager()->createQueryBuilder()
            ->select('b.id', 'b.name','b.lastUpdatedDate', 'u.username')
            ->from('BlogBundle:Blog', 'b')
            ->join('UserBundle:User', 'u')
            ->where('b.isPublished = :published')
            ->setParameter('published', true)
            ->orderBy('b.lastUpdatedDate', 'DESC')
            ->groupBy('b')
            ->getQuery()
            ->getArrayResult();
    }

}