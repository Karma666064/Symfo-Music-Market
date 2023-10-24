<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024042707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE buying (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, album_id INT NOT NULL, create_by DATETIME NOT NULL, INDEX IDX_BC55CD26A76ED395 (user_id), INDEX IDX_BC55CD261137ABCF (album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE buying ADD CONSTRAINT FK_BC55CD26A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE buying ADD CONSTRAINT FK_BC55CD261137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album CHANGE album_img album_img VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE buying DROP FOREIGN KEY FK_BC55CD26A76ED395');
        $this->addSql('ALTER TABLE buying DROP FOREIGN KEY FK_BC55CD261137ABCF');
        $this->addSql('DROP TABLE buying');
        $this->addSql('ALTER TABLE album CHANGE album_img album_img VARCHAR(255) DEFAULT NULL');
    }
}
