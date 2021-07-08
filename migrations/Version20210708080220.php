<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210708080220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, phone INT NOT NULL, number_siren INT NOT NULL, number_tva INT NOT NULL, juridic_form VARCHAR(255) NOT NULL, representant_legal VARCHAR(255) NOT NULL, zone VARCHAR(255) NOT NULL, rib INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_company (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, statue VARCHAR(255) NOT NULL, path_doc VARCHAR(255) NOT NULL, date_insert DATE NOT NULL, support_id INT NOT NULL, INDEX IDX_EBD0AF93979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document_company ADD CONSTRAINT FK_EBD0AF93979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE driver ADD company_id INT NOT NULL');
        $this->addSql('ALTER TABLE driver ADD CONSTRAINT FK_11667CD9979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_11667CD9979B1AD6 ON driver (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_company DROP FOREIGN KEY FK_EBD0AF93979B1AD6');
        $this->addSql('ALTER TABLE driver DROP FOREIGN KEY FK_11667CD9979B1AD6');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE document_company');
        $this->addSql('DROP INDEX IDX_11667CD9979B1AD6 ON driver');
        $this->addSql('ALTER TABLE driver DROP company_id');
    }
}
