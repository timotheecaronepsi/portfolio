<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327010741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence_projet (id INT AUTO_INCREMENT NOT NULL, nprojets_id INT DEFAULT NULL, ncompetence_id INT DEFAULT NULL, INDEX IDX_19F6F9B5D3D50813 (nprojets_id), INDEX IDX_19F6F9B58CFFF847 (ncompetence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_projet ADD CONSTRAINT FK_19F6F9B5D3D50813 FOREIGN KEY (nprojets_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE competence_projet ADD CONSTRAINT FK_19F6F9B58CFFF847 FOREIGN KEY (ncompetence_id) REFERENCES competence (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_projet DROP FOREIGN KEY FK_19F6F9B5D3D50813');
        $this->addSql('ALTER TABLE competence_projet DROP FOREIGN KEY FK_19F6F9B58CFFF847');
        $this->addSql('DROP TABLE competence_projet');
    }
}
