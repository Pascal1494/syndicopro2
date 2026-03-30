<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260330184759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caisse_conseil DROP FOREIGN KEY `FK_5867060338B55D2`');
        $this->addSql('DROP INDEX IDX_5867060338B55D2 ON caisse_conseil');
        $this->addSql('ALTER TABLE caisse_conseil DROP depenses_id');
        $this->addSql('ALTER TABLE menue_depense ADD caisse_conseil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menue_depense ADD CONSTRAINT FK_D70379F057251F6 FOREIGN KEY (caisse_conseil_id) REFERENCES caisse_conseil (id)');
        $this->addSql('CREATE INDEX IDX_D70379F057251F6 ON menue_depense (caisse_conseil_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caisse_conseil ADD depenses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE caisse_conseil ADD CONSTRAINT `FK_5867060338B55D2` FOREIGN KEY (depenses_id) REFERENCES menue_depense (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5867060338B55D2 ON caisse_conseil (depenses_id)');
        $this->addSql('ALTER TABLE menue_depense DROP FOREIGN KEY FK_D70379F057251F6');
        $this->addSql('DROP INDEX IDX_D70379F057251F6 ON menue_depense');
        $this->addSql('ALTER TABLE menue_depense DROP caisse_conseil_id');
    }
}
