<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406183021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etat_fiche (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_frais (id INT AUTO_INCREMENT NOT NULL, utilisateur_fiche_frais_id INT NOT NULL, etat_fiche_frais_id INT NOT NULL, nb_justificatif VARCHAR(255) NOT NULL, date_fiche_frais DATETIME NOT NULL, date_creation_fiche_frais DATETIME NOT NULL, date_modification_fiche_frais DATETIME NOT NULL, INDEX IDX_5FC0A6A7DADD6808 (utilisateur_fiche_frais_id), INDEX IDX_5FC0A6A7603FF749 (etat_fiche_frais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais_forfait (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, montant FLOAT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE justificatif (id INT AUTO_INCREMENT NOT NULL, utilisateur_justificatif_id INT NOT NULL, montant FLOAT NOT NULL, date_creation_justificatif DATETIME NOT NULL, date_production_justificatif DATETIME NOT NULL, chemin VARCHAR(255) NOT NULL, INDEX IDX_90D3C5DC5E5C16E7 (utilisateur_justificatif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_frais_forfait (id INT AUTO_INCREMENT NOT NULL, statut_ligne_frais_forfait_id INT NOT NULL, frais_forfait_id INT NOT NULL, utilisateur_ligne_frais_forfait_id INT NOT NULL, date_ligne_frais_forfait DATETIME NOT NULL, quantite INT NOT NULL, date_creation_ligne_frais_forfait DATETIME NOT NULL, INDEX IDX_BD293ECF939393BB (statut_ligne_frais_forfait_id), INDEX IDX_BD293ECF7B70375E (frais_forfait_id), INDEX IDX_BD293ECF78C369D5 (utilisateur_ligne_frais_forfait_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_frais_forfait_justificatif (ligne_frais_forfait_id INT NOT NULL, justificatif_id INT NOT NULL, INDEX IDX_8BDE923DFFC597E1 (ligne_frais_forfait_id), INDEX IDX_8BDE923D4B85A991 (justificatif_id), PRIMARY KEY(ligne_frais_forfait_id, justificatif_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_frais_hors_forfait (id INT AUTO_INCREMENT NOT NULL, statut_ligne_frais_hors_forfait_id INT NOT NULL, utilisateur_ligne_frais_hors_forfait_id INT NOT NULL, hors_classification TINYINT(1) NOT NULL, date_ligne_frais_hors_forfait DATETIME NOT NULL, montant FLOAT NOT NULL, libelle VARCHAR(255) NOT NULL, date_creation_ligne_frais_hors_forfait DATETIME NOT NULL, INDEX IDX_EC01626D5A3A9288 (statut_ligne_frais_hors_forfait_id), INDEX IDX_EC01626D44D5A9F0 (utilisateur_ligne_frais_hors_forfait_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_frais_hors_forfait_justificatif (ligne_frais_hors_forfait_id INT NOT NULL, justificatif_id INT NOT NULL, INDEX IDX_AB6EDDFD682A41C (ligne_frais_hors_forfait_id), INDEX IDX_AB6EDDFD4B85A991 (justificatif_id), PRIMARY KEY(ligne_frais_hors_forfait_id, justificatif_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messagerie (id INT AUTO_INCREMENT NOT NULL, utilisateur_messagerie_id INT NOT NULL, utilisateur_destinataire_messagerie_id INT NOT NULL, utilisateur_expediteur_messagerie_id INT NOT NULL, etat TINYINT(1) NOT NULL, archive TINYINT(1) NOT NULL, objet LONGTEXT NOT NULL, date_message_messagerie DATETIME NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_14E8F60CA7B141B3 (utilisateur_messagerie_id), INDEX IDX_14E8F60CCE028950 (utilisateur_destinataire_messagerie_id), INDEX IDX_14E8F60C16C09275 (utilisateur_expediteur_messagerie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_ligne (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, date_embauche DATETIME NOT NULL, matricule VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_frais ADD CONSTRAINT FK_5FC0A6A7DADD6808 FOREIGN KEY (utilisateur_fiche_frais_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE fiche_frais ADD CONSTRAINT FK_5FC0A6A7603FF749 FOREIGN KEY (etat_fiche_frais_id) REFERENCES etat_fiche (id)');
        $this->addSql('ALTER TABLE justificatif ADD CONSTRAINT FK_90D3C5DC5E5C16E7 FOREIGN KEY (utilisateur_justificatif_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ligne_frais_forfait ADD CONSTRAINT FK_BD293ECF939393BB FOREIGN KEY (statut_ligne_frais_forfait_id) REFERENCES statut_ligne (id)');
        $this->addSql('ALTER TABLE ligne_frais_forfait ADD CONSTRAINT FK_BD293ECF7B70375E FOREIGN KEY (frais_forfait_id) REFERENCES frais_forfait (id)');
        $this->addSql('ALTER TABLE ligne_frais_forfait ADD CONSTRAINT FK_BD293ECF78C369D5 FOREIGN KEY (utilisateur_ligne_frais_forfait_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ligne_frais_forfait_justificatif ADD CONSTRAINT FK_8BDE923DFFC597E1 FOREIGN KEY (ligne_frais_forfait_id) REFERENCES ligne_frais_forfait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_frais_forfait_justificatif ADD CONSTRAINT FK_8BDE923D4B85A991 FOREIGN KEY (justificatif_id) REFERENCES justificatif (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait ADD CONSTRAINT FK_EC01626D5A3A9288 FOREIGN KEY (statut_ligne_frais_hors_forfait_id) REFERENCES statut_ligne (id)');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait ADD CONSTRAINT FK_EC01626D44D5A9F0 FOREIGN KEY (utilisateur_ligne_frais_hors_forfait_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait_justificatif ADD CONSTRAINT FK_AB6EDDFD682A41C FOREIGN KEY (ligne_frais_hors_forfait_id) REFERENCES ligne_frais_hors_forfait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait_justificatif ADD CONSTRAINT FK_AB6EDDFD4B85A991 FOREIGN KEY (justificatif_id) REFERENCES justificatif (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CA7B141B3 FOREIGN KEY (utilisateur_messagerie_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60CCE028950 FOREIGN KEY (utilisateur_destinataire_messagerie_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C16C09275 FOREIGN KEY (utilisateur_expediteur_messagerie_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_frais DROP FOREIGN KEY FK_5FC0A6A7603FF749');
        $this->addSql('ALTER TABLE ligne_frais_forfait DROP FOREIGN KEY FK_BD293ECF7B70375E');
        $this->addSql('ALTER TABLE ligne_frais_forfait_justificatif DROP FOREIGN KEY FK_8BDE923D4B85A991');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait_justificatif DROP FOREIGN KEY FK_AB6EDDFD4B85A991');
        $this->addSql('ALTER TABLE ligne_frais_forfait_justificatif DROP FOREIGN KEY FK_8BDE923DFFC597E1');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait_justificatif DROP FOREIGN KEY FK_AB6EDDFD682A41C');
        $this->addSql('ALTER TABLE ligne_frais_forfait DROP FOREIGN KEY FK_BD293ECF939393BB');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait DROP FOREIGN KEY FK_EC01626D5A3A9288');
        $this->addSql('ALTER TABLE fiche_frais DROP FOREIGN KEY FK_5FC0A6A7DADD6808');
        $this->addSql('ALTER TABLE justificatif DROP FOREIGN KEY FK_90D3C5DC5E5C16E7');
        $this->addSql('ALTER TABLE ligne_frais_forfait DROP FOREIGN KEY FK_BD293ECF78C369D5');
        $this->addSql('ALTER TABLE ligne_frais_hors_forfait DROP FOREIGN KEY FK_EC01626D44D5A9F0');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CA7B141B3');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60CCE028950');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C16C09275');
        $this->addSql('DROP TABLE etat_fiche');
        $this->addSql('DROP TABLE fiche_frais');
        $this->addSql('DROP TABLE frais_forfait');
        $this->addSql('DROP TABLE justificatif');
        $this->addSql('DROP TABLE ligne_frais_forfait');
        $this->addSql('DROP TABLE ligne_frais_forfait_justificatif');
        $this->addSql('DROP TABLE ligne_frais_hors_forfait');
        $this->addSql('DROP TABLE ligne_frais_hors_forfait_justificatif');
        $this->addSql('DROP TABLE messagerie');
        $this->addSql('DROP TABLE statut_ligne');
        $this->addSql('DROP TABLE `user`');
    }
}
