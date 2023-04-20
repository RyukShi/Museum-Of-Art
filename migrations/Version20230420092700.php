<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230420092700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id SERIAL NOT NULL, display_name VARCHAR(255) NOT NULL, begin_date INT NOT NULL, end_date INT NOT NULL, gender VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, display_bio TEXT DEFAULT NULL, alpha_sort VARCHAR(255) NOT NULL, wikidata_url VARCHAR(400) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE artwork (id SERIAL NOT NULL, object_name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, dimensions VARCHAR(255) NOT NULL, medium VARCHAR(255) NOT NULL, is_highlight BOOLEAN NOT NULL, is_public_domain BOOLEAN NOT NULL, primary_image VARCHAR(400) DEFAULT NULL, primary_image_small VARCHAR(400) DEFAULT NULL, additional_images JSON DEFAULT NULL, accession_year VARCHAR(255) NOT NULL, wikidata_url VARCHAR(400) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE city (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE classification (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE country (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE culture (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dating_artwork (id SERIAL NOT NULL, object_begin_date INT NOT NULL, object_end_date INT NOT NULL, object_date VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dynasty (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE excavation (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE period (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE region (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reign (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE state (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE subregion (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artwork');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE dating_artwork');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE dynasty');
        $this->addSql('DROP TABLE excavation');
        $this->addSql('DROP TABLE period');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE reign');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE subregion');
    }
}
