<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
	private $passwordEncoder;
	
	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}
	
    public function load(ObjectManager $manager)
    {

		$superAdmin = new User();
		
		$superAdmin->setRoles(['ROLE_ADMIN', 'ROLE_SUPER_ADMIN', 'ROLE_COMPTABLE', 'ROLE_COMMERCIAL', 'ROLE_USER']);
		$superAdmin->setEmail('superAdmin@superAdmin.fr');
		$superAdmin->setNom('superAdmin');
		$superAdmin->setPrenom('superAdmin');
		$superAdmin->setAdresse('404ruedessuperAdmin');
		$superAdmin->setVille('superAdmin');
		$superAdmin->setCodePostal('42720');
		$superAdmin->setDateEmbauche(new DateTime());
		$superAdmin->setMatricule('0123456789');
		$superAdmin->setTelephone('0123456789');
		$superAdmin->setPassword($this->passwordEncoder->encodePassword(
			$superAdmin,
			'superAdmin'
		));

		$admin = new User();
		
		$admin->setRoles(['ROLE_ADMIN', 'ROLE_COMPTABLE', 'ROLE_COMMERCIAL', 'ROLE_USER']);
		$admin->setEmail('admin@admin.fr');
		$admin->setNom('admin');
		$admin->setPrenom('admin');
		$admin->setAdresse('404ruedesadmin');
		$admin->setVille('admin');
		$admin->setCodePostal('42720');
		$admin->setDateEmbauche(new DateTime());
		$admin->setMatricule('0123456789');
		$admin->setTelephone('0123456789');
		$admin->setPassword($this->passwordEncoder->encodePassword(
			$admin,
			'admin'
		));

		$comptable = new User();
		
		$comptable->setRoles(['ROLE_COMPTABLE']);
		$comptable->setEmail('comptable@comptable.fr');
		$comptable->setNom('comptable');
		$comptable->setPrenom('comptable');
		$comptable->setAdresse('404ruedescomptable');
		$comptable->setVille('comptable');
		$comptable->setCodePostal('42720');
		$comptable->setDateEmbauche(new DateTime());
		$comptable->setMatricule('0123456789');
		$comptable->setTelephone('0123456789');
		$comptable->setPassword($this->passwordEncoder->encodePassword(
			$comptable,
			'comptable'
		));

		$commercial = new User();
		
		$commercial->setRoles(['ROLE_COMMERCIAL']);
		$commercial->setEmail('commercial@commercial.fr');
		$commercial->setNom('commercial');
		$commercial->setPrenom('commercial');
		$commercial->setAdresse('404ruedescommercial');
		$commercial->setVille('commercial');
		$commercial->setCodePostal('42720');
		$commercial->setDateEmbauche(new DateTime());
		$commercial->setMatricule('0123456789');
		$commercial->setTelephone('0123456789');
		$commercial->setPassword($this->passwordEncoder->encodePassword(
			$commercial,
			'commercial'
		));

		$user = new User();
		
		$user->setRoles(['ROLE_USER']);
		$user->setEmail('user@user.fr');
		$user->setNom('user');
		$user->setPrenom('user');
		$user->setAdresse('404ruedesuser');
		$user->setVille('user');
		$user->setCodePostal('42720');
		$user->setDateEmbauche(new DateTime());
		$user->setMatricule('0123456789');
		$user->setTelephone('0123456789');
		$user->setPassword($this->passwordEncoder->encodePassword(
			$user,
			'user'
		));

		$Villechalane = new User();
		
		$Villechalane->setRoles(['ROLE_USER']);
		$Villechalane->setEmail('lvillechane@lvillechane.fr');
		$Villechalane->setNom('Villechalane');
		$Villechalane->setPrenom('Louis');
		$Villechalane->setAdresse('8 rue des Charmes');
		$Villechalane->setVille('Cahors');
		$Villechalane->setCodePostal('46000');
		$Villechalane->setDateEmbauche(new DateTime());
		$Villechalane->setMatricule('0123456789');
		$Villechalane->setTelephone('0123456789');
		$Villechalane->setPassword($this->passwordEncoder->encodePassword(
			$Villechalane,
			'jux7g'
		));

		$Andre = new User();
		
		$Andre->setRoles(['ROLE_USER']);
		$Andre->setEmail('dandre@dandre.fr');
		$Andre->setNom('Andre');
		$Andre->setPrenom('David');
		$Andre->setAdresse('1 rue Petit');
		$Andre->setVille('Lalbenque');
		$Andre->setCodePostal('46200');
		$Andre->setDateEmbauche(new DateTime());
		$Andre->setMatricule('0123456789');
		$Andre->setTelephone('0123456789');
		$Andre->setPassword($this->passwordEncoder->encodePassword(
			$Andre,
			'oppg5'
		));

		$Bedos = new User();
		
		$Bedos->setRoles(['ROLE_USER']);
		$Bedos->setEmail('cbedos@cbedos.fr');
		$Bedos->setNom('Bedos');
		$Bedos->setPrenom('Christian');
		$Bedos->setAdresse('1 rue Peranud');
		$Bedos->setVille('Montcuq');
		$Bedos->setCodePostal('46250');
		$Bedos->setDateEmbauche(new DateTime());
		$Bedos->setMatricule('0123456789');
		$Bedos->setTelephone('0123456789');
		$Bedos->setPassword($this->passwordEncoder->encodePassword(
			$Bedos,
			'gmhxd'
		));

		$Tusseau = new User();
		
		$Tusseau->setRoles(['ROLE_USER']);
		$Tusseau->setEmail('ltusseau@ltusseau.fr');
		$Tusseau->setNom('Tusseau');
		$Tusseau->setPrenom('Louis');
		$Tusseau->setAdresse('22 rue des Ternes');
		$Tusseau->setVille('Gramat');
		$Tusseau->setCodePostal('46123');
		$Tusseau->setDateEmbauche(new DateTime());
		$Tusseau->setMatricule('0123456789');
		$Tusseau->setTelephone('0123456789');
		$Tusseau->setPassword($this->passwordEncoder->encodePassword(
			$Tusseau,
			'ktp3s'
		));

		$Bentot = new User();
		
		$Bentot->setRoles(['ROLE_USER']);
		$Bentot->setEmail('pbentot@pbentot.fr');
		$Bentot->setNom('Bentot');
		$Bentot->setPrenom('Pascal');
		$Bentot->setAdresse('11 allée du Cerises');
		$Bentot->setVille('Bessines');
		$Bentot->setCodePostal('46512');
		$Bentot->setDateEmbauche(new DateTime());
		$Bentot->setMatricule('0123456789');
		$Bentot->setTelephone('0123456789');
		$Bentot->setPassword($this->passwordEncoder->encodePassword(
			$Bentot,
			'doyw1'
		));

		$Bioret = new User();
		
		$Bioret->setRoles(['ROLE_USER']);
		$Bioret->setEmail('Ibioret@lbioret.fr');
		$Bioret->setNom('Bioret');
		$Bioret->setPrenom('Luc');
		$Bioret->setAdresse('1 avenue gambetta');
		$Bioret->setVille('Cahors');
		$Bioret->setCodePostal('46000');
		$Bioret->setDateEmbauche(new DateTime());
		$Bioret->setMatricule('0123456789');
		$Bioret->setTelephone('0123456789');
		$Bioret->setPassword($this->passwordEncoder->encodePassword(
			$Bioret,
			'hrjfs'
		));

		$Bunisset = new User();
		
		$Bunisset->setRoles(['ROLE_USER']);
		$Bunisset->setEmail('fbunisset@fbunissset.fr');
		$Bunisset->setNom('Bunisset');
		$Bunisset->setPrenom('Francis');
		$Bunisset->setAdresse('10 rue des Perles');
		$Bunisset->setVille('Montreuil');
		$Bunisset->setCodePostal('93100');
		$Bunisset->setDateEmbauche(new DateTime());
		$Bunisset->setMatricule('0123456789');
		$Bunisset->setTelephone('0123456789');
		$Bunisset->setPassword($this->passwordEncoder->encodePassword(
			$Bunisset,
			'4vbnd'
		));

		$bunisset = new User();
		
		$bunisset->setRoles(['ROLE_USER']);
		$bunisset->setEmail('dbunisset@dbunisset.fr');
		$bunisset->setNom('bunisset');
		$bunisset->setPrenom('Denise');
		$bunisset->setAdresse('23 rue Manin');
		$bunisset->setVille('Paris');
		$bunisset->setCodePostal('75019');
		$bunisset->setDateEmbauche(new DateTime());
		$bunisset->setMatricule('0123456789');
		$bunisset->setTelephone('0123456789');
		$bunisset->setPassword($this->passwordEncoder->encodePassword(
			$bunisset,
			's1y1r'
		));

		$Cacheux = new User();
		
		$Cacheux->setRoles(['ROLE_USER']);
		$Cacheux->setEmail('bcacheux@bcacheux.fr');
		$Cacheux->setNom('Cacheux');
		$Cacheux->setPrenom('Bernard');
		$Cacheux->setAdresse('114 rue Blanche');
		$Cacheux->setVille('Paris');
		$Cacheux->setCodePostal('75017');
		$Cacheux->setDateEmbauche(new DateTime());
		$Cacheux->setMatricule('0123456789');
		$Cacheux->setTelephone('0123456789');
		$Cacheux->setPassword($this->passwordEncoder->encodePassword(
			$Cacheux,
			'uf7r3'
		));

		$Cadic = new User();
		
		$Cadic->setRoles(['ROLE_USER']);
		$Cadic->setEmail('ecadic@ecadic.fr');
		$Cadic->setNom('Cadic');
		$Cadic->setPrenom('Eric');
		$Cadic->setAdresse('123 avenue de la République');
		$Cadic->setVille('Paris');
		$Cadic->setCodePostal('75011');
		$Cadic->setDateEmbauche(new DateTime());
		$Cadic->setMatricule('0123456789');
		$Cadic->setTelephone('0123456789');
		$Cadic->setPassword($this->passwordEncoder->encodePassword(
			$Cadic,
			'6u8dc'
		));

		$Charoze = new User();
		
		$Charoze->setRoles(['ROLE_USER']);
		$Charoze->setEmail('ccharoze@ccharoze.fr');
		$Charoze->setNom('Charoze');
		$Charoze->setPrenom('Catherine');
		$Charoze->setAdresse('100 rue Petit');
		$Charoze->setVille('Paris');
		$Charoze->setCodePostal('75019');
		$Charoze->setDateEmbauche(new DateTime());
		$Charoze->setMatricule('0123456789');
		$Charoze->setTelephone('0123456789');
		$Charoze->setPassword($this->passwordEncoder->encodePassword(
			$Charoze,
			'u817o'
		));

		$Clepkens = new User();
		
		$Clepkens->setRoles(['ROLE_USER']);
		$Clepkens->setEmail('cclepkens@cclepkens.fr');
		$Clepkens->setNom('Clepkens');
		$Clepkens->setPrenom('Christophe');
		$Clepkens->setAdresse('12 allée des Anges');
		$Clepkens->setVille('Romainville');
		$Clepkens->setCodePostal('93230');
		$Clepkens->setDateEmbauche(new DateTime());
		$Clepkens->setMatricule('0123456789');
		$Clepkens->setTelephone('0123456789');
		$Clepkens->setPassword($this->passwordEncoder->encodePassword(
			$Clepkens,
			'bw1us'
		));

		$Cottin = new User();
		
		$Cottin->setRoles(['ROLE_USER']);
		$Cottin->setEmail('vcottin@vcottin.fr');
		$Cottin->setNom('Cottin');
		$Cottin->setPrenom('Vincenne');
		$Cottin->setAdresse('36 rue des Roches');
		$Cottin->setVille('Montreuil');
		$Cottin->setCodePostal('93100');
		$Cottin->setDateEmbauche(new DateTime());
		$Cottin->setMatricule('0123456789');
		$Cottin->setTelephone('0123456789');
		$Cottin->setPassword($this->passwordEncoder->encodePassword(
			$Cottin,
			'2hoh9'
		));

		$Daburon = new User();
		
		$Daburon->setRoles(['ROLE_USER']);
		$Daburon->setEmail('fdaburon@fdaburon.fr');
		$Daburon->setNom('Daburon');
		$Daburon->setPrenom('François');
		$Daburon->setAdresse('13 rue Chanzy');
		$Daburon->setVille('Créteil');
		$Daburon->setCodePostal('94000');
		$Daburon->setDateEmbauche(new DateTime());
		$Daburon->setMatricule('0123456789');
		$Daburon->setTelephone('0123456789');
		$Daburon->setPassword($this->passwordEncoder->encodePassword(
			$Daburon,
			'7oqpv'
		));

		$De = new User();
		
		$De->setRoles(['ROLE_USER']);
		$De->setEmail('pde@pde.fr');
		$De->setNom('De');
		$De->setPrenom('Philippe');
		$De->setAdresse('13 rue Barthes');
		$De->setVille('Créteil');
		$De->setCodePostal('94000');
		$De->setDateEmbauche(new DateTime());
		$De->setMatricule('0123456789');
		$De->setTelephone('0123456789');
		$De->setPassword($this->passwordEncoder->encodePassword(
			$De,
			'gk9kx'
		));

		$Debelle = new User();
		
		$Debelle->setRoles(['ROLE_USER']);
		$Debelle->setEmail('mdebelle@mdebelle.fr');
		$Debelle->setNom('Debelle');
		$Debelle->setPrenom('Michel');
		$Debelle->setAdresse('181 avenue Barbusse');
		$Debelle->setVille('Rosny');
		$Debelle->setCodePostal('93210');
		$Debelle->setDateEmbauche(new DateTime());
		$Debelle->setMatricule('0123456789');
		$Debelle->setTelephone('0123456789');
		$Debelle->setPassword($this->passwordEncoder->encodePassword(
			$Debelle,
			'0d5rt'
		));

		$debelle = new User();
		
		$debelle->setRoles(['ROLE_USER']);
		$debelle->setEmail('jdebelle@jdebelle.fr');
		$debelle->setNom('debelle');
		$debelle->setPrenom('Jeanne');
		$debelle->setAdresse('134 allée des Joncs');
		$debelle->setVille('Nantes');
		$debelle->setCodePostal('44000');
		$debelle->setDateEmbauche(new DateTime());
		$debelle->setMatricule('0123456789');
		$debelle->setTelephone('0123456789');
		$debelle->setPassword($this->passwordEncoder->encodePassword(
			$debelle,
			'nvwqq'
		));

		$Debroise = new User();
		
		$Debroise->setRoles(['ROLE_USER']);
		$Debroise->setEmail('mdebroise@mdebroise.fr');
		$Debroise->setNom('Debroise');
		$Debroise->setPrenom('Michel');
		$Debroise->setAdresse('2 Bld Jourdin');
		$Debroise->setVille('Nantes');
		$Debroise->setCodePostal('44000');
		$Debroise->setDateEmbauche(new DateTime());
		$Debroise->setMatricule('0123456789');
		$Debroise->setTelephone('0123456789');
		$Debroise->setPassword($this->passwordEncoder->encodePassword(
			$Debroise,
			'sghkb'
		));

		$Desmarquest = new User();
		
		$Desmarquest->setRoles(['ROLE_USER']);
		$Desmarquest->setEmail('ndesmarquest@ndesmarquest.fr');
		$Desmarquest->setNom('Desmarquest');
		$Desmarquest->setPrenom('Nathalie');
		$Desmarquest->setAdresse('14 Place d Arc');
		$Desmarquest->setVille('Orléans');
		$Desmarquest->setCodePostal('45000');
		$Desmarquest->setDateEmbauche(new DateTime());
		$Desmarquest->setMatricule('0123456789');
		$Desmarquest->setTelephone('0123456789');
		$Desmarquest->setPassword($this->passwordEncoder->encodePassword(
			$Desmarquest,
			'f1fob'
		));

		$Desnot = new User();
		
		$Desnot->setRoles(['ROLE_USER']);
		$Desnot->setEmail('pdesnot@pdesnot.fr');
		$Desnot->setNom('Desnot');
		$Desnot->setPrenom('Pierre');
		$Desnot->setAdresse('16 avenue des Cèdres');
		$Desnot->setVille('Guéret');
		$Desnot->setCodePostal('23200');
		$Desnot->setDateEmbauche(new DateTime());
		$Desnot->setMatricule('0123456789');
		$Desnot->setTelephone('0123456789');
		$Desnot->setPassword($this->passwordEncoder->encodePassword(
			$Desnot,
			'4k2o5'
		));

		$Dudouit = new User();
		
		$Dudouit->setRoles(['ROLE_USER']);
		$Dudouit->setEmail('fdudouit@fdudouit.fr');
		$Dudouit->setNom('Dudouit');
		$Dudouit->setPrenom('Frédéric');
		$Dudouit->setAdresse('18 rue de léglise');
		$Dudouit->setVille('GrandBourg');
		$Dudouit->setCodePostal('23120');
		$Dudouit->setDateEmbauche(new DateTime());
		$Dudouit->setMatricule('0123456789');
		$Dudouit->setTelephone('0123456789');
		$Dudouit->setPassword($this->passwordEncoder->encodePassword(
			$Dudouit,
			'44im8'
		));

		$Duncombe = new User();
		
		$Duncombe->setRoles(['ROLE_USER']);
		$Duncombe->setEmail('cduncombe@cduncombe.fr');
		$Duncombe->setNom('Duncombe');
		$Duncombe->setPrenom('Claude');
		$Duncombe->setAdresse('19 rue de la tour');
		$Duncombe->setVille('La Souterraine');
		$Duncombe->setCodePostal('23100');
		$Duncombe->setDateEmbauche(new DateTime());
		$Duncombe->setMatricule('0123456789');
		$Duncombe->setTelephone('0123456789');
		$Duncombe->setPassword($this->passwordEncoder->encodePassword(
			$Duncombe,
			'qf77j'
		));

		$EnaultPascreau = new User();
		
		$EnaultPascreau->setRoles(['ROLE_USER']);
		$EnaultPascreau->setEmail('cenault@cenault.fr');
		$EnaultPascreau->setNom('EnaultPascreau');
		$EnaultPascreau->setPrenom('Céline');
		$EnaultPascreau->setAdresse('25 place de la gare');
		$EnaultPascreau->setVille('Gueret');
		$EnaultPascreau->setCodePostal('23200');
		$EnaultPascreau->setDateEmbauche(new DateTime());
		$EnaultPascreau->setMatricule('0123456789');
		$EnaultPascreau->setTelephone('0123456789');
		$EnaultPascreau->setPassword($this->passwordEncoder->encodePassword(
			$EnaultPascreau,
			'y2qdu'
		));

		$Eynde = new User();
		
		$Eynde->setRoles(['ROLE_USER']);
		$Eynde->setEmail('veynde@veynde.fr');
		$Eynde->setNom('Eynde');
		$Eynde->setPrenom('Valérie');
		$Eynde->setAdresse('3 Grand Place');
		$Eynde->setVille('Marseille');
		$Eynde->setCodePostal('13015');
		$Eynde->setDateEmbauche(new DateTime());
		$Eynde->setMatricule('0123456789');
		$Eynde->setTelephone('0123456789');
		$Eynde->setPassword($this->passwordEncoder->encodePassword(
			$Eynde,
			'i7sn3'
		));

		$Finck = new User();
		
		$Finck->setRoles(['ROLE_USER']);
		$Finck->setEmail('jfinck@jfinck.fr');
		$Finck->setNom('Finck');
		$Finck->setPrenom('Jacques');
		$Finck->setAdresse('10 avenue du Prado');
		$Finck->setVille('Marseille');
		$Finck->setCodePostal('13002');
		$Finck->setDateEmbauche(new DateTime());
		$Finck->setMatricule('0123456789');
		$Finck->setTelephone('0123456789');
		$Finck->setPassword($this->passwordEncoder->encodePassword(
			$Finck,
			'mbp3t'
		));

		$Fremont = new User();
		
		$Fremont->setRoles(['ROLE_USER']);
		$Fremont->setEmail('ffremont@ffremont.fr');
		$Fremont->setNom('Fremont');
		$Fremont->setPrenom('Fernande');
		$Fremont->setAdresse('4 route de la mer');
		$Fremont->setVille('Allauh');
		$Fremont->setCodePostal('46000');
		$Fremont->setDateEmbauche(new DateTime());
		$Fremont->setMatricule('0123456789');
		$Fremont->setTelephone('0123456789');
		$Fremont->setPassword($this->passwordEncoder->encodePassword(
			$Fremont,
			'xs5tq'
		));

		$Gest = new User();
		
		$Gest->setRoles(['ROLE_USER']);
		$Gest->setEmail('agest@agest.fr');
		$Gest->setNom('Gest');
		$Gest->setPrenom('Alain');
		$Gest->setAdresse('30 avenue de la mer');
		$Gest->setVille('Berre');
		$Gest->setCodePostal('13025');
		$Gest->setDateEmbauche(new DateTime());
		$Gest->setMatricule('0123456789');
		$Gest->setTelephone('0123456789');
		$Gest->setPassword($this->passwordEncoder->encodePassword(
			$Gest,
			'dywvt'
		));

        // $product = new Product();
        // $manager->persist($product);

		$manager->persist($superAdmin);
		$manager->persist($admin);
		$manager->persist($comptable);
		$manager->persist($commercial);
		$manager->persist($user);
		$manager->persist($Villechalane);
		$manager->persist($Andre);
		$manager->persist($Bedos);
		$manager->persist($Tusseau);
		$manager->persist($Bentot);
		$manager->persist($Bioret);
		$manager->persist($Bunisset);
		$manager->persist($bunisset);
		$manager->persist($Cacheux);
		$manager->persist($Cadic);
		$manager->persist($Charoze);
		$manager->persist($Clepkens);
		$manager->persist($Cottin);
		$manager->persist($Daburon);
		$manager->persist($De);
		$manager->persist($Debelle);
		$manager->persist($debelle);
		$manager->persist($Debroise);
		$manager->persist($Desmarquest);
		$manager->persist($Desnot);
		$manager->persist($Dudouit);
		$manager->persist($Duncombe);
		$manager->persist($EnaultPascreau);
		$manager->persist($Eynde);
		$manager->persist($Finck);
		$manager->persist($Fremont);
		$manager->persist($Gest);
		$manager->flush();
    }
}
