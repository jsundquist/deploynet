<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151108140545 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $sqlStatement = 'ALTER TABLE contacts CHANGE location_id location_id int(11) DEFAULT NULL';
        $this->addSql($sqlStatement);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {

    }
}
