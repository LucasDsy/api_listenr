<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Music;
use App\Entity\Playlist;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\Collection;
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
        $playlist = null;

        $users = [];
        $artists  = [];
        $musics = [];

        /**
         * Create users
         */
        for($i = 0; $i < 10; $i++) {
            $user = User::create(
                sprintf("Bob%d", $i),
                sprintf("bob%d@gmail.com", $i)
            );

            $user->setPassword($this->passwordEncoder->encodePassword($user, "hello"));

            $manager->persist($user);
            $users[] = $user;
        }

        /**
         * Create artists
         */
        for($i = 0; $i < 10; $i++) {
            $artist = Artist::create(
                sprintf("Pablo%d", $i)
            );

            $manager->persist($artist);
            $artists[] = $artist;
        }

        $i = 0;

        /**
         * Create album
         */
        foreach ($artists as $artist) {
            $album = Album::create(
                sprintf("The Ooz %d", $i),
                1200,
                $artist
            );

            /**
             * Add musics on each album
             */
            for ($n = 0; $n < 6; $n++) {
                $music = Music::create(
                    sprintf("Yamaha%d%d", $i, $n),
                    200,
                    $artist,
                    $album
                );

                $manager->persist($music);
                $musics[] = $music;
            }

            $manager->persist($album);
            $i++;
        }

        $i = 0;

        shuffle($users);

        /**
         * Add playlists for users and fill them with music
         */
        foreach (array_slice($users, 0, 4) as $user) {
            shuffle($musics);
            $musics_list = array_slice($musics, 0, 6 );
            $playlist = Playlist::create(
                sprintf("Playlist#%d", $i),
                $user,
            );

            foreach ($musics_list as $music) {
                $playlist->musicAdded($music);
            }

            $user->playlistAdded($playlist);

            $manager->persist($user);
            $manager->persist($playlist);
            $i++;
        }

        shuffle($users);

        /**
         * Add a list of musics liked for users
         */
        foreach (array_slice($users, 0, 4) as $user) {
            shuffle($musics);
            $musics_list = array_slice($musics, 0, 8 );
            foreach ($musics_list as $music) {
                $user->musicLikedAdded($music);
            }
        }

        $manager->flush();
    }
}
