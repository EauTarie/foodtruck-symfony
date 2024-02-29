<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229083935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD email VARCHAR(180) NOT NULL, DROP mail, DROP horaire, CHANGE password password VARCHAR(255) NOT NULL, CHANGE coordonnée roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD mail VARCHAR(100) NOT NULL, ADD horaire JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', DROP email, CHANGE password password LONGTEXT NOT NULL, CHANGE roles coordonnée JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
