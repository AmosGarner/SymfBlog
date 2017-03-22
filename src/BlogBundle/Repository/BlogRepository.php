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
            ->select('b')
            ->from('BlogBundle:Blog', 'b')
            ->where('b.isPublished = :published')
            ->setParameter('published', true)
            ->orderBy('b.lastUpdatedDate', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }

}