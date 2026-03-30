<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260330173638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caisse_conseil (id INT AUTO_INCREMENT NOT NULL, montant_initial DOUBLE PRECISION NOT NULL, copropriete_id INT NOT NULL, depenses_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_58670606B07769E (copropriete_id), INDEX IDX_5867060338B55D2 (depenses_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE caisse_conseil ADD CONSTRAINT FK_58670606B07769E FOREIGN KEY (copropriete_id) REFERENCES copropriete (id)');
        $this->addSql('ALTER TABLE caisse_conseil ADD CONSTRAINT FK_5867060338B55D2 FOREIGN KEY (depenses_id) REFERENCES menue_depense (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caisse_conseil DROP FOREIGN KEY FK_58670606B07769E');
        $this->addSql('ALTER TABLE caisse_conseil DROP FOREIGN KEY FK_5867060338B55D2');
        $this->addSql('DROP TABLE caisse_conseil');
    }
}
