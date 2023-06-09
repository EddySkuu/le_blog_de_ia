<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use App\Entity\Post\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

   

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        //  Users

        $users = [];

        $admin = new User();
        $admin->setFirstName('admin')
            ->setLastName('admin')
            ->setUsername(null)
            ->setEmail('admin@glog-ia.com')
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setPassword('password')
            ->setPlainPassword('password');
    
        $users[] = $admin;
        $manager->persist($admin);

        for ($i=0; $i < 10; $i++) { 
            $user = new User();
            $user->setFirstName($this->faker->firstName())
                ->setLastName($this->faker->lastName())
                ->setUsername(mt_rand(0, 1)===1 ? $this->faker->userName() : null)
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');
            
            $users[] = $user;
            $manager->persist($user);

        }

        for ($i=0; $i < 50 ; $i++) { 
            $post = new Post();
            $post->setTitle($this->faker->words(4, true))
                ->setContent($this->faker->realText(1800))
                ->setState(mt_rand(0, 2) === 1 ? Post::STATES[0] : Post::STATES[1]);

            $manager->persist($post);
        }

        $manager->flush();
    }
}
