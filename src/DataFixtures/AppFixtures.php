<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPassowrdHasher)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('rado@test.com');
        $user->setPassword($this->userPassowrdHasher->hashPassword(
            $user, '12345678'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
