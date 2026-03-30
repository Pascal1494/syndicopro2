<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260330112125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ascenseur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, marque VARCHAR(100) DEFAULT NULL, en_service TINYINT NOT NULL, reference VARCHAR(100) DEFAULT NULL, batiment_id INT NOT NULL, INDEX IDX_907E8D9DD6F6891B (batiment_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE badge (id INT AUTO_INCREMENT NOT NULL, numero_hexa VARCHAR(50) NOT NULL, status VARCHAR(20) NOT NULL, date_activation DATETIME NOT NULL, motif_remplacement LONGTEXT DEFAULT NULL, date_remplacement DATETIME DEFAULT NULL, lot_id INT NOT NULL, remplacebadge_id INT DEFAULT NULL, couleur_id INT DEFAULT NULL, INDEX IDX_FEF0481DA8CBA5F7 (lot_id), UNIQUE INDEX UNIQ_FEF0481D46B1ABCD (remplacebadge_id), INDEX IDX_FEF0481DC31BA576 (couleur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE batiment (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, nombre_etage INT NOT NULL, as_ascenceur TINYINT NOT NULL, copropriete_id INT NOT NULL, INDEX IDX_F5FAB00C6B07769E (copropriete_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE categorie_depense (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE copropriete (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, code_postal VARCHAR(10) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code_hexa VARCHAR(7) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE depense (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, date_paiement DATETIME NOT NULL, copropriete_id INT NOT NULL, batiment_id INT DEFAULT NULL, categorie_id INT NOT NULL, INDEX IDX_340597576B07769E (copropriete_id), INDEX IDX_34059757D6F6891B (batiment_id), INDEX IDX_34059757BCF5E72D (categorie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, nom_fichier VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, visibilite VARCHAR(50) NOT NULL, copropriete_id INT NOT NULL, createur_id INT NOT NULL, INDEX IDX_D8698A766B07769E (copropriete_id), INDEX IDX_D8698A7673A201E5 (createur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE incident (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, statut VARCHAR(50) NOT NULL, date_creation DATETIME NOT NULL, date_intervention DATETIME DEFAULT NULL, date_resolution DATETIME DEFAULT NULL, commentaire_reparateur LONGTEXT DEFAULT NULL, declarant_id INT NOT NULL, batiment_id INT DEFAULT NULL, INDEX IDX_3D03A11AEC439BC (declarant_id), INDEX IDX_3D03A11AD6F6891B (batiment_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, numero_lot VARCHAR(20) NOT NULL, type VARCHAR(20) NOT NULL, etage INT DEFAULT NULL, porte VARCHAR(20) DEFAULT NULL, tantieme INT DEFAULT NULL, batiment_id INT NOT NULL, parent_lot_id INT DEFAULT NULL, proprietaire_id INT DEFAULT NULL, locataire_id INT DEFAULT NULL, INDEX IDX_B81291BD6F6891B (batiment_id), INDEX IDX_B81291BE7D86631 (parent_lot_id), INDEX IDX_B81291B76C50E4A (proprietaire_id), INDEX IDX_B81291BD8A38199 (locataire_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, nom_fichier VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, batiment_id INT DEFAULT NULL, copropriete_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, badge_id INT DEFAULT NULL, incident_id INT DEFAULT NULL, menue_depense_id INT DEFAULT NULL, INDEX IDX_14B78418D6F6891B (batiment_id), INDEX IDX_14B784186B07769E (copropriete_id), INDEX IDX_14B78418FB88E14F (utilisateur_id), INDEX IDX_14B78418F7A2C2FC (badge_id), INDEX IDX_14B7841859E53FB9 (incident_id), INDEX IDX_14B78418B4712532 (menue_depense_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE prestataire_copropriete (prestataire_id INT NOT NULL, copropriete_id INT NOT NULL, INDEX IDX_384532F9BE3DB2B7 (prestataire_id), INDEX IDX_384532F96B07769E (copropriete_id), PRIMARY KEY (prestataire_id, copropriete_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE stock_badge (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, seuil_alerte INT NOT NULL, copropriete_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_62E054EC6B07769E (copropriete_id), INDEX IDX_62E054ECC31BA576 (couleur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, horaires_gardien LONGTEXT DEFAULT NULL, statut_occupation VARCHAR(255) DEFAULT NULL, is_verified TINYINT NOT NULL, copropriete_id INT DEFAULT NULL, INDEX IDX_8D93D6496B07769E (copropriete_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE ascenseur ADD CONSTRAINT FK_907E8D9DD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481DA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481D46B1ABCD FOREIGN KEY (remplacebadge_id) REFERENCES badge (id)');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481DC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE batiment ADD CONSTRAINT FK_F5FAB00C6B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_340597576B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757D6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_depense (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A766B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7673A201E5 FOREIGN KEY (createur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11AEC439BC FOREIGN KEY (declarant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11AD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BE7D86631 FOREIGN KEY (parent_lot_id) REFERENCES lot (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BD8A38199 FOREIGN KEY (locataire_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418D6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784186B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418F7A2C2FC FOREIGN KEY (badge_id) REFERENCES badge (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841859E53FB9 FOREIGN KEY (incident_id) REFERENCES incident (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418B4712532 FOREIGN KEY (menue_depense_id) REFERENCES menue_depense (id)');
        $this->addSql('ALTER TABLE prestataire_copropriete ADD CONSTRAINT FK_384532F9BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_copropriete ADD CONSTRAINT FK_384532F96B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_badge ADD CONSTRAINT FK_62E054EC6B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE stock_badge ADD CONSTRAINT FK_62E054ECC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE menue_depense ADD CONSTRAINT FK_D70379F096A7BB5F FOREIGN KEY (acheteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE menue_depense ADD CONSTRAINT FK_D70379F06B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ascenseur DROP FOREIGN KEY FK_907E8D9DD6F6891B');
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481DA8CBA5F7');
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481D46B1ABCD');
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481DC31BA576');
        $this->addSql('ALTER TABLE batiment DROP FOREIGN KEY FK_F5FAB00C6B07769E');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_340597576B07769E');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757D6F6891B');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757BCF5E72D');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A766B07769E');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7673A201E5');
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11AEC439BC');
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11AD6F6891B');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BD6F6891B');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BE7D86631');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B76C50E4A');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BD8A38199');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418D6F6891B');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784186B07769E');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418FB88E14F');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418F7A2C2FC');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841859E53FB9');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418B4712532');
        $this->addSql('ALTER TABLE prestataire_copropriete DROP FOREIGN KEY FK_384532F9BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_copropriete DROP FOREIGN KEY FK_384532F96B07769E');
        $this->addSql('ALTER TABLE stock_badge DROP FOREIGN KEY FK_62E054EC6B07769E');
        $this->addSql('ALTER TABLE stock_badge DROP FOREIGN KEY FK_62E054ECC31BA576');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496B07769E');
        $this->addSql('DROP TABLE ascenseur');
        $this->addSql('DROP TABLE badge');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE categorie_depense');
        $this->addSql('DROP TABLE copropriete');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE incident');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataire_copropriete');
        $this->addSql('DROP TABLE stock_badge');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE menue_depense DROP FOREIGN KEY FK_D70379F096A7BB5F');
        $this->addSql('ALTER TABLE menue_depense DROP FOREIGN KEY FK_D70379F06B07769E');
    }
}
