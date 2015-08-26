<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150826004044 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customers CHANGE address2 address2 VARCHAR(100) DEFAULT NULL, CHANGE address3 address3 VARCHAR(100) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(100) DEFAULT NULL, CHANGE fax_number fax_number VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE locations CHANGE address2 address2 VARCHAR(100) DEFAULT NULL, CHANGE address3 address3 VARCHAR(100) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(100) DEFAULT NULL, CHANGE fax_number fax_number VARCHAR(100) DEFAULT NULL, CHANGE active active TINYINT(1) DEFAULT \'1\' NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customers CHANGE address2 address2 VARCHAR(100) NOT NULL, CHANGE address3 address3 VARCHAR(100) NOT NULL, CHANGE phone_number phone_number VARCHAR(100) NOT NULL, CHANGE fax_number fax_number VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE locations CHANGE address2 address2 VARCHAR(100) NOT NULL, CHANGE address3 address3 VARCHAR(100) NOT NULL, CHANGE phone_number phone_number VARCHAR(100) NOT NULL, CHANGE fax_number fax_number VARCHAR(100) NOT NULL, CHANGE active active VARCHAR(100) NOT NULL');
    }
}
