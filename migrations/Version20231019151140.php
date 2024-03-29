<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019151140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour CHANGE noon_opening_hour noon_opening_hour INT DEFAULT NULL, CHANGE noon_closing_hour noon_closing_hour INT DEFAULT NULL, CHANGE evening_opening_hour evening_opening_hour INT DEFAULT NULL, CHANGE evening_closing_hour evening_closing_hour INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour CHANGE noon_opening_hour noon_opening_hour TIME DEFAULT NULL, CHANGE noon_closing_hour noon_closing_hour TIME DEFAULT NULL, CHANGE evening_opening_hour evening_opening_hour TIME DEFAULT NULL, CHANGE evening_closing_hour evening_closing_hour TIME DEFAULT NULL');
    }
}
