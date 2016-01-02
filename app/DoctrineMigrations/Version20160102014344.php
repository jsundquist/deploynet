<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160102014344 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_order_comments ADD user_id INT DEFAULT NULL, DROP author');
        $this->addSql('ALTER TABLE work_order_comments ADD CONSTRAINT FK_9F925D57A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_9F925D57A76ED395 ON work_order_comments (user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_order_comments DROP FOREIGN KEY FK_9F925D57A76ED395');
        $this->addSql('DROP INDEX IDX_9F925D57A76ED395 ON work_order_comments');
        $this->addSql('ALTER TABLE work_order_comments ADD author VARCHAR(255) NOT NULL, DROP user_id');
    }
}
