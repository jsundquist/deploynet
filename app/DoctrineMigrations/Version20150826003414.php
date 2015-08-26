<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150826003414 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, location_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, last_access DATETIME NOT NULL, status VARCHAR(100) NOT NULL, INDEX IDX_5C93B3A49395C3F3 (customer_id), INDEX IDX_5C93B3A464D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_orders (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, location_id INT DEFAULT NULL, project_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, status VARCHAR(100) NOT NULL, INDEX IDX_4ED63BCC9395C3F3 (customer_id), INDEX IDX_4ED63BCC64D218E (location_id), INDEX IDX_4ED63BCC166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A49395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A464D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('ALTER TABLE work_orders ADD CONSTRAINT FK_4ED63BCC9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE work_orders ADD CONSTRAINT FK_4ED63BCC64D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('ALTER TABLE work_orders ADD CONSTRAINT FK_4ED63BCC166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE work_orders DROP FOREIGN KEY FK_4ED63BCC166D1F9C');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE work_orders');
    }
}
