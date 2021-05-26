<?php

namespace App\DataFixtures;

use App\Entity\FraisForfait;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FraisForfaitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $fichefrais = new FraisForfait();
        $fichefrais->setLibelle("Forfait Etape");
	$fichefrais->setMontant(110);
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FraisForfait();
        $fichefrais->setLibelle("Frais Kilométrique");
	$fichefrais->setMontant(0.62);
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FraisForfait();
        $fichefrais->setLibelle("Nuitée Hôtel");
	$fichefrais->setMontant(80);
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FraisForfait();
        $fichefrais->setLibelle("Repas Restaurant");
	$fichefrais->setMontant(25);
        $manager->persist($fichefrais);
        $manager->flush();

        $manager->flush();
    }
}
