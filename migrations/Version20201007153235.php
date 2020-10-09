<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007153235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_interview DROP FOREIGN KEY FK_8ADD3258486F9AC');
        $this->addSql('DROP INDEX UNIQ_8ADD3258486F9AC ON job_interview');
        $this->addSql('ALTER TABLE job_interview DROP date_of_interview, DROP schedule, DROP comments, CHANGE adress_id exchange_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_interview ADD CONSTRAINT FK_8ADD32568AFD1A0 FOREIGN KEY (exchange_id) REFERENCES exchange (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ADD32568AFD1A0 ON job_interview (exchange_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_interview DROP FOREIGN KEY FK_8ADD32568AFD1A0');
        $this->addSql('DROP INDEX UNIQ_8ADD32568AFD1A0 ON job_interview');
        $this->addSql('ALTER TABLE job_interview ADD date_of_interview DATE NOT NULL, ADD schedule TIME NOT NULL, ADD comments LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE exchange_id adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_interview ADD CONSTRAINT FK_8ADD3258486F9AC FOREIGN KEY (adress_id) REFERENCES address (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ADD3258486F9AC ON job_interview (adress_id)');
    }
}
