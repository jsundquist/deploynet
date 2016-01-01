<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160101155001 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE work_order_lines (id INT AUTO_INCREMENT NOT NULL, work_order_id INT DEFAULT NULL, product_id INT NOT NULL, description LONGTEXT DEFAULT NULL, serial_number_in VARCHAR(255) DEFAULT NULL, serial_number_out VARCHAR(255) DEFAULT NULL, order_line_status_id INT NOT NULL, work_preformed LONGTEXT DEFAULT NULL, problem_found LONGTEXT DEFAULT NULL, nri SMALLINT DEFAULT NULL, doa SMALLINT DEFAULT NULL, found_doa SMALLINT DEFAULT NULL, INDEX IDX_D35E18A8582AE764 (work_order_id), INDEX IDX_D35E18A84584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_order_lines ADD CONSTRAINT FK_D35E18A8582AE764 FOREIGN KEY (work_order_id) REFERENCES work_orders (id)');
        $this->addSql('ALTER TABLE work_order_lines ADD CONSTRAINT FK_D35E18A84584665A FOREIGN KEY (product_id) REFERENCES products (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE work_order_lines');
    }
}
