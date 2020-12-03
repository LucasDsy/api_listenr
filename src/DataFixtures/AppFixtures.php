<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Music;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $passwordEncoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
       $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = null;
        $artist = null;
        $album = null;
        $music = null;

        for($i = 0; $i < 3; $i++) {
            $user = User::create(
                sprintf("Bob%d", $i),
                sprintf("bob%d@gmail.com", $i)
            );

            $user->setPassword($this->passwordEncoder->encodePassword($user, "hello"));
            $manager->persist($user);
        }


        $artist = Artist::create(
            sprintf("Pablo")
        );

        $manager->persist($artist);

        $album = Album::create(
            sprintf("The Ooz"),
            1200,
            $artist
        );

        $manager->persist($album);

        for ($n = 0; $n < 6; $n++) {
            $music = Music::create(
                sprintf("Yamaha%d", $n),
                200,
                $artist,
                $album
            );

            $manager->persist($music);
        }

        $manager->flush();
    }
}
