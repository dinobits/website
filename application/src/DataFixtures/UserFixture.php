<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // ------------- Admin Admin ------------------
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setPassword('$argon2i$v=19$m=1024,t=2,p=2$T3J2cUczdW5UajBkZm9LOA$lnNXaZIpb8HE57AVYZ5YzpuDwSUeyOBFK5FlzkBBg8U');

        $manager->persist($user);
        $manager->flush();

        // ------- Dinozor --------------
        $user = new User();
        $user->setEmail('dinozor@dinobits.com');
        $user->setPassword('$argon2i$v=19$m=1024,t=2,p=2$T3J2cUczdW5UajBkZm9LOA$lnNXaZIpb8HE57AVYZ5YzpuDwSUeyOBFK5FlzkBBg8U');

        $manager->persist($user);
        $manager->flush();
    }
}
