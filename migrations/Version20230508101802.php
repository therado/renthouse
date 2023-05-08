<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508101802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apartament ADD image_filename1 VARCHAR(255) NOT NULL, ADD image_filename2 VARCHAR(255) NOT NULL, ADD image_filename3 VARCHAR(255) NOT NULL, ADD image_filename4 VARCHAR(255) NOT NULL, ADD image_filename5 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apartament DROP image_filename1, DROP image_filename2, DROP image_filename3, DROP image_filename4, DROP image_filename5');
    }
}
