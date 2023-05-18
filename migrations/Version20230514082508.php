<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230514082508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour ADD test TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', CHANGE noon_opening_hour noon_opening_hour TIME NOT NULL, CHANGE noon_closing_hour noon_closing_hour TIME NOT NULL, CHANGE evening_opening_hour evening_opening_hour TIME NOT NULL, CHANGE evening_closing_hour evening_closing_hour TIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour DROP test, CHANGE noon_opening_hour noon_opening_hour DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE noon_closing_hour noon_closing_hour DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE evening_opening_hour evening_opening_hour DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE evening_closing_hour evening_closing_hour DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
