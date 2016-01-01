<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151231210059 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_lines ADD work_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_lines ADD CONSTRAINT FK_CC9FF86B582AE764 FOREIGN KEY (work_order_id) REFERENCES work_orders (id)');
        $this->addSql('CREATE INDEX IDX_CC9FF86B582AE764 ON order_lines (work_order_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_lines DROP FOREIGN KEY FK_CC9FF86B582AE764');
        $this->addSql('DROP INDEX IDX_CC9FF86B582AE764 ON order_lines');
        $this->addSql('ALTER TABLE order_lines DROP work_order_id');
    }
}
