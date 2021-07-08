<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210708085127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company CHANGE number_siren number_siret INT NOT NULL');
        $this->addSql('ALTER TABLE driver ADD CONSTRAINT FK_11667CD9979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_11667CD9979B1AD6 ON driver (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company CHANGE number_siret number_siren INT NOT NULL');
        $this->addSql('ALTER TABLE driver DROP FOREIGN KEY FK_11667CD9979B1AD6');
        $this->addSql('DROP INDEX IDX_11667CD9979B1AD6 ON driver');
    }
}
