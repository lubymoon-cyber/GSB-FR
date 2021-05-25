<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FraisForfaitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Forfait Etape");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Frais Kilométrique");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Nuitée Hôtel");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Repas Restaurant");
        $manager->persist($fichefrais);
        $manager->flush();

        $manager->flush();
    }
}
