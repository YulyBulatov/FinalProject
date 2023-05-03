<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230503071835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, text LONGTEXT NOT NULL, creation_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_source (article_id INT NOT NULL, source_id INT NOT NULL, INDEX IDX_354DE8F37294869C (article_id), INDEX IDX_354DE8F3953C1C61 (source_id), PRIMARY KEY(article_id, source_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checklist (id INT AUTO_INCREMENT NOT NULL, is_checked TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checklist_document (checklist_id INT NOT NULL, document_id INT NOT NULL, INDEX IDX_856DF6B4B16D08A7 (checklist_id), INDEX IDX_856DF6B4C33F7837 (document_id), PRIMARY KEY(checklist_id, document_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checklist_user (checklist_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B63D3AEB16D08A7 (checklist_id), INDEX IDX_B63D3AEA76ED395 (user_id), PRIMARY KEY(checklist_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_source (document_id INT NOT NULL, source_id INT NOT NULL, INDEX IDX_E1E8CE15C33F7837 (document_id), INDEX IDX_E1E8CE15953C1C61 (source_id), PRIMARY KEY(document_id, source_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendezvous (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, language VARCHAR(50) DEFAULT NULL, question VARCHAR(100) DEFAULT NULL, comment LONGTEXT NOT NULL, is_online TINYINT(1) DEFAULT NULL, creation_date_time DATETIME NOT NULL, rdv_date_time DATETIME DEFAULT NULL, INDEX IDX_C09A9BA8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE source (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, url VARCHAR(100) NOT NULL, consultation_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suggestion (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, name VARCHAR(100) DEFAULT NULL, creation_date_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, is_verified TINYINT(1) DEFAULT NULL, is_subscribed TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_source ADD CONSTRAINT FK_354DE8F37294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_source ADD CONSTRAINT FK_354DE8F3953C1C61 FOREIGN KEY (source_id) REFERENCES source (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE checklist_document ADD CONSTRAINT FK_856DF6B4B16D08A7 FOREIGN KEY (checklist_id) REFERENCES checklist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE checklist_document ADD CONSTRAINT FK_856DF6B4C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE checklist_user ADD CONSTRAINT FK_B63D3AEB16D08A7 FOREIGN KEY (checklist_id) REFERENCES checklist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE checklist_user ADD CONSTRAINT FK_B63D3AEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_source ADD CONSTRAINT FK_E1E8CE15C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_source ADD CONSTRAINT FK_E1E8CE15953C1C61 FOREIGN KEY (source_id) REFERENCES source (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendezvous ADD CONSTRAINT FK_C09A9BA8A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_source DROP FOREIGN KEY FK_354DE8F37294869C');
        $this->addSql('ALTER TABLE article_source DROP FOREIGN KEY FK_354DE8F3953C1C61');
        $this->addSql('ALTER TABLE checklist_document DROP FOREIGN KEY FK_856DF6B4B16D08A7');
        $this->addSql('ALTER TABLE checklist_document DROP FOREIGN KEY FK_856DF6B4C33F7837');
        $this->addSql('ALTER TABLE checklist_user DROP FOREIGN KEY FK_B63D3AEB16D08A7');
        $this->addSql('ALTER TABLE checklist_user DROP FOREIGN KEY FK_B63D3AEA76ED395');
        $this->addSql('ALTER TABLE document_source DROP FOREIGN KEY FK_E1E8CE15C33F7837');
        $this->addSql('ALTER TABLE document_source DROP FOREIGN KEY FK_E1E8CE15953C1C61');
        $this->addSql('ALTER TABLE rendezvous DROP FOREIGN KEY FK_C09A9BA8A76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_source');
        $this->addSql('DROP TABLE checklist');
        $this->addSql('DROP TABLE checklist_document');
        $this->addSql('DROP TABLE checklist_user');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_source');
        $this->addSql('DROP TABLE rendezvous');
        $this->addSql('DROP TABLE source');
        $this->addSql('DROP TABLE suggestion');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
