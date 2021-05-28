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

                commercialsetEmail(commercial@commercial.fr),
                commercialsetNom(commercial),
                commercialsetPrenom(commercial),
                commercialsetAdresse(404ruedescommercial),
                commercialsetVille(commercial),
                commercialsetCodePostal(42720),
                commercialsetDateEmbauche(new DateTime()),
                commercialsetMatricule(0123456789),
                commercialsetTelephone(0123456789),

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