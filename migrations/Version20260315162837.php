<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260315162837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, nom_fichier VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, visibilite VARCHAR(50) NOT NULL, copropriete_id INT NOT NULL, createur_id INT NOT NULL, INDEX IDX_D8698A766B07769E (copropriete_id), INDEX IDX_D8698A7673A201E5 (createur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A766B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7673A201E5 FOREIGN KEY (createur_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A766B07769E');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7673A201E5');
        $this->addSql('DROP TABLE document');
    }
}
