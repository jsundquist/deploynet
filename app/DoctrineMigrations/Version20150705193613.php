<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150705193613 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, state_id INT NOT NULL, name VARCHAR(100) NOT NULL, address1 VARCHAR(100) NOT NULL, address2 VARCHAR(100) NOT NULL, address3 VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, postal_code VARCHAR(100) NOT NULL, phone_number VARCHAR(100) NOT NULL, fax_number VARCHAR(100) NOT NULL, active TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_62534E215D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE locations (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, state_id INT NOT NULL, name VARCHAR(100) NOT NULL, site_id VARCHAR(100) NOT NULL, address1 VARCHAR(100) NOT NULL, address2 VARCHAR(100) NOT NULL, address3 VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, postal_code VARCHAR(100) NOT NULL, phone_number VARCHAR(100) NOT NULL, fax_number VARCHAR(100) NOT NULL, active VARCHAR(100) NOT NULL, INDEX IDX_17E64ABA9395C3F3 (customer_id), INDEX IDX_17E64ABA5D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manufacturers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, manufacturer_id INT NOT NULL, part_number VARCHAR(100) NOT NULL, alt_part_number VARCHAR(100) NOT NULL, description VARCHAR(250) NOT NULL, INDEX IDX_B3BA5A5AA23B42D (manufacturer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping_methods (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE states (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, abbreviation VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E215D83CC1 FOREIGN KEY (state_id) REFERENCES states (id)');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABA9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABA5D83CC1 FOREIGN KEY (state_id) REFERENCES states (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AA23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturers (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABA9395C3F3');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA23B42D');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E215D83CC1');
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABA5D83CC1');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE locations');
        $this->addSql('DROP TABLE manufacturers');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE shipping_methods');
        $this->addSql('DROP TABLE states');
    }
}
