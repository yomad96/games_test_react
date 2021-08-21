<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811141645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE objets (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objets_societe (objets_id INT NOT NULL, societe_id INT NOT NULL, INDEX IDX_B8384A456C3A2500 (objets_id), INDEX IDX_B8384A45FCF77503 (societe_id), PRIMARY KEY(objets_id, societe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_19653DBD1E969C5 (utilisateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objets_societe ADD CONSTRAINT FK_B8384A456C3A2500 FOREIGN KEY (objets_id) REFERENCES objets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objets_societe ADD CONSTRAINT FK_B8384A45FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objets_societe DROP FOREIGN KEY FK_B8384A456C3A2500');
        $this->addSql('ALTER TABLE objets_societe DROP FOREIGN KEY FK_B8384A45FCF77503');
        $this->addSql('DROP TABLE objets');
        $this->addSql('DROP TABLE objets_societe');
        $this->addSql('DROP TABLE societe');
    }
}
