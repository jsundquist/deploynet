<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150826010615 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_334015739395C3F3');
        $this->addSql('ALTER TABLE contacts CHANGE address2 address2 VARCHAR(100) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(100) DEFAULT NULL, CHANGE fax_number fax_number VARCHAR(100) DEFAULT NULL, CHANGE cell_number cell_number VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_334015739395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_334015739395C3F3');
        $this->addSql('ALTER TABLE contacts CHANGE address2 address2 VARCHAR(100) NOT NULL, CHANGE phone_number phone_number VARCHAR(100) NOT NULL, CHANGE fax_number fax_number VARCHAR(100) NOT NULL, CHANGE cell_number cell_number VARCHAR(100) NOT NULL, CHANGE email email VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_334015739395C3F3 FOREIGN KEY (customer_id) REFERENCES states (id)');
    }
}
