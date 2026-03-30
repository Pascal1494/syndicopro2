<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260330115501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY `FK_FEF0481D46B1ABCD`');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481D46B1ABCD FOREIGN KEY (remplacebadge_id) REFERENCES badge (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481D46B1ABCD');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT `FK_FEF0481D46B1ABCD` FOREIGN KEY (remplacebadge_id) REFERENCES badge (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
