<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221006081428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5EFB9C8A5');
        $this->addSql('ALTER TABLE user_association DROP FOREIGN KEY FK_549EE859EFB9C8A5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497A45358C');
        $this->addSql('ALTER TABLE entry DROP FOREIGN KEY FK_2B219D70B4A3A775');
        $this->addSql('ALTER TABLE entry DROP FOREIGN KEY FK_2B219D70A76ED395');
        $this->addSql('ALTER TABLE user_association DROP FOREIGN KEY FK_549EE859A76ED395');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE entry');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE type_collection_fond');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_association');
        $this->addSql('DROP TABLE vola');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, code VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE entry (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type_collection_fond_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, description LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, date DATETIME NOT NULL, type VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX IDX_2B219D70B4A3A775 (type_collection_fond_id), INDEX IDX_2B219D70A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, association_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX IDX_6DC044C5EFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_collection_fond (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, groupe_id INT DEFAULT NULL, username VARCHAR(180) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, roles LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, firstname VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, lastname VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, address VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, phone_number VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D6497A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_association (user_id INT NOT NULL, association_id INT NOT NULL, INDEX IDX_549EE859EFB9C8A5 (association_id), INDEX IDX_549EE859A76ED395 (user_id), PRIMARY KEY(user_id, association_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vola (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION NOT NULL, description LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, date DATETIME NOT NULL, type VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entry ADD CONSTRAINT FK_2B219D70B4A3A775 FOREIGN KEY (type_collection_fond_id) REFERENCES type_collection_fond (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE user_association ADD CONSTRAINT FK_549EE859A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_association ADD CONSTRAINT FK_549EE859EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id) ON DELETE CASCADE');
    }
}
