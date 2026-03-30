<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260315133835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menue_depense (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, fournisseur VARCHAR(255) DEFAULT NULL, date_achat DATE NOT NULL, description_usage LONGTEXT DEFAULT NULL, prix_unitaire_ht DOUBLE PRECISION DEFAULT NULL, prix_unitaire_ttc DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, total_ttc DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, acheteur_id INT DEFAULT NULL, copropriete_id INT NOT NULL, INDEX IDX_D70379F096A7BB5F (acheteur_id), INDEX IDX_D70379F06B07769E (copropriete_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE menue_depense ADD CONSTRAINT FK_D70379F096A7BB5F FOREIGN KEY (acheteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE menue_depense ADD CONSTRAINT FK_D70379F06B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE photo ADD menue_depense_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418B4712532 FOREIGN KEY (menue_depense_id) REFERENCES menue_depense (id)');
        $this->addSql('CREATE INDEX IDX_14B78418B4712532 ON photo (menue_depense_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menue_depense DROP FOREIGN KEY FK_D70379F096A7BB5F');
        $this->addSql('ALTER TABLE menue_depense DROP FOREIGN KEY FK_D70379F06B07769E');
        $this->addSql('DROP TABLE menue_depense');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418B4712532');
        $this->addSql('DROP INDEX IDX_14B78418B4712532 ON photo');
        $this->addSql('ALTER TABLE photo DROP menue_depense_id');
    }
}
