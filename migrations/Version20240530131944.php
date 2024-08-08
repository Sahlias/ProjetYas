<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530131944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires ADD services_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C4AEF5A6C1 ON commentaires (services_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4AEF5A6C1');
        $this->addSql('DROP INDEX IDX_D9BEC0C4AEF5A6C1 ON commentaires');
        $this->addSql('ALTER TABLE commentaires DROP services_id');
    }
}
