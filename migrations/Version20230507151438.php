<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230507151438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartament ADD reservation_id INT DEFAULT NULL, ADD availability TINYINT(1) NOT NULL, ADD bookable_from DATETIME NOT NULL, ADD bookable_to DATETIME NOT NULL');
        $this->addSql('ALTER TABLE apartament ADD CONSTRAINT FK_551D61F9B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_551D61F9B83297E7 ON apartament (reservation_id)');
        $this->addSql('ALTER TABLE user ADD reservations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D9A7F869 ON user (reservations_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apartament DROP FOREIGN KEY FK_551D61F9B83297E7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D9A7F869');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_8D93D649D9A7F869 ON user');
        $this->addSql('ALTER TABLE user DROP reservations_id');
        $this->addSql('DROP INDEX IDX_551D61F9B83297E7 ON apartament');
        $this->addSql('ALTER TABLE apartament DROP reservation_id, DROP availability, DROP bookable_from, DROP bookable_to');
    }
}
