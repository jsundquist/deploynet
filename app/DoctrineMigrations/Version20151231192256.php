<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151231192256 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products ADD serialized TINYINT(1) DEFAULT \'1\' NOT NULL');
        $this->addSql('ALTER TABLE work_orders DROP FOREIGN KEY FK_4ED63BCC9395C3F3');
        $this->addSql('DROP INDEX IDX_4ED63BCC9395C3F3 ON work_orders');
        $this->addSql('ALTER TABLE work_orders DROP customer_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products DROP serialized');
        $this->addSql('ALTER TABLE work_orders ADD customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE work_orders ADD CONSTRAINT FK_4ED63BCC9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('CREATE INDEX IDX_4ED63BCC9395C3F3 ON work_orders (customer_id)');
    }
}
