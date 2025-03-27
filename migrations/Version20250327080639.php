<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327080639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence_stage (id INT AUTO_INCREMENT NOT NULL, nstages_id INT DEFAULT NULL, ncompetencesstages_id INT DEFAULT NULL, INDEX IDX_485EC28F44F8AF11 (nstages_id), INDEX IDX_485EC28F11B648B6 (ncompetencesstages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_stage ADD CONSTRAINT FK_485EC28F44F8AF11 FOREIGN KEY (nstages_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE competence_stage ADD CONSTRAINT FK_485EC28F11B648B6 FOREIGN KEY (ncompetencesstages_id) REFERENCES competence (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_stage DROP FOREIGN KEY FK_485EC28F44F8AF11');
        $this->addSql('ALTER TABLE competence_stage DROP FOREIGN KEY FK_485EC28F11B648B6');
        $this->addSql('DROP TABLE competence_stage');
    }
}
