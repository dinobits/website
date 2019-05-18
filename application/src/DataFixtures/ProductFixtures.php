<?php

namespace App\DataFixtures;

use App\Entity\Platform;
use App\Entity\Product;
use App\Entity\ProductInventory;
use App\Entity\ProductType;
use App\Entity\Provider;
use App\Entity\ProviderType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $platform = new Platform();
        $platform->setName('steam');
        $platform->setDescription('This product is available via steam (key activation, download etc)');

        $manager->persist($platform);

        $type = new ProductType();
        $type->setName('game');
        $type->setDescription('Represents all games');

        $manager->persist($type);

        $type = new ProductType();
        $type->setName('software');
        $type->setDescription('Some applications like MS Word or calculator');

        $manager->persist($type);

        $product = new Product();
        $product->setName('Fight\'N Rage');
        $product->setType($type);
        $product->setDescription('Fight’N Rage is a brand new old-school side-scroller beat’em up. Inspired by the classics from the “golden age”, and with an art style that mimics the aesthetic from the 90\'s arcade gems, this game pays homage to all classic gameplay features that makes this genre one of the best from its time! ');
        $product->addPlatform($platform);

        $manager->persist($product);

        $provider_type = new ProviderType();
        $provider_type->setName('store');
        $provider_type->setDescription('Usually webstore where you can buy games or other things cheap. Mostly digitally');

        $manager->persist($provider_type);

        $provider = new Provider();
        $provider->setName('Humble Bundle');
        $provider->setDescription('Humble Bundle allows subscription and cheap games, book etc');
        $provider->setType($provider_type);
        $provider->setUrl('https://www.humblebundle.com/');

        $manager->persist($provider);

        $item = new ProductInventory();
        $item->setProduct($product);
        $item->setProvider($provider);
        $item->setUrl('https://store.steampowered.com/app/674520/FightN_Rage/');
        $item->setComment('Link to steam. Can not find it on Humble Bundle');
        $item->setPlatform($platform);
        $item->setIsActive(true);

        $manager->persist($item);

        $manager->flush();
    }
}
