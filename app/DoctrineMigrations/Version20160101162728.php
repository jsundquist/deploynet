<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160101162728 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE visibility (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql("INSERT INTO visibility (`name`) VALUES ('Customer'),('Partner'),('Technician')");
        $this->addSql('CREATE TABLE work_order_documents (id INT AUTO_INCREMENT NOT NULL, fileName VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_order_document_visibility (document_id INT NOT NULL, visibility_id INT NOT NULL, INDEX IDX_D936B6D7C33F7837 (document_id), INDEX IDX_D936B6D7B7157780 (visibility_id), PRIMARY KEY(document_id, visibility_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_order_document_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE work_order_document_visibility ADD CONSTRAINT FK_D936B6D7C33F7837 FOREIGN KEY (document_id) REFERENCES work_order_documents (id)');
        $this->addSql('ALTER TABLE work_order_document_visibility ADD CONSTRAINT FK_D936B6D7B7157780 FOREIGN KEY (visibility_id) REFERENCES visibility (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_order_document_visibility DROP FOREIGN KEY FK_D936B6D7B7157780');
        $this->addSql('ALTER TABLE work_order_document_visibility DROP FOREIGN KEY FK_D936B6D7C33F7837');
        $this->addSql('DROP TABLE visibility');
        $this->addSql('DROP TABLE work_order_documents');
        $this->addSql('DROP TABLE work_order_document_visibility');
        $this->addSql('DROP TABLE work_order_document_type');
    }
}
