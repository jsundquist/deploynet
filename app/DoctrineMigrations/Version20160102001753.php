<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160102001753 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE work_order_comments (id INT AUTO_INCREMENT NOT NULL, work_order_id INT DEFAULT NULL, author VARCHAR(255) NOT NULL, comment_date DATETIME NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_9F925D57582AE764 (work_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_order_comment_visibility (document_id INT NOT NULL, visibility_id INT NOT NULL, INDEX IDX_71F8D059C33F7837 (document_id), INDEX IDX_71F8D059B7157780 (visibility_id), PRIMARY KEY(document_id, visibility_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_order_comments ADD CONSTRAINT FK_9F925D57582AE764 FOREIGN KEY (work_order_id) REFERENCES work_orders (id)');
        $this->addSql('ALTER TABLE work_order_comment_visibility ADD CONSTRAINT FK_71F8D059C33F7837 FOREIGN KEY (document_id) REFERENCES work_order_comments (id)');
        $this->addSql('ALTER TABLE work_order_comment_visibility ADD CONSTRAINT FK_71F8D059B7157780 FOREIGN KEY (visibility_id) REFERENCES visibility (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_order_comment_visibility DROP FOREIGN KEY FK_71F8D059C33F7837');
        $this->addSql('DROP TABLE work_order_comments');
        $this->addSql('DROP TABLE work_order_comment_visibility');
    }
}
