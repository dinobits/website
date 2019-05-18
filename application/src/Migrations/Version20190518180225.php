<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190518180225 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_D34A04ADC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_platform (product_id INT NOT NULL, platform_id INT NOT NULL, INDEX IDX_F2E2BA5C4584665A (product_id), INDEX IDX_F2E2BA5CFFE6496F (platform_id), PRIMARY KEY(product_id, platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_inventory (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, provider_id INT DEFAULT NULL, platform_id INT DEFAULT NULL, claimed_by_id INT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, code LONGTEXT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, date_created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_updated DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_claimed DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_active TINYINT(1) NOT NULL, is_enabled TINYINT(1) NOT NULL, INDEX IDX_DF8DFCBB4584665A (product_id), INDEX IDX_DF8DFCBBA53A8AA (provider_id), INDEX IDX_DF8DFCBBFFE6496F (platform_id), INDEX IDX_DF8DFCBBF67E7A38 (claimed_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, url VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_92C4739CC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC54C8C93 FOREIGN KEY (type_id) REFERENCES product_type (id)');
        $this->addSql('ALTER TABLE product_platform ADD CONSTRAINT FK_F2E2BA5C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_platform ADD CONSTRAINT FK_F2E2BA5CFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_inventory ADD CONSTRAINT FK_DF8DFCBB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_inventory ADD CONSTRAINT FK_DF8DFCBBA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE product_inventory ADD CONSTRAINT FK_DF8DFCBBFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id)');
        $this->addSql('ALTER TABLE product_inventory ADD CONSTRAINT FK_DF8DFCBBF67E7A38 FOREIGN KEY (claimed_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE provider ADD CONSTRAINT FK_92C4739CC54C8C93 FOREIGN KEY (type_id) REFERENCES provider_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_platform DROP FOREIGN KEY FK_F2E2BA5CFFE6496F');
        $this->addSql('ALTER TABLE product_inventory DROP FOREIGN KEY FK_DF8DFCBBFFE6496F');
        $this->addSql('ALTER TABLE product_platform DROP FOREIGN KEY FK_F2E2BA5C4584665A');
        $this->addSql('ALTER TABLE product_inventory DROP FOREIGN KEY FK_DF8DFCBB4584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC54C8C93');
        $this->addSql('ALTER TABLE product_inventory DROP FOREIGN KEY FK_DF8DFCBBA53A8AA');
        $this->addSql('ALTER TABLE provider DROP FOREIGN KEY FK_92C4739CC54C8C93');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_platform');
        $this->addSql('DROP TABLE product_inventory');
        $this->addSql('DROP TABLE product_type');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP TABLE provider_type');
    }
}
