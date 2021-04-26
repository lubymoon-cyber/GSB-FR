<?php

namespace App\Repository;

class PostRepository
{   
    public function toto(): array
    {
        return ['
                superAdminsetEmail(superAdmin@superAdmin.fr),
                superAdminsetNom(superAdmin),
                superAdminsetPrenom(superAdmin),
                superAdminsetAdresse(404ruedessuperAdmin),
                superAdminsetVille(superAdmin),
                superAdminsetCodePostal(42720),
                superAdminsetDateEmbauche(new DateTime()),
                superAdminsetMatricule(0123456789),
                superAdminsetTelephone(0123456789),
                
                adminsetEmail(admin@admin.fr),
                adminsetNom(admin),
                adminsetPrenom(admin),
                adminsetAdresse(404ruedesadmin),
                adminsetVille(admin),
                adminsetCodePostal(42720),
                adminsetDateEmbauche(new DateTime()),
                adminsetMatricule(0123456789),
                adminsetTelephone(0123456789),
        
                comptablesetEmail(comptable@comptable.fr),
                comptablesetNom(comptable),
                comptablesetPrenom(comptable),
                comptablesetAdresse(404ruedescomptable),
                comptablesetVille(comptable),
                comptablesetCodePostal(42720),
                comptablesetDateEmbauche(new DateTime()),
                comptablesetMatricule(0123456789),
                comptablesetTelephone(0123456789),

                commercialesetEmail(commerciale@commerciale.fr),
                commercialesetNom(commerciale),
                commercialesetPrenom(commerciale),
                commercialesetAdresse(404ruedescommerciale),
                commercialesetVille(commerciale),
                commercialesetCodePostal(42720),
                commercialesetDateEmbauche(new DateTime()),
                commercialesetMatricule(0123456789),
                commercialesetTelephone(0123456789),

                usersetEmail(user@user.fr),
                usersetNom(user),
                usersetPrenom(user),
                usersetAdresse(404ruedesuser),
                usersetVille(user),
                usersetCodePostal(42720),
                usersetDateEmbauche(new DateTime()),
                usersetMatricule(0123456789),
                usersetTelephone(0123456789),
            '];
    }
}