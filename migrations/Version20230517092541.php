<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517092541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD apartment_reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495531F41C0C FOREIGN KEY (apartment_reservation_id) REFERENCES apartment (id)');
        $this->addSql('CREATE INDEX IDX_42C8495531F41C0C ON reservation (apartment_reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495531F41C0C');
        $this->addSql('DROP INDEX IDX_42C8495531F41C0C ON reservation');
        $this->addSql('ALTER TABLE reservation DROP apartment_reservation_id');
    }
}
