<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260316221346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY `FK_B81291B76C50E4A`');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY `FK_B81291BD8A38199`');
        $this->addSql('ALTER TABLE lot CHANGE proprietaire_id proprietaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BD8A38199 FOREIGN KEY (locataire_id) REFERENCES user (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B76C50E4A');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BD8A38199');
        $this->addSql('ALTER TABLE lot CHANGE proprietaire_id proprietaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT `FK_B81291B76C50E4A` FOREIGN KEY (proprietaire_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT `FK_B81291BD8A38199` FOREIGN KEY (locataire_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
