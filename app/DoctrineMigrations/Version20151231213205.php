<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151231213205 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_lines CHANGE description description LONGTEXT DEFAULT NULL, CHANGE serial_number_in serial_number_in VARCHAR(255) DEFAULT NULL, CHANGE serial_number_out serial_number_out VARCHAR(255) DEFAULT NULL, CHANGE work_preformed work_preformed LONGTEXT DEFAULT NULL, CHANGE problem_found problem_found LONGTEXT DEFAULT NULL, CHANGE nri nri SMALLINT DEFAULT NULL, CHANGE doa doa SMALLINT DEFAULT NULL, CHANGE found_doa found_doa SMALLINT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_lines CHANGE description description LONGTEXT NOT NULL, CHANGE serial_number_in serial_number_in VARCHAR(255) NOT NULL, CHANGE serial_number_out serial_number_out VARCHAR(255) NOT NULL, CHANGE work_preformed work_preformed LONGTEXT NOT NULL, CHANGE problem_found problem_found LONGTEXT NOT NULL, CHANGE nri nri SMALLINT NOT NULL, CHANGE doa doa SMALLINT NOT NULL, CHANGE found_doa found_doa SMALLINT NOT NULL');
    }
}
