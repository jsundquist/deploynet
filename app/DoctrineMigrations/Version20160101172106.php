<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160101172106 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_line (id INT AUTO_INCREMENT NOT NULL, order_id INT NOT NULL, product_id INT NOT NULL, problem_reported LONGTEXT NOT NULL, serial_number_in VARCHAR(255) NOT NULL, serial_number_out VARCHAR(255) NOT NULL, order_line_status_id INT NOT NULL, work_preformed LONGTEXT NOT NULL, problem_found LONGTEXT NOT NULL, nri SMALLINT NOT NULL, doa SMALLINT NOT NULL, found_doa SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_orders DROP name, CHANGE project_id project_id INT NOT NULL, CHANGE location_id location_id INT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_line');
        $this->addSql('ALTER TABLE work_orders ADD name VARCHAR(100) NOT NULL, CHANGE project_id project_id INT DEFAULT NULL, CHANGE location_id location_id INT DEFAULT NULL');
    }
}
