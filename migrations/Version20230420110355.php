<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230420110355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_artwork (artist_id INT NOT NULL, artwork_id INT NOT NULL, PRIMARY KEY(artist_id, artwork_id))');
        $this->addSql('CREATE INDEX IDX_3F509B41B7970CF8 ON artist_artwork (artist_id)');
        $this->addSql('CREATE INDEX IDX_3F509B41DB8FFA4 ON artist_artwork (artwork_id)');
        $this->addSql('ALTER TABLE artist_artwork ADD CONSTRAINT FK_3F509B41B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artist_artwork ADD CONSTRAINT FK_3F509B41DB8FFA4 FOREIGN KEY (artwork_id) REFERENCES artwork (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD classification_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD city_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD country_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD dynasty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artwork ADD excavation_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD period_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD region_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD reign_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artwork ADD state_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artwork ADD subregion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artwork ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD dating_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD culture_id INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC5762A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC5768BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57681F5867E FOREIGN KEY (dynasty_id) REFERENCES dynasty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57638428BEC FOREIGN KEY (excavation_id) REFERENCES excavation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576EC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57698260155 FOREIGN KEY (region_id) REFERENCES region (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57614C9431B FOREIGN KEY (reign_id) REFERENCES reign (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC5765D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576C49AA6C FOREIGN KEY (subregion_id) REFERENCES subregion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576D5E8D43D FOREIGN KEY (dating_id) REFERENCES dating_artwork (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576B108249D FOREIGN KEY (culture_id) REFERENCES culture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_881FC5762A86559F ON artwork (classification_id)');
        $this->addSql('CREATE INDEX IDX_881FC5768BAC62AF ON artwork (city_id)');
        $this->addSql('CREATE INDEX IDX_881FC576F92F3E70 ON artwork (country_id)');
        $this->addSql('CREATE INDEX IDX_881FC57681F5867E ON artwork (dynasty_id)');
        $this->addSql('CREATE INDEX IDX_881FC57638428BEC ON artwork (excavation_id)');
        $this->addSql('CREATE INDEX IDX_881FC576EC8B7ADE ON artwork (period_id)');
        $this->addSql('CREATE INDEX IDX_881FC57698260155 ON artwork (region_id)');
        $this->addSql('CREATE INDEX IDX_881FC57614C9431B ON artwork (reign_id)');
        $this->addSql('CREATE INDEX IDX_881FC5765D83CC1 ON artwork (state_id)');
        $this->addSql('CREATE INDEX IDX_881FC576C49AA6C ON artwork (subregion_id)');
        $this->addSql('CREATE INDEX IDX_881FC576AE80F5DF ON artwork (department_id)');
        $this->addSql('CREATE INDEX IDX_881FC576D5E8D43D ON artwork (dating_id)');
        $this->addSql('CREATE INDEX IDX_881FC576B108249D ON artwork (culture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE artist_artwork DROP CONSTRAINT FK_3F509B41B7970CF8');
        $this->addSql('ALTER TABLE artist_artwork DROP CONSTRAINT FK_3F509B41DB8FFA4');
        $this->addSql('DROP TABLE artist_artwork');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC5762A86559F');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC5768BAC62AF');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC576F92F3E70');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC57681F5867E');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC57638428BEC');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC576EC8B7ADE');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC57698260155');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC57614C9431B');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC5765D83CC1');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC576C49AA6C');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC576AE80F5DF');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC576D5E8D43D');
        $this->addSql('ALTER TABLE artwork DROP CONSTRAINT FK_881FC576B108249D');
        $this->addSql('DROP INDEX IDX_881FC5762A86559F');
        $this->addSql('DROP INDEX IDX_881FC5768BAC62AF');
        $this->addSql('DROP INDEX IDX_881FC576F92F3E70');
        $this->addSql('DROP INDEX IDX_881FC57681F5867E');
        $this->addSql('DROP INDEX IDX_881FC57638428BEC');
        $this->addSql('DROP INDEX IDX_881FC576EC8B7ADE');
        $this->addSql('DROP INDEX IDX_881FC57698260155');
        $this->addSql('DROP INDEX IDX_881FC57614C9431B');
        $this->addSql('DROP INDEX IDX_881FC5765D83CC1');
        $this->addSql('DROP INDEX IDX_881FC576C49AA6C');
        $this->addSql('DROP INDEX IDX_881FC576AE80F5DF');
        $this->addSql('DROP INDEX IDX_881FC576D5E8D43D');
        $this->addSql('DROP INDEX IDX_881FC576B108249D');
        $this->addSql('ALTER TABLE artwork DROP classification_id');
        $this->addSql('ALTER TABLE artwork DROP city_id');
        $this->addSql('ALTER TABLE artwork DROP country_id');
        $this->addSql('ALTER TABLE artwork DROP dynasty_id');
        $this->addSql('ALTER TABLE artwork DROP excavation_id');
        $this->addSql('ALTER TABLE artwork DROP period_id');
        $this->addSql('ALTER TABLE artwork DROP region_id');
        $this->addSql('ALTER TABLE artwork DROP reign_id');
        $this->addSql('ALTER TABLE artwork DROP state_id');
        $this->addSql('ALTER TABLE artwork DROP subregion_id');
        $this->addSql('ALTER TABLE artwork DROP department_id');
        $this->addSql('ALTER TABLE artwork DROP dating_id');
        $this->addSql('ALTER TABLE artwork DROP culture_id');
    }
}
