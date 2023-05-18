<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509072640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour ADD noon_opening_hour INT NOT NULL, ADD noon_closing_hour INT NOT NULL, ADD evening_opening_hour INT DEFAULT NULL, ADD evening_closing_hour INT DEFAULT NULL, DROP opening_hour, DROP closing_hour');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour ADD opening_hour INT NOT NULL, ADD closing_hour INT NOT NULL, DROP noon_opening_hour, DROP noon_closing_hour, DROP evening_opening_hour, DROP evening_closing_hour');
    }
}
