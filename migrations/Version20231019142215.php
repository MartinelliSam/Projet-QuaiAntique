<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019142215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, noon_opening_hour INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dish CHANGE dish_category_id dish_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formula CHANGE menu_id menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opening_hour CHANGE noon_opening_hour noon_opening_hour TIME DEFAULT NULL, CHANGE noon_closing_hour noon_closing_hour TIME DEFAULT NULL, CHANGE evening_opening_hour evening_opening_hour TIME DEFAULT NULL, CHANGE evening_closing_hour evening_closing_hour TIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE dish CHANGE dish_category_id dish_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE formula CHANGE menu_id menu_id INT NOT NULL');
        $this->addSql('ALTER TABLE opening_hour CHANGE noon_opening_hour noon_opening_hour INT DEFAULT NULL, CHANGE noon_closing_hour noon_closing_hour INT DEFAULT NULL, CHANGE evening_opening_hour evening_opening_hour INT DEFAULT NULL, CHANGE evening_closing_hour evening_closing_hour INT DEFAULT NULL');
    }
}
