<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102152325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
       
        $this->addSql('CREATE TABLE user
        (user_id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(50) NOT NULL,
                surname VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                subject VARCHAR(265) ,
                message text, 
                PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 
                COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }
    

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `user`');
    }
}
