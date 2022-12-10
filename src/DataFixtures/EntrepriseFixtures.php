<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $poleDevelpoment = new Entreprise();
        $poleDevelpoment->setDepartment('Développement');
        $poleDevelpoment->setEmail('development@development.com');
        $manager->persist($poleDevelpoment);
        $manager->flush();

        $poleDirectory = new Entreprise();
        $poleDirectory->setDepartment('Direction');
        $poleDirectory->setEmail('directory@directory.com');
        $manager->persist($poleDirectory);
        $manager->flush();

        $poleRH = new Entreprise();
        $poleRH->setDepartment('RH');
        $poleRH->setEmail('rh@rh.com');
        $manager->persist($poleRH);
        $manager->flush();

        $poleCommunication = new Entreprise();
        $poleCommunication->setDepartment('Communication');
        $poleCommunication->setEmail('communication@communication.com');
        $manager->persist($poleCommunication);
        $manager->flush();

        $poleMarketing = new Entreprise();
        $poleMarketing->setDepartment('Marketing');
        $poleMarketing->setEmail('marketing@marketing.com');
        $manager->persist($poleMarketing);
        $manager->flush();
    }
}
