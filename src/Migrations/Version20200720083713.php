<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720083713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mouvies_genre DROP FOREIGN KEY FK_65AE29E44296D31F');
        $this->addSql('ALTER TABLE mouvie_list_mouvies DROP FOREIGN KEY FK_59ED8D587EA32444');
        $this->addSql('ALTER TABLE mouvie_list_mouvies DROP FOREIGN KEY FK_59ED8D58B1E266D9');
        $this->addSql('ALTER TABLE mouvies_genre DROP FOREIGN KEY FK_65AE29E4B1E266D9');
        $this->addSql('ALTER TABLE mouvie_list DROP FOREIGN KEY FK_99F8C362A76ED395');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE mouvie_list');
        $this->addSql('DROP TABLE mouvie_list_mouvies');
        $this->addSql('DROP TABLE mouvies');
        $this->addSql('DROP TABLE mouvies_genre');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE application CHANGE comments comments LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, idmoviedb INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mouvie_list (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_99F8C362A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mouvie_list_mouvies (mouvie_list_id INT NOT NULL, mouvies_id INT NOT NULL, INDEX IDX_59ED8D58B1E266D9 (mouvies_id), INDEX IDX_59ED8D587EA32444 (mouvie_list_id), PRIMARY KEY(mouvie_list_id, mouvies_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mouvies (id INT NOT NULL, popularity DOUBLE PRECISION DEFAULT NULL, vote_count INT DEFAULT NULL, video TINYINT(1) DEFAULT NULL, poster_path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, adult TINYINT(1) DEFAULT NULL, backdrop_path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, original_language VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, original_title VARCHAR(1406) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, vote_average DOUBLE PRECISION DEFAULT NULL, overview VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, release_date VARCHAR(12) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, idmoviedb INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mouvies_genre (mouvies_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_65AE29E44296D31F (genre_id), INDEX IDX_65AE29E4B1E266D9 (mouvies_id), PRIMARY KEY(mouvies_id, genre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, birth_date DATE DEFAULT NULL, first_name VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mouvie_list ADD CONSTRAINT FK_99F8C362A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mouvie_list_mouvies ADD CONSTRAINT FK_59ED8D587EA32444 FOREIGN KEY (mouvie_list_id) REFERENCES mouvie_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mouvie_list_mouvies ADD CONSTRAINT FK_59ED8D58B1E266D9 FOREIGN KEY (mouvies_id) REFERENCES mouvies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mouvies_genre ADD CONSTRAINT FK_65AE29E44296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mouvies_genre ADD CONSTRAINT FK_65AE29E4B1E266D9 FOREIGN KEY (mouvies_id) REFERENCES mouvies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application CHANGE comments comments LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
