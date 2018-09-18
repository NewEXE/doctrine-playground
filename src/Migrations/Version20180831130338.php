<?php declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180831130338 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bugs (id INT AUTO_INCREMENT NOT NULL, engineer_id INT DEFAULT NULL, reporter_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_1E197C9F8D8CDF1 (engineer_id), INDEX IDX_1E197C9E1CFE6F5 (reporter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bug_product (bug_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_897D061DFA3DB3D5 (bug_id), INDEX IDX_897D061D4584665A (product_id), PRIMARY KEY(bug_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tasks (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, complete_at DATETIME NOT NULL, status INT NOT NULL, INDEX IDX_50586597A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9F8D8CDF1 FOREIGN KEY (engineer_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE bugs ADD CONSTRAINT FK_1E197C9E1CFE6F5 FOREIGN KEY (reporter_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE bug_product ADD CONSTRAINT FK_897D061DFA3DB3D5 FOREIGN KEY (bug_id) REFERENCES bugs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bug_product ADD CONSTRAINT FK_897D061D4584665A FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_50586597A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bug_product DROP FOREIGN KEY FK_897D061DFA3DB3D5');
        $this->addSql('ALTER TABLE bugs DROP FOREIGN KEY FK_1E197C9F8D8CDF1');
        $this->addSql('ALTER TABLE bugs DROP FOREIGN KEY FK_1E197C9E1CFE6F5');
        $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_50586597A76ED395');
        $this->addSql('ALTER TABLE bug_product DROP FOREIGN KEY FK_897D061D4584665A');
        $this->addSql('DROP TABLE bugs');
        $this->addSql('DROP TABLE bug_product');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE tasks');
    }
}
