<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301080632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD catepro_id INT DEFAULT NULL, ADD supppro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD11A3FBD3 FOREIGN KEY (catepro_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD768DD4D5 FOREIGN KEY (supppro_id) REFERENCES supplier (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD11A3FBD3 ON product (catepro_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD768DD4D5 ON product (supppro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD11A3FBD3');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD768DD4D5');
        $this->addSql('DROP INDEX IDX_D34A04AD11A3FBD3 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD768DD4D5 ON product');
        $this->addSql('ALTER TABLE product DROP catepro_id, DROP supppro_id');
    }
}
