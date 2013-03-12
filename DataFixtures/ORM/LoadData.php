<?php

namespace Martin\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Martin\ExampleMenuBundle\Entity\Menu;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $yml = Yaml::parse('data/menu.yml');
        foreach ($yml as $r) {
            $menu = new Menu();
            $menu->setTitle($r['title']);
            $menu->setContents($r['contents']);
            $manager->persist($menu);
        }
        $manager->flush();

    }
}
