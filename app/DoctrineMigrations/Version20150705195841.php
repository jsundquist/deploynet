<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150705195841 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("INSERT INTO states VALUES(NULL,'Alabama','AL');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Alaska','AK');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Arizona','AZ');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Arkansas','AR');");
        $this->addSql("INSERT INTO states VALUES(NULL,'California','CA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Colorado','CO');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Connecticut','CT');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Delaware','DE');");
        $this->addSql("INSERT INTO states VALUES(NULL,'District of Columbia','DC');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Florida','FL');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Georgia','GA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Hawaii','HI');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Idaho','ID');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Illinois','IL');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Indiana','IN');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Iowa','IA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Kansas','KS');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Kentucky','KY');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Louisiana','LA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Maine','ME');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Maryland','MD');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Massachusetts','MA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Michigan','MI');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Minnesota','MN');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Mississippi','MS');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Missouri','MO');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Montana','MT');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Nebraska','NE');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Nevada','NV');");
        $this->addSql("INSERT INTO states VALUES(NULL,'New Hampshire','NH');");
        $this->addSql("INSERT INTO states VALUES(NULL,'New Jersey','NJ');");
        $this->addSql("INSERT INTO states VALUES(NULL,'New Mexico','NM');");
        $this->addSql("INSERT INTO states VALUES(NULL,'New York','NY');");
        $this->addSql("INSERT INTO states VALUES(NULL,'North Carolina','NC');");
        $this->addSql("INSERT INTO states VALUES(NULL,'North Dakota','ND');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Ohio','OH');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Oklahoma','OK');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Oregon','OR');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Pennsylvania','PA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Rhode Island','RI');");
        $this->addSql("INSERT INTO states VALUES(NULL,'South Carolina','SC');");
        $this->addSql("INSERT INTO states VALUES(NULL,'South Dakota','SD');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Tennessee','TN');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Texas','TX');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Utah','UT');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Vermont','VT');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Virginia','VA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Washington','WA');");
        $this->addSql("INSERT INTO states VALUES(NULL,'West Virginia','WV');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Wisconsin','WI');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Wyoming','WY');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Alberta','AB');");
        $this->addSql("INSERT INTO states VALUES(NULL,'British Columbia','BC');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Manitoba','MB');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Newfoundland','NL');");
        $this->addSql("INSERT INTO states VALUES(NULL,'New Brunswick','NB');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Nova Scotia','NS');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Northwest Territories','NT');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Nunavut','NU');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Ontario','ON');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Prince Edward Island','PE');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Quebec','QC');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Saskatchewan','SK');");
        $this->addSql("INSERT INTO states VALUES(NULL,'Yukon Territory','YT');");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('TRUNCATE TABLE states;');

    }
}
