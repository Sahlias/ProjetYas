<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530131452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservations ADD services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id)');
        $this->addSql('CREATE INDEX IDX_4DA239AEF5A6C1 ON reservations (services_id)');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169D9A7F869');
        $this->addSql('DROP INDEX IDX_7332E169D9A7F869 ON services');
        $this->addSql('ALTER TABLE services DROP reservations_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE services ADD reservations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7332E169D9A7F869 ON services (reservations_id)');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239AEF5A6C1');
        $this->addSql('DROP INDEX IDX_4DA239AEF5A6C1 ON reservations');
        $this->addSql('ALTER TABLE reservations DROP services_id');
    }
}
