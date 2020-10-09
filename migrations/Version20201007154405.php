<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007154405 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exchange ADD job_interview_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB0795AB508BA FOREIGN KEY (job_interview_id) REFERENCES job_interview (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D33BB0795AB508BA ON exchange (job_interview_id)');
        $this->addSql('ALTER TABLE job_interview DROP FOREIGN KEY FK_8ADD32568AFD1A0');
        $this->addSql('DROP INDEX UNIQ_8ADD32568AFD1A0 ON job_interview');
        $this->addSql('ALTER TABLE job_interview DROP exchange_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB0795AB508BA');
        $this->addSql('DROP INDEX UNIQ_D33BB0795AB508BA ON exchange');
        $this->addSql('ALTER TABLE exchange DROP job_interview_id');
        $this->addSql('ALTER TABLE job_interview ADD exchange_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_interview ADD CONSTRAINT FK_8ADD32568AFD1A0 FOREIGN KEY (exchange_id) REFERENCES exchange (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ADD32568AFD1A0 ON job_interview (exchange_id)');
    }
}
