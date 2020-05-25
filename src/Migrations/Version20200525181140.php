<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200525181140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apartments (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, slot_day_price NUMERIC(7, 2) DEFAULT \'0\' NOT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apartments_slots (id INT UNSIGNED AUTO_INCREMENT NOT NULL, apartment_id INT UNSIGNED DEFAULT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_AFC3F3FA176DFE85 (apartment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apartments_slot_reservations (id INT UNSIGNED AUTO_INCREMENT NOT NULL, apartment_slot_id INT UNSIGNED DEFAULT NULL, user_id INT UNSIGNED DEFAULT NULL, reservation_start DATE DEFAULT NULL, reservation_end DATE DEFAULT NULL, reservation_days INT DEFAULT 0 NOT NULL, payment_without_discount NUMERIC(7, 2) DEFAULT \'0\' NOT NULL, payment_with_discount NUMERIC(7, 2) DEFAULT \'0\' NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_3F87AFB0D5D3FF16 (apartment_slot_id), INDEX IDX_3F87AFB0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, first_name VARCHAR(60) NOT NULL, last_name TINYTEXT NOT NULL, email VARCHAR(180) NOT NULL, phone VARCHAR(16) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', password VARCHAR(100) NOT NULL, salt VARCHAR(32) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartments_slots ADD CONSTRAINT FK_AFC3F3FA176DFE85 FOREIGN KEY (apartment_id) REFERENCES apartments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apartments_slot_reservations ADD CONSTRAINT FK_3F87AFB0D5D3FF16 FOREIGN KEY (apartment_slot_id) REFERENCES apartments_slots (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE apartments_slot_reservations ADD CONSTRAINT FK_3F87AFB0A76ED395 FOREIGN KEY (user_id) REFERENCES apartments_slots (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apartments_slots DROP FOREIGN KEY FK_AFC3F3FA176DFE85');
        $this->addSql('ALTER TABLE apartments_slot_reservations DROP FOREIGN KEY FK_3F87AFB0D5D3FF16');
        $this->addSql('ALTER TABLE apartments_slot_reservations DROP FOREIGN KEY FK_3F87AFB0A76ED395');
        $this->addSql('DROP TABLE apartments');
        $this->addSql('DROP TABLE apartments_slots');
        $this->addSql('DROP TABLE apartments_slot_reservations');
        $this->addSql('DROP TABLE users');
    }
}
