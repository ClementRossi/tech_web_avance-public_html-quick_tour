<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214154925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_B26681EA46BC449 ON evenement');
        $this->addSql('DROP INDEX IDX_B26681EA76ED395 ON evenement');
        $this->addSql('ALTER TABLE evenement DROP evenement_user_id, DROP user_id');
        $this->addSql('ALTER TABLE tournoi ADD gestionnaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF6885AC1B FOREIGN KEY (gestionnaire_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_18AFD9DF6885AC1B ON tournoi (gestionnaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement ADD evenement_user_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_B26681EA46BC449 ON evenement (evenement_user_id)');
        $this->addSql('CREATE INDEX IDX_B26681EA76ED395 ON evenement (user_id)');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF6885AC1B');
        $this->addSql('DROP INDEX IDX_18AFD9DF6885AC1B ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP gestionnaire_id');
    }
}
