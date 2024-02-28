<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228140709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', shipped_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', annulation_description LONGTEXT DEFAULT NULL, INDEX IDX_6EEAA67DC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_plat (commande_id INT NOT NULL, plat_id INT NOT NULL, INDEX IDX_4B54A3E482EA2E54 (commande_id), INDEX IDX_4B54A3E4D73DB560 (plat_id), PRIMARY KEY(commande_id, plat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(75) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplément (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplément_plat (supplément_id INT NOT NULL, plat_id INT NOT NULL, INDEX IDX_FA2938F92C928514 (supplément_id), INDEX IDX_FA2938F9D73DB560 (plat_id), PRIMARY KEY(supplément_id, plat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(100) NOT NULL, password LONGTEXT NOT NULL, coordonnée JSON NOT NULL COMMENT \'(DC2Type:json)\', horaire JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commande_plat ADD CONSTRAINT FK_4B54A3E482EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_plat ADD CONSTRAINT FK_4B54A3E4D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE supplément_plat ADD CONSTRAINT FK_FA2938F92C928514 FOREIGN KEY (supplément_id) REFERENCES supplément (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE supplément_plat ADD CONSTRAINT FK_FA2938F9D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE menu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, parent INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC6EE5C49');
        $this->addSql('ALTER TABLE commande_plat DROP FOREIGN KEY FK_4B54A3E482EA2E54');
        $this->addSql('ALTER TABLE commande_plat DROP FOREIGN KEY FK_4B54A3E4D73DB560');
        $this->addSql('ALTER TABLE supplément_plat DROP FOREIGN KEY FK_FA2938F92C928514');
        $this->addSql('ALTER TABLE supplément_plat DROP FOREIGN KEY FK_FA2938F9D73DB560');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_plat');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE supplément');
        $this->addSql('DROP TABLE supplément_plat');
        $this->addSql('DROP TABLE utilisateur');
    }
}
