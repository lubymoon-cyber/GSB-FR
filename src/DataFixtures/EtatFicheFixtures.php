<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFicheFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Remboursée");
        $manager->persist($fichefrais);
        $manager->flush();
        
        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Saisie clôturée");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Fiche créée, saisie en cours");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new FicheFrais();
        $fichefrais->setLibelle("Validée et mise en paiement");
        $manager->persist($fichefrais);
        $manager->flush();

        $manager->flush();
    }
}
