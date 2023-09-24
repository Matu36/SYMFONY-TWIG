<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924225623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED1062F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED1062A76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED1062C4BC8DEE FOREIGN KEY (sentimental_id) REFERENCES sentimental (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED10625FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A9ED1062F92F3E70 ON portfolio (country_id)');
        $this->addSql('CREATE INDEX IDX_A9ED1062A76ED395 ON portfolio (user_id)');
        $this->addSql('CREATE INDEX IDX_A9ED1062C4BC8DEE ON portfolio (sentimental_id)');
        $this->addSql('CREATE INDEX IDX_A9ED10625FB14BA7 ON portfolio (level_id)');
        $this->addSql('ALTER TABLE usuarios ALTER activo DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER admin DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER created_ad DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE usuarios ALTER activo DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER admin DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER created_ad DROP NOT NULL');
        $this->addSql('ALTER TABLE portfolio DROP CONSTRAINT FK_A9ED1062F92F3E70');
        $this->addSql('ALTER TABLE portfolio DROP CONSTRAINT FK_A9ED1062A76ED395');
        $this->addSql('ALTER TABLE portfolio DROP CONSTRAINT FK_A9ED1062C4BC8DEE');
        $this->addSql('ALTER TABLE portfolio DROP CONSTRAINT FK_A9ED10625FB14BA7');
        $this->addSql('DROP INDEX IDX_A9ED1062F92F3E70');
        $this->addSql('DROP INDEX IDX_A9ED1062A76ED395');
        $this->addSql('DROP INDEX IDX_A9ED1062C4BC8DEE');
        $this->addSql('DROP INDEX IDX_A9ED10625FB14BA7');
    }
}
