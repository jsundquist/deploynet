<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151108135616 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $sqlStatement = 'ALTER TABLE contacts CHANGE address1 address1 VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE address2 address2 VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE city city VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE postal_code postal_code VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE phone_number phone_number VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE fax_number fax_number VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE cell_number cell_number VARCHAR(100) DEFAULT NULL,';
        $sqlStatement .= 'CHANGE email email VARCHAR(100) DEFAULT NULL';

        $this->addSql($sqlStatement);

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
