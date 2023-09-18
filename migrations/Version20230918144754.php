<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230918144754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_file_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_format_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_order_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE position_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE profile_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE refresh_token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, book_order_id INT NOT NULL, type_id INT DEFAULT NULL, format_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, authors TEXT DEFAULT NULL, publication_date DATE DEFAULT NULL, isbn VARCHAR(13) DEFAULT NULL, circulation SMALLINT DEFAULT NULL, conv_print_sheets NUMERIC(5, 2) DEFAULT NULL, publ_sheets NUMERIC(5, 2) DEFAULT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A33194607B61 ON book (book_order_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C54C8C93 ON book (type_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331D629F605 ON book (format_id)');
        $this->addSql('COMMENT ON COLUMN book.authors IS \'(DC2Type:simple_array)\'');
        $this->addSql('COMMENT ON COLUMN book.publication_date IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE book_file (id INT NOT NULL, book_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, workable BOOLEAN DEFAULT false, created_at DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_95027D1816A2B381 ON book_file (book_id)');
        $this->addSql('COMMENT ON COLUMN book_file.created_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE book_format (id INT NOT NULL, title VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F76D79522B36786B ON book_format (title)');
        $this->addSql('CREATE TABLE book_order (id INT NOT NULL, customer_id INT NOT NULL, book_id INT NOT NULL, status_id INT DEFAULT NULL, number SMALLINT DEFAULT NULL, created_at DATE NOT NULL, updated_at DATE DEFAULT NULL, finished_at DATE DEFAULT NULL, deadline VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FBEB86E19395C3F3 ON book_order (customer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FBEB86E116A2B381 ON book_order (book_id)');
        $this->addSql('CREATE INDEX IDX_FBEB86E16BF700BD ON book_order (status_id)');
        $this->addSql('COMMENT ON COLUMN book_order.created_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN book_order.updated_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN book_order.finished_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE book_type (id INT NOT NULL, title VARCHAR(255) NOT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_95431C212B36786B ON book_type (title)');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(13) NOT NULL, email VARCHAR(255) DEFAULT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE position (id INT NOT NULL, title VARCHAR(255) NOT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profile (id INT NOT NULL, phone VARCHAR(13) NOT NULL, address TEXT DEFAULT NULL, started_at DATE DEFAULT NULL, birthdate DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN profile.started_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN profile.birthdate IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE refresh_token (id INT NOT NULL, user_id INT NOT NULL, refresh_token VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, valid TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C74F2195A76ED395 ON refresh_token (user_id)');
        $this->addSql('COMMENT ON COLUMN refresh_token.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE status (id INT NOT NULL, title VARCHAR(255) NOT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7B00651C2B36786B ON status (title)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, position_id INT DEFAULT NULL, profile_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles TEXT NOT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE INDEX IDX_8D93D649DD842E46 ON "user" (position_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649CCFA12B8 ON "user" (profile_id)');
        $this->addSql('COMMENT ON COLUMN "user".roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE user_task (id INT NOT NULL, status_id INT DEFAULT NULL, book_order_id INT DEFAULT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, started_at DATE DEFAULT NULL, updated_at DATE DEFAULT NULL, finished_at DATE DEFAULT NULL, is_deleted BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_28FF97EC6BF700BD ON user_task (status_id)');
        $this->addSql('CREATE INDEX IDX_28FF97EC94607B61 ON user_task (book_order_id)');
        $this->addSql('CREATE INDEX IDX_28FF97ECA76ED395 ON user_task (user_id)');
        $this->addSql('COMMENT ON COLUMN user_task.started_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN user_task.updated_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN user_task.finished_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33194607B61 FOREIGN KEY (book_order_id) REFERENCES book_order (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331C54C8C93 FOREIGN KEY (type_id) REFERENCES book_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331D629F605 FOREIGN KEY (format_id) REFERENCES book_format (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_file ADD CONSTRAINT FK_95027D1816A2B381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_order ADD CONSTRAINT FK_FBEB86E19395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_order ADD CONSTRAINT FK_FBEB86E116A2B381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_order ADD CONSTRAINT FK_FBEB86E16BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE refresh_token ADD CONSTRAINT FK_C74F2195A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649DD842E46 FOREIGN KEY (position_id) REFERENCES position (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT FK_28FF97EC6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT FK_28FF97EC94607B61 FOREIGN KEY (book_order_id) REFERENCES book_order (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_task ADD CONSTRAINT FK_28FF97ECA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_file_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_format_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_order_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE position_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE profile_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE refresh_token_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE user_task_id_seq CASCADE');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A33194607B61');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A331C54C8C93');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A331D629F605');
        $this->addSql('ALTER TABLE book_file DROP CONSTRAINT FK_95027D1816A2B381');
        $this->addSql('ALTER TABLE book_order DROP CONSTRAINT FK_FBEB86E19395C3F3');
        $this->addSql('ALTER TABLE book_order DROP CONSTRAINT FK_FBEB86E116A2B381');
        $this->addSql('ALTER TABLE book_order DROP CONSTRAINT FK_FBEB86E16BF700BD');
        $this->addSql('ALTER TABLE refresh_token DROP CONSTRAINT FK_C74F2195A76ED395');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649DD842E46');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649CCFA12B8');
        $this->addSql('ALTER TABLE user_task DROP CONSTRAINT FK_28FF97EC6BF700BD');
        $this->addSql('ALTER TABLE user_task DROP CONSTRAINT FK_28FF97EC94607B61');
        $this->addSql('ALTER TABLE user_task DROP CONSTRAINT FK_28FF97ECA76ED395');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_file');
        $this->addSql('DROP TABLE book_format');
        $this->addSql('DROP TABLE book_order');
        $this->addSql('DROP TABLE book_type');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE refresh_token');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_task');
    }
}
