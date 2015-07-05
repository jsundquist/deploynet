<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150705212054 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, state_id INT NOT NULL, customer_id INT NOT NULL, location_id INT NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, address1 VARCHAR(100) NOT NULL, address2 VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, postal_code VARCHAR(100) NOT NULL, phone_number VARCHAR(100) NOT NULL, fax_number VARCHAR(100) NOT NULL, cell_number VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, INDEX IDX_334015735D83CC1 (state_id), INDEX IDX_334015739395C3F3 (customer_id), INDEX IDX_3340157364D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_334015735D83CC1 FOREIGN KEY (state_id) REFERENCES states (id)');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_334015739395C3F3 FOREIGN KEY (customer_id) REFERENCES states (id)');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_3340157364D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contacts');
    }
}
