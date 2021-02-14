<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210214024007 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD post_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C4B89032C ON comment (post_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('ALTER TABLE `like` ADD user_id INT NOT NULL, ADD comment_id INT DEFAULT NULL, ADD post_id INT NOT NULL');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B34B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3A76ED395 ON `like` (user_id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3F8697D13 ON `like` (comment_id)');
        $this->addSql('CREATE INDEX IDX_AC6340B34B89032C ON `like` (post_id)');
        $this->addSql('ALTER TABLE meeting ADD manager_id INT NOT NULL, ADD athelete_id INT NOT NULL, ADD creation_date DATE NOT NULL');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E139783E3463 FOREIGN KEY (manager_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E139F74AB5F1 FOREIGN KEY (athelete_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F515E139783E3463 ON meeting (manager_id)');
        $this->addSql('CREATE INDEX IDX_F515E139F74AB5F1 ON meeting (athelete_id)');
        $this->addSql('ALTER TABLE notification ADD user_id INT NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD id_type INT NOT NULL, ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BF5476CAA76ED395 ON notification (user_id)');
        $this->addSql('ALTER TABLE post ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD user_id INT NOT NULL, ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CE606404A76ED395 ON reclamation (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4B89032C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526C4B89032C ON comment');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('ALTER TABLE comment DROP post_id, DROP user_id');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3A76ED395');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3F8697D13');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B34B89032C');
        $this->addSql('DROP INDEX IDX_AC6340B3A76ED395 ON `like`');
        $this->addSql('DROP INDEX IDX_AC6340B3F8697D13 ON `like`');
        $this->addSql('DROP INDEX IDX_AC6340B34B89032C ON `like`');
        $this->addSql('ALTER TABLE `like` DROP user_id, DROP comment_id, DROP post_id');
        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E139783E3463');
        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E139F74AB5F1');
        $this->addSql('DROP INDEX IDX_F515E139783E3463 ON meeting');
        $this->addSql('DROP INDEX IDX_F515E139F74AB5F1 ON meeting');
        $this->addSql('ALTER TABLE meeting DROP manager_id, DROP athelete_id, DROP creation_date');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('DROP INDEX IDX_BF5476CAA76ED395 ON notification');
        $this->addSql('ALTER TABLE notification DROP user_id, DROP type, DROP id_type, DROP date');
        $this->addSql('ALTER TABLE post DROP date');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A76ED395');
        $this->addSql('DROP INDEX IDX_CE606404A76ED395 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP user_id, DROP date');
    }
}
