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
		
		$superAdmin->setRoles(['ROLE_ADMIN', 'ROLE_SUPER_ADMIN', 'ROLE_COMPTABLE', 'ROLE_COMMERCIALE', 'ROLE_USER']);
		$superAdmin->setEmail('superAdmin@superAdmin.fr');
		$superAdmin->setLastName('superAdmin');
		$superAdmin->setFirstName('superAdmin');
		$superAdmin->setAddress('404ruedessuperAdmin');
		$superAdmin->setCity('superAdmin');
		$superAdmin->setPostalCode('42720');
		$superAdmin->setHireDate(new DateTime());
		$superAdmin->setRegistrationNumber('0123456789');
		$superAdmin->setPhone('0123456789');
		$superAdmin->setPassword($this->passwordEncoder->encodePassword(
			$superAdmin,
			'superAdmin'
		));

		$admin = new User();
		
		$admin->setRoles(['ROLE_ADMIN', 'ROLE_COMPTABLE', 'ROLE_COMMERCIALE', 'ROLE_USER']);
		$admin->setEmail('admin@admin.fr');
		$admin->setLastName('admin');
		$admin->setFirstName('admin');
		$admin->setAddress('404ruedesadmin');
		$admin->setCity('admin');
		$admin->setPostalCode('42720');
		$admin->setHireDate(new DateTime());
		$admin->setRegistrationNumber('0123456789');
		$admin->setPhone('0123456789');
		$admin->setPassword($this->passwordEncoder->encodePassword(
			$admin,
			'admin'
		));

		$comptable = new User();
		
		$comptable->setRoles(['ROLE_COMPTABLE']);
		$comptable->setEmail('comptable@comptable.fr');
		$comptable->setLastName('comptable');
		$comptable->setFirstName('comptable');
		$comptable->setAddress('404ruedescomptable');
		$comptable->setCity('comptable');
		$comptable->setPostalCode('42720');
		$comptable->setHireDate(new DateTime());
		$comptable->setRegistrationNumber('0123456789');
		$comptable->setPhone('0123456789');
		$comptable->setPassword($this->passwordEncoder->encodePassword(
			$comptable,
			'comptable'
		));

		$commerciale = new User();
		
		$commerciale->setRoles(['ROLE_COMMERCIALE']);
		$commerciale->setEmail('commerciale@commerciale.fr');
		$commerciale->setLastName('commerciale');
		$commerciale->setFirstName('commerciale');
		$commerciale->setAddress('404ruedescommerciale');
		$commerciale->setCity('commerciale');
		$commerciale->setPostalCode('42720');
		$commerciale->setHireDate(new DateTime());
		$commerciale->setRegistrationNumber('0123456789');
		$commerciale->setPhone('0123456789');
		$commerciale->setPassword($this->passwordEncoder->encodePassword(
			$commerciale,
			'commerciale'
		));

		$user = new User();
		
		$user->setEmail('user@user.fr');
		$user->setLastName('user');
		$user->setFirstName('user');
		$user->setAddress('404ruedesuser');
		$user->setCity('user');
		$user->setPostalCode('42720');
		$user->setHireDate(new DateTime());
		$user->setRegistrationNumber('0123456789');
		$user->setPhone('0123456789');
		$user->setPassword($this->passwordEncoder->encodePassword(
			$user,
			'user'
		));

        // $product = new Product();
        // $manager->persist($product);

		$manager->persist($superAdmin);
		$manager->persist($admin);
		$manager->persist($comptable);
		$manager->persist($user);
        $manager->flush();
    }
}
