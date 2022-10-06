<?php

namespace App\EventListener;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Entity\User;

class UserListener
{
    private $userPasswordHasher;
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function prePersist(User $user, LifecycleEventArgs $args): void
    {
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'password13'));
    }
}