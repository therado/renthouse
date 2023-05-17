<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517091754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD client_account_id INT NOT NULL, ADD first_name VARCHAR(50) NOT NULL, ADD last_name VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B3F62FB FOREIGN KEY (client_account_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C84955B3F62FB ON reservation (client_account_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B3F62FB');
        $this->addSql('DROP INDEX IDX_42C84955B3F62FB ON reservation');
        $this->addSql('ALTER TABLE reservation DROP client_account_id, DROP first_name, DROP last_name');
    }
}
