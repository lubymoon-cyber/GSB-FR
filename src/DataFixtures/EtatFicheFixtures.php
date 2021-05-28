<?php

namespace App\DataFixtures;

use App\Entity\EtatFiche;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFicheFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $fichefrais = new EtatFiche();
        $fichefrais->setLibelle("Remboursée");
        $manager->persist($fichefrais);
        $manager->flush();
        
        $fichefrais = new EtatFiche();
        $fichefrais->setLibelle("Saisie clôturée");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new EtatFiche();
        $fichefrais->setLibelle("Fiche créée, saisie en cours");
        $manager->persist($fichefrais);
        $manager->flush();

        $fichefrais = new EtatFiche();
        $fichefrais->setLibelle("Validée et mise en paiement");
        $manager->persist($fichefrais);
        $manager->flush();

        $manager->flush();
    }
}
