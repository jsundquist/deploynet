<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160101185651 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_order_documents ADD work_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE work_order_documents ADD CONSTRAINT FK_8CC473C2582AE764 FOREIGN KEY (work_order_id) REFERENCES work_orders (id)');
        $this->addSql('CREATE INDEX IDX_8CC473C2582AE764 ON work_order_documents (work_order_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_order_documents DROP FOREIGN KEY FK_8CC473C2582AE764');
        $this->addSql('DROP INDEX IDX_8CC473C2582AE764 ON work_order_documents');
        $this->addSql('ALTER TABLE work_order_documents DROP work_order_id');
    }
}
