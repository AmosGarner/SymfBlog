<?php
/**
 * Created by PhpStorm.
 * User: aagarner
 * Date: 3/15/17
 * Time: 11:04 AM
 */

namespace UserBundle\EventListener;


use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;
use UserBundle\Entity\UserLogin;

class LoginListener
{
    protected $tokenStorage;
    protected $entityManager;

    public function __construct(TokenStorage $tokenStorage, EntityManager $entityManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $userLogin = new userLogin();
        $user = $this->tokenStorage->getToken()->getUser();
        $userLogin->setUserId($user);
        $this->entityManager->persist($userLogin);
    }
}